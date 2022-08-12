<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Kamar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Kamar/Kamar_model', 'Reservasi/Reservasi_model', 'Pembayaran/Pembayaran_model', 'Konfigurasi/Konfigurasi_model', 'Tamu/Tamu_model']);
    }
    public function index()
    {
        $data['title'] = 'Kamar Pages';
        $dari_tanggal = null;
        $sampai_tanggal = null;
        $dari_harga = null;
        $sampai_harga = null;
        $berapa_kamar = null;
        $berapa_orang = null;
        $check = null;
        $search = null;

        if (isset($_GET['search'])) {
            $search = $this->input->get('search', true);
        }
        if (isset($_GET['dari_tanggal'])) {
            $dari_tanggal = $this->input->get('dari_tanggal', true);
            $sampai_tanggal = $this->input->get('sampai_tanggal', true);
            $dari_harga =  ($this->input->get('dari_harga', true));
            $sampai_harga = ($this->input->get('sampai_harga', true));
            $berapa_kamar = $this->input->get('berapa_kamar', true);
            $berapa_orang = $this->input->get('berapa_orang', true);
        }



        $config = array();
        $config["base_url"] = base_url('Front/Kamar/index/');
        $config["per_page"] = 9;
        $config["uri_segment"] = 4;
        $config["use_page_numbers"] = TRUE;
        $config["full_tag_open"] = '<ul class="pagination">';
        $config["full_tag_close"] = '</ul>';
        $config["first_tag_open"] = '<li>';
        $config["first_tag_close"] = '</li>';
        $config["last_tag_open"] = '<li>';
        $config["last_tag_close"] = '</li>';
        $config['next_link'] = '&raquo;';
        $config["next_tag_open"] = '<li>';
        $config["next_tag_close"] = '</li>';
        $config["prev_link"] = "&laquo;";
        $config["prev_tag_open"] = "<li>";
        $config["prev_tag_close"] = "</li>";
        $config["cur_tag_open"] = "<li class='active'><a href='#'>";
        $config["cur_tag_close"] = "</a></li>";
        $config["num_tag_open"] = "<li>";
        $config["num_tag_close"] = "</li>";
        $config["num_links"] = 1;

        $page = $this->uri->segment(4) == null ? 1 : $this->uri->segment(4);
        $start = ($page - 1) * $config["per_page"];
        $result = $this->Kamar_model->get(null, $config["per_page"], $start, null, null, $dari_harga, $sampai_harga, $berapa_kamar, $berapa_orang, $search)->result();


        $config["total_rows"] = $this->Kamar_model->get(null, null, null, null, null, $dari_harga, $sampai_harga, null, $berapa_orang, $search)->num_rows();
        $this->pagination->initialize($config);
        if ($dari_tanggal != null && $sampai_tanggal != null) {
            foreach ($result as $v_result) {
                $check[] = $this->Reservasi_model->checkKamar(null, $dari_tanggal, $sampai_tanggal, $v_result->id_kamar)->result();
            }
        }
        $data['pagination_link'] = $this->pagination->create_links();
        $data['count'] = count($result);
        $data['result']  = $result;

        $this->template->front('front/kamar/main', $data);
    }
    public function detail($id_kamar)
    {
        $data['title'] = 'Kamar Detail Page';
        $result =  $this->Kamar_model->allData($id_kamar)->row();
        $data['row'] = $result;
        $data['gambar_slider'] = checkGambarKamarSlider($result->id_kamar);
        $data['fasilitas'] = checkFasilitas($result->id_kamar);

        $this->template->front('front/kamar/detail', $data);
    }
    public function Order()
    {
        $tanggal = date('Y-m-d H:i:s');
        $id_kamar = htmlspecialchars($this->input->post('kamar_id', true));
        $tamu_id = check_profile_tamu();
        $data = [
            'kamar_id' => $id_kamar,
            'check_in' => htmlspecialchars(tanggal('insert', $this->input->post('check_in', true))),
            'check_out' => htmlspecialchars(tanggal('insert', $this->input->post('check_out', true))),
            'tanggal' => $tanggal,
            'konfirmasi_pembayaran' => date('Y-m-d H:i:s', strtotime('+30 minutes', strtotime($tanggal))),
            'tamu_id' => $tamu_id->id_tamu,
            'status' => 'menunggu'
        ];
        // $insertReservasi = 31;
        $insertReservasi = $this->Reservasi_model->insert($data);

        $data_update_kamar = [
            'status_kamar_id' => 3
        ];
        $kamar_update = $this->Kamar_model->update($data_update_kamar, $id_kamar);

        $email = htmlspecialchars($this->input->post('email', true));
        $nameAccount = htmlspecialchars($this->input->post('nama_depan', true)) . ' ' . htmlspecialchars($this->input->post('nama_belakang', true));
        $data_pembayaran = [
            'nama_depan' => htmlspecialchars($this->input->post('nama_depan', true)),
            'nama_belakang' => htmlspecialchars($this->input->post('nama_belakang', true)),
            'total_bayar' => htmlspecialchars($this->input->post('total', true)),
            'status_orderan' => 'belum dibayar',
            'keterangan' => htmlspecialchars($this->input->post('keterangan', true)),
            'email' => $email,
            'no_hp' => htmlspecialchars($this->input->post('no_hp', true)),
            'alamat_1' => htmlspecialchars($this->input->post('alamat_1', true)),
            'alamat_2' => htmlspecialchars($this->input->post('alamat_2', true)),
            'tamu_id' => $tamu_id->id_tamu,
            'reservasi_id' => $insertReservasi
        ];
        $insertPembayaran = $this->Pembayaran_model->insert($data_pembayaran);

        // check pembayaran
        $id_reservasi = $insertReservasi;
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


        $konfigurasi = getKonfigurasi();
        $data['konfigurasi'] = $konfigurasi;
        // $html = $this->load->view('template/email/invoice', $data);
        // return $html;
        $html = $this->load->view('template/email/invoice', $data, true);
        $this->sendEmail($html, $email, $nameAccount);


        if ($insertPembayaran > 0 || $kamar_update > 0 || $insertReservasi > 0) {
            $this->session->set_flashdata('success_toastr', 'Berhasil Order Kamar Hotel');
        } else {
            $this->session->set_flashdata('error_toastr', 'Gagal Order Kamar Hotel');
        }
        return redirect(base_url('Front/Riwayat'));
    }
    private function sendEmail($html, $toEmail = null, $nameAccount = null)
    {
        $name = 'Admin hotel';
        $to = $toEmail;
        $toName = $nameAccount;
        $subject = 'Booking pembayaran hotel';
        $body = $html;

        $from = '1655400009@radenfatah.ac.id';
        $password = 'imamparidaferdi';


        $mail = new PHPMailer();
        $mail->IsSMTP();

        $mail->SMTPDebug = 0;
        $mail->SMTPAuth   = TRUE;
        $mail->SMTPSecure = "ssl";
        $mail->Host       = "smtp.gmail.com";
        $mail->Port       = 465;
        $mail->Username   = $from;
        $mail->Password   = $password;

        $mail->IsHTML(true);
        $mail->SetFrom($from, $name);
        $mail->AddAddress($to, $toName);

        $konfigurasi = getKonfigurasi();

        // file
        $mail->AddEmbeddedImage('images/konfigurasi/' . $konfigurasi->gambar_sistem, 'gambar_sistem');

        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->Send();
    }
}
