<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Tamu/Tamu_model');
    }
    public function index()
    {
        $data['title'] = 'Login Page';
        $this->template->front('front/login/main', $data);
    }
    public function process()
    {
        $url = htmlspecialchars($this->input->post('url', true));
        $username = htmlspecialchars($this->input->post('username', true));
        $password = htmlspecialchars($this->input->post('password', true));
        $remember = htmlspecialchars($this->input->post('remember_me', true));

        set_cookie('username', $username, time() + (60 * 10));

        $model = $this->Tamu_model->login($username, $password);

        if ($model->num_rows() > 0) {
            $row = $model->row();
            if ($remember != null) {
                $key = hash('sha256', $row->username);
                set_cookie('cookie', $key, 60 * 60 * 24);
                $this->db->update('tamu', ['cookie' => $key], ['username' => $username]);
            }
            $this->session->set_userdata([
                'tamu_id' => $row->id_tamu,
            ]);
            $this->session->set_flashdata('success_toastr', 'Selamat login! ' . $row->nama);
            $this->deleteCookie();
            return redirect($url);
        } else {
            $this->session->set_flashdata('error_toastr', 'Username atau Password salah');
            return redirect($url);
        }
    }
    function deleteCookie()
    {
        delete_cookie('username');
        delete_cookie('nama');
        delete_cookie('email');
        delete_cookie('no_hp');
        delete_cookie('alamat');
        delete_cookie('jenis_kelamin');
        delete_cookie('cookie');
    }

    public function processRegister()
    {

        $url = $this->input->post('url', true);

        $username = htmlspecialchars($this->input->post('username', true));
        $password = htmlspecialchars($this->input->post('password', true));
        $confirm_password = htmlspecialchars($this->input->post('confirm_password', true));
        $nama = htmlspecialchars($this->input->post('nama', true));
        $email = htmlspecialchars($this->input->post('email', true));
        $no_hp = htmlspecialchars($this->input->post('no_hp', true));
        $alamat = htmlspecialchars($this->input->post('alamat', true));
        $jenis_kelamin = htmlspecialchars($this->input->post('jenis_kelamin', true));

        set_cookie('username', $username, time() + (60 * 10));
        set_cookie('nama', $nama, time() + (60 * 10));
        set_cookie('email', $email, time() + (60 * 10));
        set_cookie('no_hp', $no_hp, time() + (60 * 10));
        set_cookie('alamat', $alamat, time() + (60 * 10));
        set_cookie('jenis_kelamin', $jenis_kelamin, time() + (60 * 10));

        $checkUsername = $this->Tamu_model->checkUsername($username)->num_rows();
        if ($checkUsername > 0) {
            $this->session->set_flashdata('error_toastr', 'Username sudah ada');
            redirect($url);
            return;
        }

        if ($password != $confirm_password) {
            $this->session->set_flashdata('error_toastr', 'Password tidak sama');
            redirect($url);
            return;
        }

        $data = [
            'username' => $username,
            'password' => md5($password),
            'nama' => $nama,
            'email' => $email,
            'no_hp' => $no_hp,
            'alamat' => $alamat,
            'jenis_kelamin' => $jenis_kelamin,
            'gambar' => $this->uploadGambar(null, $jenis_kelamin)
        ];
        $tamu = $this->Tamu_model->insert($data);
        if ($tamu != null) {
            $this->session->set_flashdata('success_toastr', 'Berhasil register');
            $this->session->set_userdata('tamu_id', $tamu);
            $this->deleteCookie();
            redirect($url);
        } else {
            $this->session->set_flashdata('error_toastr', 'Gagal register');
            redirect($url);
        }
    }

    private function uploadGambar($id = null, $jenis_kelamin = null)
    {
        $gambar = $_FILES['gambar']['name'];

        if ($gambar != null) {
            if ($id != null) {
                $this->removeImage($id);
            }
            $config['upload_path'] = './images/tamu';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['overwrite'] = true;
            $new_name = rand(1000, 100000) . time() . $_FILES["gambar"]['name'];
            $config['file_name'] = $new_name;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar')) {
                echo $this->upload->display_errors();
            } else {
                $gambar = $this->upload->data();
                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = './images/tamu/' . $gambar['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = '50%';
                $config['new_image'] = './images/tamu/' . $gambar['file_name'];
                $this->load->library('image_lib', $config);
                $this->upload->initialize($config);
                $this->image_lib->resize();

                return $gambar['file_name'];
            }
        } else {
            if ($id != null) {
                $tamu = $this->db->get_where('tamu', ['id_tamu' => $id])->row();
                if ($tamu->gambar != 'male.png' && $tamu->gambar != 'female.png') {
                    return $tamu->gambar;
                } else {
                    if ($jenis_kelamin == 'L') {
                        return 'male.png';
                    } else {
                        return 'female.png';
                    }
                }
            } else {
                if ($jenis_kelamin == 'L') {
                    return 'male.png';
                } else {
                    return 'female.png';
                }
            }
        }
    }
    private function removeImage($id)
    {
        $select_image = $this->db->get_where('tamu', ['id_tamu' => $id])->row();

        if ($select_image->gambar != 'male.png' && $select_image->gambar != 'female.png') {
            $filename = explode('.', $select_image->gambar)[0];
            return array_map('unlink', glob(FCPATH . "images/tamu/" . $filename . '.*'));
        }
    }
    public function logout()
    {
        $this->deleteCookie();
        $this->session->unset_userdata('tamu_id');
        $this->session->set_flashdata('success_toastr', 'Berhasil logout');
        return redirect(base_url(''));
    }
}
