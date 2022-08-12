<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reservasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $profile = check_profile();
        if ($profile->level == 'manager') {
            show_404();
        }
        $this->load->model(['History/History_model', 'Pembayaran/Pembayaran_model', 'Reservasi/Reservasi_model', 'Kamar/Kamar_model']);
    }
    public function index()
    {
        $this->breadcrumbs->push('Dashboard', 'Admin/Dashboard');
        $this->breadcrumbs->push('Reservasi', 'Admin/Reservasi');
        // output
        $data['breadcrumbs'] = $this->breadcrumbs->show();
        $data['title'] = 'Reservasi Page';

        $get = $this->History_model->allData()->result();
        $data['result'] = $get;

        $this->template->admin('admin/reservasi/main', $data);
    }
    public function konfirmasiPembayaran()
    {
        $id_pembayaran = $this->input->post('id_pembayaran', true);
        $status_orderan = htmlspecialchars($this->input->post('status_orderan', true));
        $data_pembayaran = [
            'status_orderan'  => $status_orderan,
        ];
        $pembayaran = $this->Pembayaran_model->update($data_pembayaran, $id_pembayaran);

        $id_reservasi = $this->input->post('id_reservasi', true);
        $status = $status_orderan == 'dibayar' ? 'konfirmasi' : 'batal';
        $data_reservasi = [
            'status'  => $status,
        ];
        $reservasi = $this->Reservasi_model->update($data_reservasi, $id_reservasi);
        if ($reservasi > 0 || $pembayaran > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil Dikonfirmasi');
        } else {
            $this->session->set_flashdata('error', 'Data Gagal Dikonfirmasi');
        }
        return redirect(base_url('Admin/Reservasi'));
    }
    public function checkIn($id_reservasi)
    {
        $check = $this->Reservasi_model->get($id_reservasi)->row();
        $data = [
            'status_kamar_id' => 4
        ];
        $kamar = $this->Kamar_model->update($data, $check->kamar_id);
        if ($kamar > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil Check in');
        } else {
            $this->session->set_flashdata('error', 'Data Gagal Check in');
        }
        return redirect(base_url('Admin/Reservasi'));
    }
    public function checkOut($id_reservasi)
    {
        $check = $this->Reservasi_model->get($id_reservasi)->row();
        $data_reservasi = [
            'status' => 'check out'
        ];
        $reservasi = $this->Reservasi_model->update($data_reservasi, $check->id_reservasi);

        $data = [
            'status_kamar_id' => 2
        ];
        $kamar = $this->Kamar_model->update($data, $check->kamar_id);
        if ($kamar > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil Check out');
        } else {
            $this->session->set_flashdata('error', 'Data Gagal Check out');
        }
        return redirect(base_url('Admin/Reservasi'));
    }
}
