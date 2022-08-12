<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Riwayat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['History/History_model', 'Reservasi/Reservasi_model', 'Pembayaran/Pembayaran_model', 'Kamar/Kamar_model', 'Rekening/Rekening_model']);
        $profile = check_profile_tamu();
        if ($profile == null) {
            show_404();
        }
    }
    public function index()
    {
        $data['title'] = 'Riwayat Page';
        $profile = check_profile_tamu();
        $get = $this->History_model->allData($profile->id_tamu)->result();
        $data['result'] = $get;
        $data['rekening'] = $this->Rekening_model->get()->result();
        $this->template->front('front/riwayat/main', $data);
    }
    public function detail($id_reservasi)
    {
        $reservasi = $this->Reservasi_model->get($id_reservasi)->row();
        $kamar =  $this->Kamar_model->allData($reservasi->kamar_id)->row();
        $pembayaran = $this->Pembayaran_model->get(null, $id_reservasi)->row();

        $check_in = strtotime($reservasi->check_in);
        $check_out = strtotime($reservasi->check_out);
        $selisih = $check_out - $check_in;
        $hari = $selisih / 60 / 60 / 24;

        $data['pesan_per_malam'] = $hari;
        $data['kamar'] = $kamar;
        $data['gambar_slider'] = checkGambarKamarSlider($kamar->id_kamar);
        $data['fasilitas'] = checkFasilitas($kamar->id_kamar);

        $account = null;
        if (isset($_GET['account'])) {
            $account = $_GET['account'];
        }
        $data['account'] = $account;
        $data['title'] = 'Detail Riwayat Page';
        $profile = check_profile_tamu();
        $get = $this->History_model->allData(null, $reservasi->id_reservasi)->row();

        $data['result'] = $get;
        if ($get->rekening_id != null) {
            $data['rekening'] = $this->Rekening_model->get($get->rekening_id)->row();
        } else {
            $data['rekening'] = null;
        }
        $data['pembayaran'] = $pembayaran;
        $this->template->front('front/riwayat/detail', $data);
    }
    public function detailReservasi($id_reservasi)
    {
        $get = $this->Reservasi_model->get($id_reservasi)->row();
        echo json_encode($get);
    }
    public function detailTamu($id_tamu)
    {
        $get = $this->Pembayaran_model->get($id_tamu)->row();
        if ($get->rekening_id != null) {
            $rekening = $this->Rekening_model->get($get->rekening_id)->row();
        } else {
            $rekening = null;
        }
        $data = [
            'pembayaran' => $get,
            'rekening' => $rekening
        ];
        echo json_encode($data);
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
    public function uploadPembayaran()
    {
        $id_reservasi = htmlspecialchars($this->input->post('id_reservasi', true));
        $id_pembayaran = htmlspecialchars($this->input->post('id_pembayaran', true));
        $rekening_id = htmlspecialchars($this->input->post('rekening_id', true));
        $bayar_ditempat = htmlspecialchars($this->input->post('bayar_ditempat', true));
        $data = [
            'bukti_transfer' => $this->uploadGambar($id_pembayaran),
            'status_orderan' => 'menunggu',
            'rekening_id' =>  $rekening_id,
            'bayar_ditempat' => $bayar_ditempat
        ];
        $pembayaran = $this->Pembayaran_model->update($data, $id_pembayaran);

        $data_reservasi = [
            'status' => 'menunggu konfirmasi'
        ];
        $reservasi = $this->Reservasi_model->update($data_reservasi, $id_reservasi);

        if ($pembayaran > 0 || $reservasi > 0) {
            $this->session->set_flashdata('success_toastr', 'Berhasil upload pembayaran');
        } else {
            $this->session->set_flashdata('error_toastr', 'Gagal upload pembayaran');
        }
        return redirect(base_url('Front/Riwayat'));
    }
    private function uploadGambar($id = null)
    {
        $gambar = $_FILES['bukti_transfer']['name'];
        if ($gambar != null) {
            if ($id != null) {
                $this->removeImage($id);
            }
            $config['upload_path'] = './images/pembayaran';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['overwrite'] = true;
            $new_name = rand(1000, 100000) . time() . $_FILES["bukti_transfer"]['name'];
            $config['file_name'] = $new_name;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('bukti_transfer')) {
                echo $this->upload->display_errors();
            } else {
                $gambar = $this->upload->data();
                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = './images/pembayaran/' . $gambar['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = '50%';
                $config['new_image'] = './images/pembayaran/' . $gambar['file_name'];
                $this->load->library('image_lib', $config);
                $this->upload->initialize($config);
                $this->image_lib->resize();

                return $gambar['file_name'];
            }
        } else {
            if ($id != null) {
                $pembayaran = $this->db->get_where('pembayaran', ['id_pembayaran' => $id])->row();
                if ($pembayaran->bukti_transfer != 'default.png') {
                    return $pembayaran->bukti_transfer;
                } else {
                    return 'default.png';
                }
            } else {
                return 'default.png';
            }
        }
    }
    private function removeImage($id)
    {
        $select_image = $this->db->get_where('pembayaran', ['id_pembayaran' => $id])->row();

        if ($select_image->bukti_transfer != 'default.png') {
            $filename = explode('.', $select_image->bukti_transfer)[0];
            return array_map('unlink', glob(FCPATH . "images/pembayaran/" . $filename . '.*'));
        }
    }
}
