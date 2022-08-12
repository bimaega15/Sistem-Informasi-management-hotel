<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konfigurasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $profile = check_profile();
        if ($profile->level != 'admin') {
            show_404();
        }
        $this->load->model('Konfigurasi/Konfigurasi_model');
    }
    public function index()
    {
        $this->breadcrumbs->push('Dashboard', 'Admin/Dashboard');
        $this->breadcrumbs->push('Konfigurasi', 'Admin/Konfigurasi');
        // output
        $data['breadcrumbs'] = $this->breadcrumbs->show();
        $data['title'] = 'Konfigurasi Page';
        $konfigurasi = $this->Konfigurasi_model->get()->num_rows();

        if ($konfigurasi == 0) {

            $obj = new stdClass();
            $obj->id_konfigurasi = null;
            $obj->nama_sistem = null;
            $obj->gambar_sistem = null;
            $obj->koordinat = null;
            $obj->tentang = null;
            $obj->alamat = null;
            $obj->no_telepon = null;
            $obj->email = null;
            $obj->facebook = null;
            $obj->instagram = null;
            $obj->twitter = null;
            $obj->copyright = null;
            $obj->link_yt = null;
        } else {
            $obj = $this->Konfigurasi_model->get()->row();
        }
        $data['row'] = $obj;
        $data['page'] = $konfigurasi != 0 ? 'edit' : 'tambah';

        $this->template->admin('admin/konfigurasi/main', $data);
    }
    public function process()
    {
        $this->form_validation->set_rules('nama_sistem', 'Nama Sistem', 'required|trim');
        $this->form_validation->set_rules('tentang', 'Tentang', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('no_telepon', 'No.Telepon', 'required|trim|numeric');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('copyright', 'Copyright', 'required|trim');
        $this->form_validation->set_message('required', '{field} wajib diisi');
        $this->form_validation->set_message('numeric', '{field} harus berupa angka');
        $this->form_validation->set_message('valid_email', '{field} tidak valid');
        $this->form_validation->set_error_delimiters('<small style="color:#f05154">', '</small><br>');
        if (isset($_POST['tambah'])) {
            if ($this->form_validation->run() == false) {
                return $this->index();
            } else {
                $data = [
                    'nama_sistem'  => htmlspecialchars($this->input->post('nama_sistem', true)),
                    'koordinat'  => htmlspecialchars_decode($this->input->post('koordinat')),
                    'tentang'  => htmlspecialchars($this->input->post('tentang', true)),
                    'alamat'  => htmlspecialchars($this->input->post('alamat', true)),
                    'no_telepon'  => htmlspecialchars($this->input->post('no_telepon', true)),
                    'email'  => htmlspecialchars($this->input->post('email', true)),
                    'facebook'  => htmlspecialchars($this->input->post('facebook', true)),
                    'instagram'  => htmlspecialchars($this->input->post('instagram', true)),
                    'twitter'  => htmlspecialchars($this->input->post('twitter', true)),
                    'copyright'  => htmlspecialchars($this->input->post('copyright', true)),
                    'link_yt'  => htmlspecialchars($this->input->post('link_yt', true)),
                    'gambar_sistem'  => $this->uploadGambar(),
                ];
                $database = $this->Konfigurasi_model->insert($data);
                if ($database > 0) {
                    $this->session->set_flashdata('success', 'Data Berhasil Ditambah');
                } else {
                    $this->session->set_flashdata('error', 'Data Gagal Ditambah');
                }
            }
        } else {
            if ($this->form_validation->run() == false) {
                return $this->index();
            } else {
                $id = $this->input->post('id_konfigurasi', true);
                $data = [
                    'nama_sistem'  => htmlspecialchars($this->input->post('nama_sistem', true)),
                    'koordinat'  => htmlspecialchars_decode($this->input->post('koordinat', true)),
                    'tentang'  => htmlspecialchars($this->input->post('tentang', true)),
                    'alamat'  => htmlspecialchars($this->input->post('alamat', true)),
                    'no_telepon'  => htmlspecialchars($this->input->post('no_telepon', true)),
                    'email'  => htmlspecialchars($this->input->post('email', true)),
                    'facebook'  => htmlspecialchars($this->input->post('facebook', true)),
                    'instagram'  => htmlspecialchars($this->input->post('instagram', true)),
                    'twitter'  => htmlspecialchars($this->input->post('twitter', true)),
                    'copyright'  => htmlspecialchars($this->input->post('copyright', true)),
                    'link_yt'  => htmlspecialchars($this->input->post('link_yt', true)),
                    'gambar_sistem'  => $this->uploadGambar($id),
                ];
                $database = $this->Konfigurasi_model->update($data, $id);
                if ($database > 0) {
                    $this->session->set_flashdata('success', 'Data Berhasil Diupdate');
                } else {
                    $this->session->set_flashdata('error', 'Data Gagal Diupdate');
                }
            }
        }

        return redirect(base_url('Admin/Konfigurasi'));
    }
    private function uploadGambar($id = null)
    {
        $gambar = $_FILES['gambar_sistem']['name'];

        if ($gambar != null) {
            if ($id != null) {
                $this->removeImage($id);
            }
            $config['upload_path'] = './images/konfigurasi';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['overwrite'] = true;
            $new_name = rand(1000, 100000) . time() . $_FILES["gambar_sistem"]['name'];
            $config['file_name'] = $new_name;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar_sistem')) {
                echo $this->upload->display_errors();
            } else {
                $gambar = $this->upload->data();
                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = './images/konfigurasi/' . $gambar['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = '50%';
                $config['new_image'] = './images/konfigurasi/' . $gambar['file_name'];
                $this->load->library('image_lib', $config);
                $this->upload->initialize($config);
                $this->image_lib->resize();

                return $gambar['file_name'];
            }
        } else {
            if ($id != null) {
                $konfigurasi = $this->db->get_where('konfigurasi', ['id_konfigurasi' => $id])->row();
                if ($konfigurasi->gambar_sistem != 'default.png') {
                    return $konfigurasi->gambar_sistem;
                } else {
                    return 'default.png';
                }
            } else {
                return 'default.png';
            }
        }
    }
    private function removeImage($id)
    {
        $select_image = $this->db->get_where('konfigurasi', ['id_konfigurasi' => $id])->row();

        if ($select_image->gambar_sistem != 'default.png') {
            $filename = explode('.', $select_image->gambar_sistem)[0];
            return array_map('unlink', glob(FCPATH . "images/konfigurasi/" . $filename . '.*'));
        }
    }
}
