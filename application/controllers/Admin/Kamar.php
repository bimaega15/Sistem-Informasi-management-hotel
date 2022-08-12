<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kamar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $profile = check_profile();
        if ($profile->level == 'manager') {
            show_404();
        }
        $this->load->model(['Kamar/Kamar_model', 'Hotel/Hotel_model', 'Status/Status_kamar_model', 'Tipe/Tipe_kamar_model', 'Gambarkamar/Gambarkamar_model', 'Icon/Icon_model']);
    }
    public function index()
    {
        $this->breadcrumbs->push('Dashboard', 'Admin/Dashboard');
        $this->breadcrumbs->push('Kamar', 'Admin/Kamar');
        // output
        $data['breadcrumbs'] = $this->breadcrumbs->show();
        $data['title'] = 'Kamar Page';
        $data['result'] = $this->Kamar_model->allData()->result();
        $this->template->admin('admin/kamar/main', $data);
    }
    public function add()
    {
        $this->breadcrumbs->push('Dashboard', 'Admin/Dashboard');
        $this->breadcrumbs->push('Kamar', 'Admin/Kamar');
        $this->breadcrumbs->push('Tambah Kamar', 'Admin/Kamar/add');
        // output
        $data['breadcrumbs'] = $this->breadcrumbs->show();

        $obj = new stdClass();
        $obj->id_kamar = null;
        $obj->status_kamar_id = null;
        $obj->tipe_kamar_id = null;
        $obj->hotel_id = null;
        $obj->dewasa = null;
        $obj->anak = null;
        $obj->nama_kamar = null;
        $obj->no_kamar = null;
        $obj->keterangan = null;
        $obj->harga = null;
        $obj->slider = null;
        $obj->penawaran = null;
        $obj->icon_kamar = null;
        $obj->rekomendasi = null;
        $obj->gambar_kamar = null;

        $data['row'] = $obj;
        $data['title'] = 'Tambah Kamar Page';
        $data['page'] = 'tambah';
        $data['hotel'] = $this->Hotel_model->get()->row();
        $data['status'] = $this->Status_kamar_model->get()->result();
        $data['tipe'] = $this->Tipe_kamar_model->get()->result();
        $data['icon'] = $this->Icon_model->get()->result();
        $this->template->admin('admin/kamar/form_data', $data);
    }
    public function process()
    {
        $this->form_validation->set_rules('status_kamar_id', 'Status Kamar', 'required|trim');
        $this->form_validation->set_rules('tipe_kamar_id', 'Tipe Kamar', 'required|trim');
        $this->form_validation->set_rules('hotel_id', 'Hotel', 'required|trim');
        $this->form_validation->set_rules('dewasa', 'Dewasa', 'required|trim|numeric');
        $this->form_validation->set_rules('anak', 'Anak', 'required|trim|numeric');
        $this->form_validation->set_rules('nama_kamar', 'Nama kamar', 'required|trim');
        $this->form_validation->set_rules('no_kamar', 'No. kamar', 'required|trim|numeric');
        $this->form_validation->set_rules('harga', 'Harga', 'required|trim');
        $this->form_validation->set_rules('gambar_kamar', 'Gambar kamar', 'callback_validate_image');
        $this->form_validation->set_message('required', '{field} wajib diisi');
        $this->form_validation->set_message('numeric', '{field} harus berupa angka');
        $this->form_validation->set_error_delimiters('<small style="color:#f05154">', '</small><br>');
        if (isset($_POST['tambah'])) {
            if ($this->form_validation->run() == false) {
                return $this->add();
            } else {

                $data = [
                    'status_kamar_id'  => htmlspecialchars($this->input->post('status_kamar_id', true)),
                    'tipe_kamar_id'  => htmlspecialchars($this->input->post('tipe_kamar_id', true)),
                    'hotel_id'  => htmlspecialchars($this->input->post('hotel_id', true)),
                    'dewasa'  => htmlspecialchars($this->input->post('dewasa', true)),
                    'anak'  => htmlspecialchars($this->input->post('anak', true)),
                    'nama_kamar'  => htmlspecialchars($this->input->post('nama_kamar', true)),
                    'no_kamar'  => htmlspecialchars($this->input->post('no_kamar', true)),
                    'keterangan'  => htmlspecialchars($this->input->post('keterangan', true)),
                    'harga'  => htmlspecialchars(str_replace(',', '', $this->input->post('harga', true))),
                    'slider'  => htmlspecialchars($this->input->post('slider', true)),
                    'penawaran'  => htmlspecialchars($this->input->post('penawaran', true)),
                    'rekomendasi'  => htmlspecialchars($this->input->post('rekomendasi', true)),
                ];
                $database = $this->Kamar_model->insert($data);

                // gambar kamar
                $dataGambar = [
                    'gambar_kamar' => $this->uploadGambar(),
                    'pilihan' => 'utama',
                    'kamar_id' => $database
                ];
                $insGambar = $this->Gambarkamar_model->insert($dataGambar);

                if ($database > 0 || $insGambar > 0) {
                    $this->session->set_flashdata('success', 'Data Berhasil Ditambah');
                } else {
                    $this->session->set_flashdata('error', 'Data Gagal Ditambah');
                }
            }
        } else {
            if ($this->form_validation->run() == false) {
                $id = $this->input->post('id_kamar', true);
                return $this->edit($id);
            } else {
                $id = $this->input->post('id_kamar', true);
                $data = [
                    'status_kamar_id'  => htmlspecialchars($this->input->post('status_kamar_id', true)),
                    'tipe_kamar_id'  => htmlspecialchars($this->input->post('tipe_kamar_id', true)),
                    'hotel_id'  => htmlspecialchars($this->input->post('hotel_id', true)),
                    'dewasa'  => htmlspecialchars($this->input->post('dewasa', true)),
                    'anak'  => htmlspecialchars($this->input->post('anak', true)),
                    'nama_kamar'  => htmlspecialchars($this->input->post('nama_kamar', true)),
                    'no_kamar'  => htmlspecialchars($this->input->post('no_kamar', true)),
                    'keterangan'  => htmlspecialchars($this->input->post('keterangan', true)),
                    'harga'  => htmlspecialchars(str_replace(',', '', $this->input->post('harga', true))),
                    'slider'  => htmlspecialchars($this->input->post('slider', true)),
                    'rekomendasi'  => htmlspecialchars($this->input->post('rekomendasi', true)),
                    'penawaran'  => htmlspecialchars($this->input->post('penawaran', true)),
                ];
                $database = $this->Kamar_model->update($data, $id);

                // gambar kamar
                $gambarKamar = $this->db->get_where('gambar_kamar', ['kamar_id' => $id, 'pilihan' => 'utama'])->row();

                $id_gambar_kamar = $gambarKamar->id_gambar_kamar;
                $data = [
                    'gambar_kamar' => $this->uploadGambar($id_gambar_kamar),
                    'pilihan' => 'utama',
                    'kamar_id' => $id
                ];
                $update = $this->Gambarkamar_model->update($data, $id_gambar_kamar);
                if ($database > 0 || $update > 0) {
                    $this->session->set_flashdata('success', 'Data Berhasil Diupdate');
                } else {
                    $this->session->set_flashdata('error', 'Data Gagal Diupdate');
                }
            }
        }
        return redirect(base_url('Admin/Kamar'));
    }
    public function edit($id)
    {
        $this->breadcrumbs->push('Dashboard', 'Admin/Dashboard');
        $this->breadcrumbs->push('Kamar', 'Admin/Kamar');
        $this->breadcrumbs->push('Edit Kamar', 'Admin/Kamar/edit/' . $id);
        // output
        $data['breadcrumbs'] = $this->breadcrumbs->show();
        $data['row'] = $this->Kamar_model->allData($id)->row();
        $data['hotel'] = $this->Hotel_model->get()->row();
        $data['status'] = $this->Status_kamar_model->get()->result();
        $data['tipe'] = $this->Tipe_kamar_model->get()->result();
        $data['title'] = 'Edit Kamar Page';
        $data['page'] = 'edit';
        $data['icon'] = $this->Icon_model->get()->result();

        $gambarKamar = $this->Gambarkamar_model->get(null, $id)->row()->gambar_kamar;
        $obj = new stdClass();
        $obj->gambar_kamar = $gambarKamar;

        $obj_merged = (object) array_merge((array) $data['row'], (array) $obj);
        $data['row'] = $obj_merged;
        $this->template->admin('admin/kamar/form_data', $data);
    }
    public function delete($id)
    {
        $gambarKamar = $this->db->get_where('gambar_kamar', ['kamar_id' => $id, 'pilihan' => 'utama'])->row();
        $id_gambar_kamar = $gambarKamar->id_gambar_kamar;
        $this->removeImage($id_gambar_kamar);

        $database = $this->Kamar_model->delete($id);
        if ($database > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        } else {
            $this->session->set_flashdata('error', 'Data Gagal Dihapus');
        }
        return redirect(base_url('Admin/Kamar'));
    }
    public function detailKamar($id)
    {
        $row = $this->Kamar_model->allData($id)->row();
        $gambar = checkGambarKamar($row->id_kamar);
        if (isset($gambar->gambar_kamar)) {
            $o_gambar = '<a href="' . base_url('images/gambarkamar/' . $gambar->gambar_kamar) . '" target="_blank">
            <img class="w-100" src="' . base_url('images/gambarkamar/' . $gambar->gambar_kamar) . '">
        </a>';
        } else {
            $o_gambar = null;
        }
        $iconKamar = $this->Icon_model->get($row->icon_kamar)->row();

        $data = [
            'row' => $row,
            'gambar' => $o_gambar,
            'icon_kamar' => $iconKamar->nama_icon
        ];
        echo json_encode($data);
    }
    public function validate_image()
    {
        $check = TRUE;
        if (isset($_FILES['gambar_kamar']) && $_FILES['gambar_kamar']['size'] != 0) {
            $allowedExts = array("gif", "jpeg", "jpg", "png", "JPG", "JPEG", "GIF", "PNG");
            $allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
            $extension = pathinfo($_FILES["gambar_kamar"]["name"], PATHINFO_EXTENSION);
            $detectedType = exif_imagetype($_FILES['gambar_kamar']['tmp_name']);
            $type = $_FILES['gambar_kamar']['type'];
            if (!in_array($detectedType, $allowedTypes)) {
                $this->form_validation->set_message('validate_image', 'Type gambar tidak didukung');
                $check = FALSE;
            }
            if (filesize($_FILES['gambar_kamar']['tmp_name']) > 1000000) {
                $this->form_validation->set_message('validate_image', 'Gambar melebihi 1 MB');
                $check = FALSE;
            }
            if (!in_array($extension, $allowedExts)) {
                $this->form_validation->set_message('validate_image', "Tidak didukung format {$extension}");
                $check = FALSE;
            }
        } else {
            if ($_POST['page'] == 'tambah') {
                $this->form_validation->set_message('validate_image', "Gambar wajib diupload");
                $check = FALSE;
            }
        }
        return $check;
    }

    private function uploadGambar($id_gambar_kamar = '')
    {
        $gambar = $_FILES["gambar_kamar"]['name'];
        if ($gambar != null) {
            $this->removeImage($id_gambar_kamar);
            $config['upload_path'] = './images/gambarkamar';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['overwrite'] = true;
            $new_name = rand(1000, 100000) . time() . $_FILES["gambar_kamar"]['name'];
            $config['file_name'] = $new_name;
            // $config['max_size'] = 1024;
            // $config['max_width'] = 1024;
            // $config['max_height'] = 768;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('gambar_kamar')) {
                echo $this->upload->display_errors();
            } else {
                $gambar = $this->upload->data();
                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = './images/gambarkamar/' . $gambar['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = '50%';
                $config['new_image'] = './images/gambarkamar/' . $gambar['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                return $gambar['file_name'];
            }
        } else {
            $users = $this->Gambarkamar_model->get($id_gambar_kamar)->row();
            if ($users->gambar_kamar != '') {
                return $users->gambar_kamar;
            } else {
                return null;
            }
        }
    }

    private function removeImage($id)
    {
        if ($id != null) {
            $img = $this->Gambarkamar_model->get($id)->row();
            if ($img != null || $img != '') {
                $filename = explode('.', $img->gambar_kamar)[0];
                return array_map('unlink', glob(FCPATH . "images/gambarkamar/" . $filename . '.*'));
            }
        }
    }
}
