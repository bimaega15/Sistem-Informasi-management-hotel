<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hotel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $profile = check_profile();
        if ($profile->level == 'manager') {
            show_404();
        }
        $this->load->model('Hotel/Hotel_model');
    }
    public function index($id = null)
    {
        $this->breadcrumbs->push('Dashboard', 'Admin/Dashboard');
        $this->breadcrumbs->push('Hotel', 'Admin/Hotel');
        // output
        $data['breadcrumbs'] = $this->breadcrumbs->show();
        $data['title'] = 'Hotel Page';
        $data['row'] = $this->Hotel_model->get($id)->row();
        $this->template->admin('admin/hotel/main', $data);
    }
    public function process()
    {
        $this->form_validation->set_rules('nama_hotel', 'Nama Hotel', 'required|trim');
        $this->form_validation->set_rules('koordinat_hotel', 'Koordinat Hotel', 'required|trim');
        $this->form_validation->set_rules('alamat_hotel', 'Alamat Hotel', 'required|trim');
        $this->form_validation->set_rules('email_hotel', 'Email Hotel', 'required|trim|valid_email');
        $this->form_validation->set_rules('no_telepon_hotel', 'No. Telepon Hotel', 'required|trim');
        $this->form_validation->set_message('required', '{field} wajib diisi');
        $this->form_validation->set_error_delimiters('<small style="color:#f05154">', '</small><br>');
        if ($this->form_validation->run() == false) {
            $id = $this->input->post('id_hotel', true);
            return $this->index($id);
        } else {
            $check = $this->Hotel_model->get()->num_rows();
            if ($check == null) {
                $data = [
                    'nama_hotel'  => htmlspecialchars($this->input->post('nama_hotel', true)),
                    'koordinat_hotel'  => htmlspecialchars($this->input->post('koordinat_hotel', true)),
                    'alamat_hotel'  => htmlspecialchars($this->input->post('alamat_hotel', true)),
                    'email_hotel'  => htmlspecialchars($this->input->post('email_hotel', true)),
                    'no_telepon_hotel'  => htmlspecialchars($this->input->post('no_telepon_hotel', true)),
                    'gambar_hotel' => $this->uploadGambar()
                ];
                $database = $this->Hotel_model->insert($data);
            } else {
                $id = $this->input->post('id_hotel', true);
                $data = [
                    'nama_hotel'  => htmlspecialchars($this->input->post('nama_hotel', true)),
                    'koordinat_hotel'  => htmlspecialchars($this->input->post('koordinat_hotel', true)),
                    'alamat_hotel'  => htmlspecialchars($this->input->post('alamat_hotel', true)),
                    'email_hotel'  => htmlspecialchars($this->input->post('email_hotel', true)),
                    'no_telepon_hotel'  => htmlspecialchars($this->input->post('no_telepon_hotel', true)),
                    'gambar_hotel' => $this->uploadGambar($id)
                ];
                $database = $this->Hotel_model->update($data, $id);
            }
            if ($database > 0) {
                $this->session->set_flashdata('success', 'Data Berhasil Ditambah');
            } else {
                $this->session->set_flashdata('error', 'Data Gagal Ditambah');
            }
            return redirect(base_url('Admin/Hotel'));
        }
    }
    private function uploadGambar($id = null)
    {
        $gambar = $_FILES['gambar_hotel']['name'];
        if ($gambar != null) {
            if ($id != null) {
                $this->removeImage($id);
            }
            $config['upload_path'] = './images/hotel';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['overwrite'] = true;
            $new_name = rand(1000, 100000) . time() . $_FILES["gambar_hotel"]['name'];
            $config['file_name'] = $new_name;
            // $config['max_size'] = 1024;
            // $config['max_width'] = 1024;
            // $config['max_height'] = 768;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar_hotel')) {
                echo $this->upload->display_errors();
            } else {
                $gambar = $this->upload->data();
                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = './images/hotel/' . $gambar['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = '50%';
                $config['new_image'] = './images/hotel/' . $gambar['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                return $gambar['file_name'];
            }
        } else {
            if ($id != null) {
                $hotel = $this->db->get_where('hotel', ['id_hotel' => $id])->row();
                if ($hotel != null) {
                    return $hotel->gambar_hotel;
                } else {
                    return "default.png";
                }
            } else {
                return 'default.png';
            }
        }
    }
    private function removeImage($id)
    {
        $select_image = $this->db->get_where('hotel', ['id_hotel' => $id])->row();
        if ($select_image != null) {
            if($select_image->gambar_hotel != 'default.png'){
                $filename = explode('.', $select_image->gambar_hotel)[0];
                return array_map('unlink', glob(FCPATH . "images/hotel/" . $filename . '.*'));
            }
        }
    }
}
