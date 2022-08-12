<?php
defined('BASEPATH') or exit('No direct script access allowed');

class History extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['History/History_model', 'Reservasi/Reservasi_model', 'Pembayaran/Pembayaran_model', 'Kamar/Kamar_model']);
    }
    public function index()
    {
        $data['title'] = 'History Page';
        $profile = check_profile_tamu();
        $get = $this->History_model->allData($profile->id_tamu)->result();
        $data['result'] = $get;
        $this->template->front('front/history/main', $data);
    }
    public function detailReservasi($id_reservasi)
    {
        $get = $this->Reservasi_model->get($id_reservasi)->row();
        echo json_encode($get);
    }
    public function detailTamu($id_tamu)
    {
        $get = $this->Pembayaran_model->get($id_tamu)->row();
        echo json_encode($get);
    }
    public function detailKamar($id_kamar)
    {
        $row = $this->Kamar_model->allData($id_kamar)->row();
        $gambar = checkGambarKamar($row->id_kamar);
        if (isset($gambar->gambar_kamar)) {
            $o_gambar = '<a href="' . base_url('images/gambarkamar/' . $gambar->gambar_kamar) . '" target="_blank">
            <img class="w-100" src="' . base_url('images/gambarkamar/' . $gambar->gambar_kamar) . '">
        </a>';
        } else {
            $o_gambar = null;
        }
        $data = [
            'row' => $row,
            'gambar' => $o_gambar
        ];
        echo json_encode($data);
    }
    public function delete($id)
    {
        $database = $this->History_model->delete($id);
        if ($database > 0) {
            $this->session->set_flashdata('success_toastr', 'Data Berhasil Dihapus');
        } else {
            $this->session->set_flashdata('error_toastr', 'Data Gagal Dihapus');
        }
        return redirect(base_url('Front/History'));
    }
}
