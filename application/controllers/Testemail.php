<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Testemail extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $konfigurasi = getKonfigurasi();
        $data['konfigurasi'] = $konfigurasi;

        // $html = $this->load->view('template/email/invoice', $data);
        $html = $this->load->view('template/email/invoice', $data, true);
        $this->sendEmail($html);
    }
    function sendEmail($html)
    {
        $name = 'Admin hotel';
        $to = 'bimaega15@gmail.com';
        $subject = 'Booking pembayaran hotel';
        $body = $html;

        $from = '1655400009@radenfatah.ac.id';
        $password = 'imamparidaferdi';


        $mail = new PHPMailer();
        $mail->IsSMTP();

        $mail->SMTPDebug = 4;
        $mail->SMTPAuth   = TRUE;
        $mail->SMTPSecure = "ssl";
        $mail->Host       = "smtp.gmail.com";
        $mail->Port       = 465;
        $mail->Username   = $from;
        $mail->Password   = $password;

        $mail->IsHTML(true);
        $mail->SetFrom($from, $name);
        $mail->AddAddress("bimaega15@gmail.com", "Bima Ega");

        $konfigurasi = getKonfigurasi();

        // file
        $mail->AddEmbeddedImage('images/konfigurasi/' . $konfigurasi->gambar_sistem, 'gambar_sistem');

        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->Send();
    }
}
