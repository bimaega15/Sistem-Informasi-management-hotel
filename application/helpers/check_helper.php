<?php
date_default_timezone_set('Asia/Jakarta');

function check_already_login()
{
    $ci = &get_instance();
    if (get_cookie('cookie')) {
        $cookie = (get_cookie('cookie'));

        $row = $ci->db->get_where('users', ['cookie' => $cookie])->row();
        $ci->session->set_userdata([
            'level' => $row->level,
            'id_users' => $row->id_users,
        ]);
        return redirect(base_url('Admin/Home'));
    }
    $session = $ci->session->userdata('level');
    switch ($session) {
        case 'admin':
            return redirect(base_url('Admin/Home'));
            break;
        case 'manager':
            return redirect(base_url('Admin/Home'));
            break;
        case 'kasir':
            return redirect(base_url('Admin/Home'));
            break;
    }
}
function check_not_login()
{
    $ci = &get_instance();
    $current_url = current_url();
    if (!$ci->session->has_userdata('id_users')) {
        $ci->session->set_flashdata('error', 'Maaf anda belum login');
        redirect(base_url('Login?redirect=' . $current_url));
    }
}

function check_profile()
{
    $ci = &get_instance();
    $model = $ci->load->model('Users/Users_model');
    $session_id = $ci->session->userdata('id_users');
    $rows = $ci->Users_model->get($session_id)->row();
    return $rows;
}
function check_profile_tamu()
{
    $ci = &get_instance();
    $model = $ci->load->model('Tamu/Tamu_model');
    $session_id = $ci->session->userdata('tamu_id');
    $rows = $ci->Tamu_model->get($session_id)->row();
    return $rows;
}


function slug($text)
{
    // replace non letter or digits by -
    $text = preg_replace('~[^\\pL\d]+~u', '-', $text);
    // trim
    $text = trim($text, '-');
    // transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    // lowercase
    $text = strtolower($text);
    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);
    if (empty($text)) {
        return 'n-a';
    }
    return $text;
}

