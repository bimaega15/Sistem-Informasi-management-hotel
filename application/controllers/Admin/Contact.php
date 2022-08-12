<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contact extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $profile = check_profile();
        if ($profile->level != 'admin') {
            show_404();
        }
        $this->load->model('Contact/Contact_model');
    }
    public function index()
    {
        $this->breadcrumbs->push('Dashboard', 'Admin/Dashboard');
        $this->breadcrumbs->push('Contact', 'Admin/Contact');
        // output
        $data['breadcrumbs'] = $this->breadcrumbs->show();
        $data['title'] = 'Contact Page';
        $data['result'] = $this->Contact_model->get()->result();
        $this->template->admin('admin/contact/main', $data);
    }


    public function delete($id)
    {
        $database = $this->Contact_model->delete($id);
        if ($database > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        } else {
            $this->session->set_flashdata('error', 'Data Gagal Dihapus');
        }
        return redirect(base_url('Admin/Contact'));
    }
    public function detailKeterangan($id)
    {
        $get = $this->Contact_model->get($id)->row();
        $data = [
            'keterangan' => $get->message
        ];
        echo json_encode($data);
    }
}
