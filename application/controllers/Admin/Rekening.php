<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekening extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $profile = check_profile();
        if ($profile->level != 'admin') {
            show_404();
        }
        $this->load->model("Rekening/Rekening_model");
    }
    public function index()
    {
        $this->breadcrumbs->push('Dashboard', 'Admin/Dashboard');
        $this->breadcrumbs->push('Rekening', 'Admin/Rekening');
        // output
        $data['breadcrumbs'] = $this->breadcrumbs->show();
        $data['title'] = 'Rekening Page';
        $data['result'] = $this->Rekening_model->get()->result();
        $this->template->admin('admin/rekening/main', $data);
    }
    public function add()
    {
        $this->breadcrumbs->push('Dashboard', 'Admin/Dashboard');
        $this->breadcrumbs->push('Rekening', 'Admin/Rekening');
        $this->breadcrumbs->push('Tambah Rekening', 'Admin/Rekening/add');
        // output
        $data['breadcrumbs'] = $this->breadcrumbs->show();

        $obj = new stdClass();
        $obj->id_rekening = null;
        $obj->no_rekening = null;
        $obj->nama_rekening = null;
        $obj->gambar_bank = null;
        $obj->nama_bank = null;
        $data['row'] = $obj;
        $data['title'] = 'Tambah Rekening Page';
        $data['page'] = 'tambah';
        $this->template->admin('admin/rekening/form_data', $data);
    }
    public function process()
    {
        $this->form_validation->set_rules('no_rekening', 'No. Rekening', 'required|trim');
        $this->form_validation->set_rules('nama_rekening', 'Nama Rekening', 'required|trim');
        $this->form_validation->set_rules('nama_bank', 'Nama Bank', 'required|trim');

        $this->form_validation->set_message('required', '{field} wajib diisi');
        $this->form_validation->set_error_delimiters('<small style="color:#f05154">', '</small><br>');
        if (isset($_POST['tambah'])) {
            if ($this->form_validation->run() == false) {
                return $this->add();
            } else {
                $data = [
                    'no_rekening'  => htmlspecialchars($this->input->post('no_rekening', true)),
                    'nama_rekening'  => htmlspecialchars($this->input->post('nama_rekening', true)),
                    'nama_bank'  => htmlspecialchars($this->input->post('nama_bank', true)),
                    'gambar_bank' => $this->uploadGambar()
                ];
                $database = $this->Rekening_model->insert($data);
                if ($database > 0) {
                    $this->session->set_flashdata('success', 'Data Berhasil Ditambah');
                } else {
                    $this->session->set_flashdata('error', 'Data Gagal Ditambah');
                }
            }
        } else {
            if ($this->form_validation->run() == false) {
                $id = $this->input->post('id_rekening', true);
                return $this->edit($id);
            } else {
                $id = $this->input->post('id_rekening', true);
                $data = [
                    'no_rekening'  => htmlspecialchars($this->input->post('no_rekening', true)),
                    'nama_rekening'  => htmlspecialchars($this->input->post('nama_rekening', true)),
                    'nama_bank'  => htmlspecialchars($this->input->post('nama_bank', true)),
                    'gambar_bank' => $this->uploadGambar($id)
                ];
                $database = $this->Rekening_model->update($data, $id);
                if ($database > 0) {
                    $this->session->set_flashdata('success', 'Data Berhasil Diupdate');
                } else {
                    $this->session->set_flashdata('error', 'Data Gagal Diupdate');
                }
            }
        }

        return redirect(base_url('Admin/Rekening'));
    }
    public function edit($id)
    {
        $this->breadcrumbs->push('Dashboard', 'Admin/Dashboard');
        $this->breadcrumbs->push('Rekening', 'Admin/Rekening');
        $this->breadcrumbs->push('Edit Rekening', 'Admin/Rekening/edit/' . $id);
        // output
        $data['breadcrumbs'] = $this->breadcrumbs->show();
        $data['row'] = $this->Rekening_model->get($id)->row();
        $data['title'] = 'Edit Rekening Page';
        $data['page'] = 'edit';
        $this->template->admin('admin/rekening/form_data', $data);
    }
    public function delete($id)
    {
        $this->removeImage($id);
        $database = $this->Rekening_model->delete($id);
        if ($database > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        } else {
            $this->session->set_flashdata('error', 'Data Gagal Dihapus');
        }
        return redirect(base_url('Admin/Rekening'));
    }
    private function uploadGambar($id = null)
    {
        $gambar = $_FILES['gambar_bank']['name'];

        if ($gambar != null) {
            if ($id != null) {
                $this->removeImage($id);
            }
            $config['upload_path'] = './images/rekening';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['overwrite'] = true;
            $new_name = rand(1000, 100000) . time() . $_FILES["gambar_bank"]['name'];
            $config['file_name'] = $new_name;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar_bank')) {
                echo $this->upload->display_errors();
            } else {
                $gambar = $this->upload->data();
                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = './images/rekening/' . $gambar['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = '50%';
                $config['new_image'] = './images/rekening/' . $gambar['file_name'];
                $this->load->library('image_lib', $config);
                $this->upload->initialize($config);
                $this->image_lib->resize();

                return $gambar['file_name'];
            }
        } else {
            if ($id != null) {
                $rekening = $this->db->get_where('rekening', ['id_rekening' => $id])->row();
                if ($rekening->gambar_bank != 'default.png') {
                    return $rekening->gambar_bank;
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
        $select_image = $this->db->get_where('rekening', ['id_rekening' => $id])->row();

        if ($select_image->gambar_bank != 'default.png') {
            $filename = explode('.', $select_image->gambar_bank)[0];
            return array_map('unlink', glob(FCPATH . "images/rekening/" . $filename . '.*'));
        }
    }
}