function tanggal($perintah, $tanggal)
{
    if ($perintah == "hari") {
        $bulan     = date('m', strtotime($tanggal));
        $hari     = date('l', strtotime($tanggal));

        if ($hari == 'Sunday') {
            $nama_hari = 'Minggu';
        } elseif ($hari == 'Monday') {
            $nama_hari = 'Senin';
        } elseif ($hari == 'Tuesday') {
            $nama_hari = 'Selasa';
        } elseif ($hari == 'Wednesday') {
            $nama_hari = 'Rabu';
        } elseif ($hari == 'Thursday') {
            $nama_hari = 'Kamis';
        } elseif ($hari == 'Friday') {
            $nama_hari = 'Jumat';
        } elseif ($hari == 'Saturday') {
            $nama_hari = 'Sabtu';
        }

        if ($bulan == '01') {
            $nama_bulan = 'Januari';
        } elseif ($bulan == '02') {
            $nama_bulan = 'Februari';
        } elseif ($bulan == '03') {
            $nama_bulan = 'Maret';
        } elseif ($bulan == '04') {
            $nama_bulan = 'April';
        } elseif ($bulan == '05') {
            $nama_bulan = 'Mei';
        } elseif ($bulan == '06') {
            $nama_bulan = 'Juni';
        } elseif ($bulan == '07') {
            $nama_bulan = 'Juli';
        } elseif ($bulan == '08') {
            $nama_bulan = 'Agustus';
        } elseif ($bulan == '09') {
            $nama_bulan = 'September';
        } elseif ($bulan == '10') {
            $nama_bulan = 'Oktober';
        } elseif ($bulan == '11') {
            $nama_bulan = 'November';
        } elseif ($bulan == '12') {
            $nama_bulan = 'Desember';
        }

        $hasil = $nama_hari . ', ' . date('d', strtotime($tanggal)) . ' ' . $nama_bulan . ' ' . date('Y', strtotime($tanggal));
        // Output
        return $hasil;
    } elseif ($perintah == "tanggal_id") {
        if ($tanggal == '' || $tanggal == NULL || $tanggal == '0000-00-00' || $tanggal == '1970-01-01') {
            return FALSE;
        } else {
            $hasil = date('d-m-Y', strtotime($tanggal));
            return $hasil;
        }
    } elseif ($perintah == "tanggal_bulan") {
        if ($tanggal == '' || $tanggal == NULL || $tanggal == '0000-00-00' || $tanggal == '1970-01-01') {
            return FALSE;
        } else {
            $hasil = date('Y-m-d', strtotime($tanggal));
            return $hasil;
        }
    } elseif ($perintah == "tanggal_input") {
        if ($tanggal == '' || $tanggal == NULL || $tanggal == '0000-00-00' || $tanggal == '1970-01-01') {
            $hasil = NULL;
            return $hasil;
        } else {

            $hasil = date('Y-m-d', strtotime($tanggal));
            return $hasil;
        }
    } elseif ($perintah == "tanggal_bulan") {
        if ($tanggal == '' || $tanggal == NULL || $tanggal == '0000-00-00' || $tanggal == '1970-01-01') {
            $hasil = '';
            return $hasil;
        } else {
            $bulan     = date('m', strtotime($tanggal));
            $hari     = date('l', strtotime($tanggal));
            if ($hari == 'Sunday') {
                $nama_hari = 'Minggu';
            } elseif ($hari == 'Monday') {
                $nama_hari = 'Senin';
            } elseif ($hari == 'Tuesday') {
                $nama_hari = 'Selasa';
            } elseif ($hari == 'Wednesday') {
                $nama_hari = 'Rabu';
            } elseif ($hari == 'Thursday') {
                $nama_hari = 'Kamis';
            } elseif ($hari == 'Friday') {
                $nama_hari = 'Jumat';
            } elseif ($hari == 'Saturday') {
                $nama_hari = 'Sabtu';
            }
            if ($bulan == '01') {
                $nama_bulan = 'Januari';
            } elseif ($bulan == '02') {
                $nama_bulan = 'Februari';
            } elseif ($bulan == '03') {
                $nama_bulan = 'Maret';
            } elseif ($bulan == '04') {
                $nama_bulan = 'April';
            } elseif ($bulan == '05') {
                $nama_bulan = 'Mei';
            } elseif ($bulan == '06') {
                $nama_bulan = 'Juni';
            } elseif ($bulan == '07') {
                $nama_bulan = 'Juli';
            } elseif ($bulan == '08') {
                $nama_bulan = 'Agustus';
            } elseif ($bulan == '09') {
                $nama_bulan = 'September';
            } elseif ($bulan == '10') {
                $nama_bulan = 'Oktober';
            } elseif ($bulan == '11') {
                $nama_bulan = 'November';
            } elseif ($bulan == '12') {
                $nama_bulan = 'Desember';
            }
            $hasil = date('d', strtotime($tanggal)) . ' ' . $nama_bulan . ' ' . date('Y', strtotime($tanggal));
            return $hasil;
        }
    } elseif ($perintah == 'insert') {
        $exp = explode('-', $tanggal);
        $fix = $exp[2] . '-' . $exp[1] . '-' . $exp[0];
        return $fix;
    }
}

function rupiah($nominal)
{
    $rupiah = number_format($nominal, 0, '.', ',');
    return $rupiah;
}


