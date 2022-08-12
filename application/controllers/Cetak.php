<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cetak extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Reservasi/Reservasi_model', 'Pembayaran/Pembayaran_model', 'Kamar/Kamar_model', 'Konfigurasi/Konfigurasi_model', 'Tamu/Tamu_model', 'Konfigurasi/Konfigurasi_model']);
        $this->load->library('Pdf');
    }
    public function invoice($id_reservasi)
    {
        $reservasi = $this->Reservasi_model->get($id_reservasi)->row();
        $tanggal = $reservasi->tanggal;
        $exp = explode(' ', $tanggal);
        $tanggal_pesan = $exp[0];
        $tanggal_pesan = tanggal('hari', $tanggal_pesan);
        $pembayaran = $this->Pembayaran_model->get(null, $id_reservasi)->row();

        $check_in = strtotime($reservasi->check_in);
        $check_out = strtotime($reservasi->check_out);
        $selisih = $check_out - $check_in;
        $hari = $selisih / 60 / 60 / 24;

        $data['pesan_per_malam'] = $hari;
        $data['reservasi'] = $reservasi;
        $data['pembayaran'] = $pembayaran;
        $data['kamar'] = $this->Kamar_model->get($reservasi->kamar_id)->row();
        $data['konfigurasi'] = $this->Konfigurasi_model->get()->row();
        $data['tamu'] = $this->Tamu_model->get($reservasi->tamu_id)->row();
        $data['tanggal_pesan'] = $tanggal_pesan;
        $status_pembayaran = $pembayaran->rekening_id != 0 ? check_rekening($pembayaran->rekening_id)->row()->nama_bank : 'Bayar ditempat';
        $data['status_pembayaran'] = $status_pembayaran;
        // $this->load->view('cetak/invoice', $data);

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "invoice-pembayaran.pdf";
        $this->pdf->load_view('cetak/invoice', $data);
    }
}
