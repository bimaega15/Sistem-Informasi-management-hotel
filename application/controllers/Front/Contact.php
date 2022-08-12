<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contact extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Contact/Contact_model');
    }
    public function index()
    {
        $data['title'] = 'Contact Page';
        $this->template->front('front/contact/main', $data);
    }
    public function process()
    {
        $data = [
            'name' => htmlspecialchars($this->input->post('name', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'message' => htmlspecialchars($this->input->post('message', true)),
        ];

        $row = $this->Contact_model->insert($data);
        if ($row > 0) {
            $this->session->set_flashdata('success_toastr', 'Berhasil Subscribe');
        } else {
            $this->session->set_flashdata('error_toastr', 'Sudah ada');
        }
        return redirect(base_url('Front/Contact'));
    }
}