function wordTextSlider($text, $limit, $url)
{
    if (strlen($text) > $limit) {
        $word = strip_tags($text);
        $word = mb_substr($word, 0, $limit) . "<br><br> <a href='" . $url . "' class='btn btn-info btn-detail-keterangan' style='padding: 10px 20px;'>Lihat detail</a> ";
    } else {
        $word = $text;
    }
    return ($word);
}
function wordTextClient($text, $limit, $url, $modal = 'modalClient')
{
    if (strlen($text) > $limit) {
        $word = strip_tags($text);
        $word = mb_substr($word, 0, $limit) . "<br><br> <a data-url='" . $url . "' class='btn btn-info btn-detail-keterangan' style='padding: 10px 20px; cursor:pointer;' data-toggle='modal' data-target='#" . $modal . "'>Lihat detail</a> ";
    } else {
        $word = $text;
    }
    return ($word);
}
function btnDetailName($url, $modal, $nama)
{

    $word = "<a data-url='" . $url . "' class='btn btn-info " . $nama . " btn-sm' style='padding: 10px 20px; cursor:pointer;' data-toggle='modal' data-target='#" . $modal . "'>Lihat detail</a> ";

    return ($word);
}


function wordText($text, $limit)
{
    if (strlen($text) > $limit) {
        $word = strip_tags($text);
        $word = mb_substr($word, 0, $limit) . "...";
    } else {
        $word = $text;
    }
    return ($word);
}

function checkReviews($id_jasa_wisata)
{
    $ci = &get_instance();
    $get = $ci->db->get_where('transaksi_wisata', ['jasa_wisata_id' => $id_jasa_wisata, 'nilai != ' => null])->num_rows();
    return $get;
}

function checkStar($id_jasa_wisata)
{
    $ci = &get_instance();
    $get = $ci->db->get_where('transaksi_wisata', ['jasa_wisata_id' => $id_jasa_wisata, 'nilai != ' => null]);
    $total = 0;
    $rows = $get->num_rows();
    foreach ($get->result() as $v_get) {
        $total += $v_get->nilai;
    }
    if ($rows != null) {
        $hitung = $total / $rows;
        $fix = number_format($hitung, 1, '.', '');
        return floatval($fix);
    } else {
        return 0;
    }
}

function diffForHuman($tanggal)
{
    $seconds = strtotime($tanggal) - time();

    $days = floor($seconds / 86400);
    $seconds %= 86400;

    $hours = floor($seconds / 3600);
    $seconds %= 3600;

    $minutes = floor($seconds / 60);
    $seconds %= 60;


    echo "$days days and $hours hours and $minutes minutes and $seconds seconds";
}
function checkGambarKamar($id_kamar)
{

    $ci = &get_instance();
    $ci->load->model('Gambarkamar/Gambarkamar_model');
    $get = $ci->Gambarkamar_model->getImageMain($id_kamar)->row();
    return $get;
}
function checkGambarKamarSlider($id_kamar)
{

    $ci = &get_instance();
    $ci->load->model('Gambarkamar/Gambarkamar_model');
    $get = $ci->Gambarkamar_model->getImage($id_kamar)->result();
    return $get;
}
function checkFasilitas($id_kamar)
{

    $ci = &get_instance();
    $ci->load->model('Fasilitas/Fasilitas_model');
    $get = $ci->Fasilitas_model->getKamar($id_kamar)->result();
    return $get;
}
function checkTipeKamar($id_tipe_kamar)
{

    $ci = &get_instance();
    $ci->load->model('Tipe/Tipe_kamar_model');
    $get = $ci->Tipe_kamar_model->get($id_tipe_kamar)->row();
    return $get;
}
function checkStatusTipeKamar($kamar_id)
{

    $ci = &get_instance();
    $ci->load->model(['Kamar/Kamar_model']);
    $get = $ci->Kamar_model->allData($kamar_id)->row();
    return $get;
}
function checkStatusKamar($status_kamar_id)
{

    $ci = &get_instance();
    $ci->load->model('Status/Status_kamar_model');
    $get = $ci->Status_kamar_model->get($status_kamar_id)->row();
    return $get;
}
function checkKamar($id_kamar)
{

    $ci = &get_instance();
    $ci->load->model('Kamar/Kamar_model');
    $get = $ci->Kamar_model->get($id_kamar)->row();
    return $get;
}
function check_icon($id_icon)
{

    $ci = &get_instance();
    $ci->load->model('Icon/Icon_model');
    $get = $ci->Icon_model->get($id_icon);
    return $get;
}
function getKonfigurasi()
{
    $ci = &get_instance();
    $get = $ci->db->get('konfigurasi')->row();
    return $get;
}
function rupiahKonversi($nominal)
{
    $get = explode('/', $nominal);
    $tanggal = $get[2] . '-' . $get[0] . '-' . $get[1];
    return $tanggal;
}
function checkTransaksi()
{
    $ci = &get_instance();
    $ci->load->model(['Kamar/Kamar_model', 'Reservasi/Reservasi_model', 'History/History_model']);
    $profile = check_profile_tamu();
    if ($profile != null) {
        $get = $ci->History_model->allData($profile->id_tamu)->result();
        if ($get != null) {
            foreach ($get as $v_get) {
                if ($v_get->status == 'menunggu') {
                    $tanggal_batas = strtotime($v_get->konfirmasi_pembayaran);
                    $tanggal_awal = strtotime($v_get->tanggal);
                    if (time() > $tanggal_batas) {
                        $data_reservasi = [
                            'status' => 'batal'
                        ];
                        $update_reservasi = $ci->Reservasi_model->update($data_reservasi, $v_get->id_reservasi);

                        $data_kamar = [
                            'status_kamar_id' => 2
                        ];
                        $update_kamar = $ci->Kamar_model->update($data_kamar, $v_get->kamar_id);
                    }
                }
            }
        }
    }
}

