<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $profile = check_profile();
        if ($profile->level != 'admin') {
            show_404();
        }
        $this->load->model('Tamu/Tamu_model');
    }
    public function index()
    {
        $this->breadcrumbs->push('Dashboard', 'Admin/Dashboard');
        $this->breadcrumbs->push('Pelanggan', 'Admin/Pelanggan');
        // output
        $data['breadcrumbs'] = $this->breadcrumbs->show();
        $data['title'] = 'Pelanggan Page';
        $data['result'] = $this->Tamu_model->get()->result();
        $this->template->admin('admin/pelanggan/main', $data);
    }
    public function delete($id_tamu)
    {
        $this->removeImage($id_tamu);
        $tamu = $this->Tamu_model->delete($id_tamu);
        if ($tamu > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        } else {
            $this->session->set_flashdata('error', 'Data Gagal Dihapus');
        }
        return redirect(base_url('Admin/Pelanggan'));
    }
    public function add()
    {
        $this->breadcrumbs->push('Dashboard', 'Admin/Dashboard');
        $this->breadcrumbs->push('Pelanggan', 'Admin/Pelanggan');
        $this->breadcrumbs->push('Tambah Pelanggan', 'Admin/Pelanggan');
        // output
        $data['breadcrumbs'] = $this->breadcrumbs->show();
        $data['title'] = 'Tambah Pelanggan Page';
        $data['page'] = 'tambah';
        $this->template->admin('admin/pelanggan/form_data', $data);
    }
    private function removeImage($id)
    {
        $select_image = $this->Tamu_model->get($id)->row();
        if ($select_image != null) {
            if ($select_image->gambar != 'male.png' && $select_image->gambar != 'female.png') {
                $filename = explode('.', $select_image->gambar)[0];
                return array_map('unlink', glob(FCPATH . "images/tamu/" . $filename . '.*'));
            }
        }
    }
}
