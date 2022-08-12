<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Service extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Fasilitas/Fasilitas_model', 'Home/Home_model']);
    }
    public function index()
    {
        $data['title'] = 'Service Pages';
        $kamarTerbaru = $this->Home_model->getKamarBaru6()->result();

        $data['kamar'] = $kamarTerbaru;
        $data['limit3'] = $this->Fasilitas_model->get(null, 3, 0)->result();
        $data['limit6'] = $this->Fasilitas_model->get(null, 6, 3)->result();
        $this->template->front('front/service/main', $data);
    }
}
