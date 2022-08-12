<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Tamu/Tamu_model');
    }
    public function index()
    {
        $data['title'] = 'Profile page';
        $this->template->front('front/profile/main', $data);
    }
    public function process()
    {
        $id_tamu = htmlspecialchars($this->input->post('id_tamu', true));
        $password = htmlspecialchars($this->input->post('password', true));
        $confirm_password = htmlspecialchars($this->input->post('konfirmasi_password', true));
        $nama = htmlspecialchars($this->input->post('nama', true));
        $email = htmlspecialchars($this->input->post('email', true));
        $no_hp = htmlspecialchars($this->input->post('no_hp', true));
        $alamat = htmlspecialchars($this->input->post('alamat', true));
        $jenis_kelamin = htmlspecialchars($this->input->post('jenis_kelamin', true));

        if ($password != null) {
            if ($password != $confirm_password) {
                $this->session->set_flashdata('error_toastr', 'Password tidak sama');
                redirect(base_url('Front/Profile'));
                return;
            } else {
                $password_fix = md5($password);
            }
        } else {
            $password_fix = htmlspecialchars($this->input->post('password_old', true));
        }


        $data = [
            'password' => $password_fix,
            'nama' => $nama,
            'email' => $email,
            'no_hp' => $no_hp,
            'alamat' => $alamat,
            'jenis_kelamin' => $jenis_kelamin,
            'gambar' => $this->uploadGambar($id_tamu, $jenis_kelamin)
        ];
        $tamu = $this->Tamu_model->update($data, $id_tamu);
        if ($tamu != null) {
            $this->session->set_flashdata('success_toastr', 'Berhasil update');
            redirect(base_url('Front/Profile'));
        } else {
            $this->session->set_flashdata('error_toastr', 'Gagal update');
            redirect(base_url('Front/Profile'));
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
}
