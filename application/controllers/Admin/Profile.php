<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('Users/Users_model');
    }
    public function index()
    {
        $this->breadcrumbs->push('Dashboard', 'Admin/Home');
        $this->breadcrumbs->push('My Profile', 'Admin/Profile');
        // output
        $data['breadcrumbs'] = $this->breadcrumbs->show();
        $data['title'] = 'Profile Page';
        $profile = check_profile();
        $data['page'] = 'edit';
        $this->template->admin('admin/profile/main', $data);
    }
    public function process()
    {
        $this->form_validation->set_rules('nama_users', 'Nama Users', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'callback_username_check');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim');

        $this->form_validation->set_message('required', '{field} wajib diisi');
        $this->form_validation->set_error_delimiters('<small style="color:#f05154">', '</small><br>');

        if ($this->form_validation->run() == false) {
            $id = $this->input->post('id_users', true);
            return $this->index();
        } else {
            $id = $this->input->post('id_users', true);
            $gender = htmlspecialchars($this->input->post('jenis_kelamin', true));
            $password = htmlspecialchars($this->input->post('password', true));
            if ($password != null) {
                $password_db = htmlspecialchars(md5($this->input->post('password', true)));
            } else {
                $password_db = $this->input->post('password_old', true);
            }
            $data = [
                'nama_users'  => htmlspecialchars($this->input->post('nama_users', true)),
                'username'  => htmlspecialchars($this->input->post('username', true)),
                'password'  => $password_db,
                'jenis_kelamin'  => $gender,
                'gambar' => $this->uploadGambar($gender, $id)
            ];
            $database = $this->Users_model->update($data, $id);
            if ($database > 0) {
                $this->session->set_flashdata('success', 'Data Berhasil Diupdate');
            } else {
                $this->session->set_flashdata('error', 'Data Gagal Diupdate');
            }
        }


        return redirect(base_url('Admin/Profile'));
    }
    private function uploadGambar($gender = null, $id = null)
    {
        $gambar = $_FILES['gambar']['name'];

        if ($gambar != null) {
            if ($id != null) {
                $this->removeImage($id);
            }
            $config['upload_path'] = './images/users';
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
                $config['source_image'] = './images/users/' . $gambar['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = '50%';
                $config['new_image'] = './images/users/' . $gambar['file_name'];
                $this->load->library('image_lib', $config);
                $this->upload->initialize($config);
                $this->image_lib->resize();

                return $gambar['file_name'];
            }
        } else {
            if ($id != null) {
                $users = $this->db->get_where('users', ['id_users' => $id])->row();
                var_dump($users);
                if ($users->gambar != 'male.png' && $users->gambar != 'female.png' && $users->jenis_kelamin == $gender) {
                    return $users->gambar;
                } else {
                    if ($gender == 'P') {
                        return 'male.png';
                    } else {
                        return 'female.png';
                    }
                }
            } else {
                if ($gender == 'P') {
                    return 'male.png';
                } else {
                    return 'female.png';
                }
            }
        }
    }
    private function removeImage($id)
    {
        $select_image = $this->db->get_where('users', ['id_users' => $id])->row();

        if ($select_image->gambar != 'male.png' && $select_image->gambar != 'female.png') {
            $filename = explode('.', $select_image->gambar)[0];
            return array_map('unlink', glob(FCPATH . "images/users/" . $filename . '.*'));
        }
    }
    public function username_check($str)
    {
        $username = $this->input->post('username', true);
        $id_users = $this->input->post('id_users', true);

        $check = $this->db->get_where('users', ['id_users <> ' => $id_users, 'username' => $username])->num_rows();
        if ($check > 0) {
            $this->form_validation->set_message('username_check', 'Username sudah dipakai');
            return FALSE;
        } else {
            return TRUE;
        }
    }
}
