<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model(['Reservasi/Reservasi_model', 'Tamu/Tamu_model', 'Kamar/Kamar_model']);
    }
    public function index()
    {
        $this->breadcrumbs->push('Dashboard', 'Admin/Home');
        // output
        $data['breadcrumbs'] = $this->breadcrumbs->show();
        $data['title'] = 'Dashboard Page';
        $data['check_in'] = $this->Reservasi_model->checkIn()->num_rows();
        $data['check_out'] = $this->Reservasi_model->checkOut()->num_rows();
        $data['booking'] = $this->Reservasi_model->booking()->num_rows();
        $data['transaksi_today'] = $this->Reservasi_model->transaksiToday()->row();
        $data['transaksi_month'] = $this->Reservasi_model->transaksiMonth()->row();


        $data['tamu'] = $this->Tamu_model->get()->num_rows();
        $data['kamar'] = $this->Kamar_model->get()->num_rows();


        $this->template->admin('admin/home/main', $data);
    }
    public function dataGrafik()
    {
        $grafik = $this->Reservasi_model->grafikTransaksi()->result();

        foreach ($grafik as $v_grafik) {
            $data[] = [
                strtotime($v_grafik->tanggal) * 1000,
                floatval($v_grafik->total_bayar)
            ];
        }
        echo (json_encode($data));
    }
}
