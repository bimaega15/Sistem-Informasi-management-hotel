<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gambarkamar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $profile = check_profile();
        if ($profile->level == 'manager') {
            show_404();
        }
        $this->load->model(['Kamar/Kamar_model', 'Gambarkamar/Gambarkamar_model']);
    }
    public function index()
    {
        $this->breadcrumbs->push('Dashboard', 'Admin/Dashboard');
        $this->breadcrumbs->push('Gambar kamar', 'Admin/Gambarkamar');
        // output
        $data['breadcrumbs'] = $this->breadcrumbs->show();
        $data['title'] = 'Gambar kamar Page';
        $data['result'] = $this->Gambarkamar_model->allData()->result();
        $this->template->admin('admin/gambarkamar/main', $data);
    }
    public function add()
    {
        $this->breadcrumbs->push('Dashboard', 'Admin/Dashboard');
        $this->breadcrumbs->push('Gambar Kamar', 'Admin/Gambarkamar');
        $this->breadcrumbs->push('Tambah Gambar Kamar', 'Admin/Gambarkamar/add');
        // output
        $data['breadcrumbs'] = $this->breadcrumbs->show();

        $obj = new stdClass();
        $obj->id_gambar_kamar = null;
        $obj->pilihan = null;
        $obj->gambar_kamar = null;
        $obj->kamar_id = null;
        $data['row'] = $obj;
        $data['title'] = 'Tambah Gambar Kamar Page';
        $data['page'] = 'tambah';
        $data['kamar'] = $this->Kamar_model->allData()->result();

        $this->template->admin('admin/gambarkamar/form_data', $data);
    }
    public function process()
    {
        $this->form_validation->set_rules('kamar_id', 'Kamar', 'required|trim');
        $this->form_validation->set_message('required', '{field} wajib diisi');
        $this->form_validation->set_error_delimiters('<small style="color:#f05154">', '</small><br>');
        if (isset($_POST['tambah'])) {
            if ($this->form_validation->run() == false) {
                return $this->add();
            } else {
                $database = $this->uploadMultipleImage();
                if ($database > 0) {
                    $this->session->set_flashdata('success', 'Data Berhasil Ditambah');
                } else {
                    $this->session->set_flashdata('error', 'Data Gagal Ditambah');
                }
            }
        } else {
            if ($this->form_validation->run() == false) {
                $id = $this->input->post('id_gambar_kamar', true);
                return $this->edit($id);
            } else {
                $id = $this->input->post('id_gambar_kamar', true);
                $data = [
                    'kamar_id'  => htmlspecialchars($this->input->post('kamar_id', true)),
                    'gambar_kamar'  => $this->uploadGambar($id),
                ];
                $database = $this->Gambarkamar_model->update($data, $id);
                if ($database > 0) {
                    $this->session->set_flashdata('success', 'Data Berhasil Diupdate');
                } else {
                    $this->session->set_flashdata('error', 'Data Gagal Diupdate');
                }
            }
        }

        return redirect(base_url('Admin/Gambarkamar'));
    }
    public function edit($id)
    {
        $this->breadcrumbs->push('Dashboard', 'Admin/Dashboard');
        $this->breadcrumbs->push('Gambar Kamar', 'Admin/Gambarkamar');
        $this->breadcrumbs->push('Edit Gambar Kamar', 'Admin/Gambarkamar/edit/' . $id);
        // output
        $data['breadcrumbs'] = $this->breadcrumbs->show();
        $data['row'] = $this->Gambarkamar_model->allData($id)->row();

        $data['kamar'] = $this->Kamar_model->allData()->result();
        $data['title'] = 'Edit Gambar Kamar Page';
        $data['page'] = 'edit';
        $this->template->admin('admin/gambarkamar/form_data', $data);
    }
    public function delete($id)
    {
        $this->removeImage($id);
        $database = $this->Gambarkamar_model->delete($id);
        if ($database > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        } else {
            $this->session->set_flashdata('error', 'Data Gagal Dihapus');
        }
        return redirect(base_url('Admin/Gambarkamar'));
    }
    private function removeImage($id)
    {
        $select_image = $this->db->get_where('gambar_kamar', ['id_gambar_kamar' => $id])->row();

        if ($select_image->gambar_kamar != 'default.png' && $select_image != '') {
            $filename = explode('.', $select_image->gambar_kamar)[0];
            return array_map('unlink', glob(FCPATH . "images/gambarkamar/" . $filename . '.*'));
        }
    }
    public function uploadMultipleImage()
    {
        if ($_FILES["gambar_kamar"]["name"][0] != '') {
            $config['upload_path'] = './images/gambarkamar';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            for ($count = 0; $count < count($_FILES["gambar_kamar"]["name"]); $count++) {
                $_FILES["file"]["name"] = rand(1000, 100000) . time() . $_FILES["gambar_kamar"]['name'][$count];
                $_FILES["file"]["type"] = $_FILES["gambar_kamar"]["type"][$count];
                $_FILES["file"]["tmp_name"] = $_FILES["gambar_kamar"]["tmp_name"][$count];
                $_FILES["file"]["error"] = $_FILES["gambar_kamar"]["error"][$count];
                $_FILES["file"]["size"] = $_FILES["gambar_kamar"]["size"][$count];
                if (!$this->upload->do_upload('file')) {
                    echo $this->upload->display_errors();
                } else {
                    $gambar = $this->upload->data();
                    $data = [
                        'pilihan'  => 'tidak utama',
                        'kamar_id'  => htmlspecialchars($this->input->post('kamar_id', true)),
                        'gambar_kamar'  => $gambar['file_name'],
                    ];
                    $database = $this->Gambarkamar_model->insert($data);
                    $affected[] = $this->db->affected_rows();
                }
            }
            if (count($affected) > 0) {
                return true;
            } else {
                return false;
            }
        }
    }
    private function uploadGambar($id = null)
    {
        $gambar = $_FILES['gambar_kamar']['name'];

        if ($gambar != null) {
            if ($id != null) {
                $this->removeImage($id);
            }
            $config['upload_path'] = './images/gambarkamar';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['overwrite'] = true;
            $new_name = rand(1000, 100000) . time() . $_FILES["gambar_kamar"]['name'];
            $config['file_name'] = $new_name;
            $this->load->library('upload', $config);
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
                $this->upload->initialize($config);
                $this->image_lib->resize();

                return $gambar['file_name'];
            }
        } else {
            if ($id != null) {
                $gambarkamar = $this->db->get_where('gambar_kamar', ['id_gambar_kamar' => $id])->row();
                if ($gambarkamar != null) {
                    return $gambarkamar->gambar_kamar;
                } else {
                    return "default.png";
                }
            } else {
                return 'default.png';
            }
        }
    }
    public function pilihan($id_gambar_kamar, $id_kamar)
    {
        $update = $this->db->update('gambar_kamar', [
            'pilihan' => 'utama'
        ], [
            'id_gambar_kamar' => $id_gambar_kamar,
            'kamar_id' => $id_kamar
        ]);
        $updateLainnya = $this->db->update('gambar_kamar', [
            'pilihan' => 'tidak utama'
        ], [
            'id_gambar_kamar <> ' => $id_gambar_kamar,
            'kamar_id' => $id_kamar
        ]);

        if ($update  || $updateLainnya) {
            $this->session->set_flashdata('success', 'Data Berhasil Dipilih');
        } else {
            $this->session->set_flashdata('error', 'Data Gagal Dipilih');
        }
        return redirect(base_url('Admin/Gambarkamar'));
    }
}
