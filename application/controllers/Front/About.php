<?php
defined('BASEPATH') or exit('No direct script access allowed');

class About extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Users/Users_model', 'Fasilitas/Fasilitas_model', 'Tipe/Tipe_kamar_model', 'Kamar/Kamar_model']);
    }
    public function index()
    {
        $data['title'] = "About Page";
        $data['users'] = $this->Users_model->get()->num_rows();
        $data['fasilitas'] = $this->Fasilitas_model->get()->num_rows();
        $data['tipe'] = $this->Tipe_kamar_model->get()->num_rows();
        $data['kamar'] = $this->Kamar_model->get()->num_rows();
        $this->template->front('front/about/main', $data);
    }
}