function get_tanggal_indo($tanggal)
{
    $tanggal = explode('-', $tanggal);
    $fix_tanggal[0] = $tanggal[2];
    $fix_tanggal[1] = $tanggal[1];
    $fix_tanggal[2] = $tanggal[0];
    $tanggal_indo =  implode('-', $fix_tanggal);
    return $tanggal_indo;
}

function check_rekening($id_rekening)
{
    $ci = &get_instance();
    $ci->load->model('Rekening/Rekening_model');
    $rekening = $ci->Rekening_model->get($id_rekening);
    return $rekening;
}
function check_tipe_kamar($id_tipe_kamar)
{
    $ci = &get_instance();
    $ci->load->model('Tipe/Tipe_kamar_model');
    $tipe_kamar = $ci->Tipe_kamar_model->get($id_tipe_kamar);
    return $tipe_kamar;
}
function penyebut($nilai)
{
    $nilai = abs($nilai);
    $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
    $temp = "";
    if ($nilai < 12) {
        $temp = " " . $huruf[$nilai];
    } else if ($nilai < 20) {
        $temp = penyebut($nilai - 10) . " belas";
    } else if ($nilai < 100) {
        $temp = penyebut($nilai / 10) . " puluh" . penyebut($nilai % 10);
    } else if ($nilai < 200) {
        $temp = " seratus" . penyebut($nilai - 100);
    } else if ($nilai < 1000) {
        $temp = penyebut($nilai / 100) . " ratus" . penyebut($nilai % 100);
    } else if ($nilai < 2000) {
        $temp = " seribu" . penyebut($nilai - 1000);
    } else if ($nilai < 1000000) {
        $temp = penyebut($nilai / 1000) . " ribu" . penyebut($nilai % 1000);
    } else if ($nilai < 1000000000) {
        $temp = penyebut($nilai / 1000000) . " juta" . penyebut($nilai % 1000000);
    } else if ($nilai < 1000000000000) {
        $temp = penyebut($nilai / 1000000000) . " milyar" . penyebut(fmod($nilai, 1000000000));
    } else if ($nilai < 1000000000000000) {
        $temp = penyebut($nilai / 1000000000000) . " trilyun" . penyebut(fmod($nilai, 1000000000000));
    }
    return $temp;
}

function terbilang($nilai)
{
    if ($nilai < 0) {
        $hasil = "minus " . trim(penyebut($nilai));
    } else {
        $hasil = trim(penyebut($nilai));
    }
    return $hasil;
}

function imageEncode($type, $gambar)
{
    return 'data:image/' . $type . ';base64,' . base64_encode($gambar);
}
