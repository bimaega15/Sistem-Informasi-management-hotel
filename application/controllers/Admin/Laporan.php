<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $profile = check_profile();
        if ($profile->level == 'kasir') {
            show_404();
        }
        $this->load->library('pdf');
        $this->load->model('Laporan/Laporan_model');
    }
    public function index()
    {
        $this->breadcrumbs->push('Dashboard', 'Admin/Dashboard');
        $this->breadcrumbs->push('Laporan', 'Admin/Laporan');
        // output
        $data['breadcrumbs'] = $this->breadcrumbs->show();
        $data['title'] = 'Laporan Page';
        $dari_tanggal = null;
        $sampai_tanggal = null;
        if (isset($_GET['dari_tanggal'])) {
            $dari_tanggal = $_GET['dari_tanggal'];
        }
        if (isset($_GET['sampai_tanggal'])) {
            $sampai_tanggal = $_GET['sampai_tanggal'];
        }
        $data['result'] = $this->Laporan_model->get($dari_tanggal, $sampai_tanggal)->result();
        $data['dari_tanggal'] = $dari_tanggal;
        $data['sampai_tanggal'] = $sampai_tanggal;

        $this->template->admin('admin/laporan/main', $data);
    }
    public function cetakPdf()
    {
        $dari_tanggal = null;
        $sampai_tanggal = null;
        if (isset($_GET['dari_tanggal'])) {
            $dari_tanggal = $_GET['dari_tanggal'];
        }
        if (isset($_GET['sampai_tanggal'])) {
            $sampai_tanggal = $_GET['sampai_tanggal'];
        }
        $data['result'] = $this->Laporan_model->get($dari_tanggal, $sampai_tanggal)->result();
        $data['dari_tanggal'] = $dari_tanggal;
        $data['sampai_tanggal'] = $sampai_tanggal;
        $data['title'] = 'Laporan Management Hotel';
        $data['konfigurasi'] = getKonfigurasi();
   
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan-management-hotel.pdf";
        $this->pdf->load_view('admin/laporan/cetakpdf', $data);
    }
}
