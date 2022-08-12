<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Home/Home_model', 'Client/Client_model', 'Subscribe/Subscribe_model']);
    }
    public function index()
    {
        $slider =  $this->Home_model->getSlider()->result();
        $rekomendasi =  $this->Home_model->getRekomendasi()->result();
        $penawaran =  $this->Home_model->getPenawaran()->result();
        $kamarTerbaru = $this->Home_model->getKamarBaru6()->result();
        $galeri = $this->Home_model->getGaleri()->result();
        $a_slider = null;
        foreach ($slider as $v_slider) {
            if (checkGambarKamar($v_slider->id_kamar) != null) {
                $a_slider[] = checkGambarKamar($v_slider->id_kamar);
            }
        }
        $data['slider'] = $a_slider;
        $data['rekomendasi'] = $rekomendasi;
        $data['penawaran'] = $penawaran;
        $data['kamar'] = $kamarTerbaru;
        $data['galeri'] = $galeri;
        $data['title'] = 'Home Page';
        $this->template->front('front/home/main', $data);
    }
    public function keteranganClient($id_client)
    {
        $client = $this->Client_model->get($id_client)->row();
        echo json_encode($client);
    }
    public function subscribe()
    {
        $url = $this->input->post('url', true);
        $email = htmlspecialchars($this->input->post('email', true));

        $check = $this->Subscribe_model->checkEmail($email);
        if ($check->num_rows() > 0) {
            $this->session->set_flashdata('error_toastr', 'Email sudah terdaftar');
            return redirect($url);
        }

        $data = [
            'email' => $email,
        ];

        $row = $this->Subscribe_model->insert($data);
        if ($row > 0) {
            $this->session->set_flashdata('success_toastr', 'Berhasil Subscribe');
        } else {
            $this->session->set_flashdata('error_toastr', 'Sudah ada');
        }
        return redirect($url);
    }
}
