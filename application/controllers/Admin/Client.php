<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Client extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $profile = check_profile();
        if ($profile->level != 'admin') {
            show_404();
        }
        $this->load->model('Client/Client_model');
    }
    public function index()
    {
        $this->breadcrumbs->push('Dashboard', 'Admin/Dashboard');
        $this->breadcrumbs->push('Client', 'Admin/Client');
        // output
        $data['breadcrumbs'] = $this->breadcrumbs->show();
        $data['title'] = 'Client Page';
        $data['result'] = $this->Client_model->get()->result();
        $this->template->admin('admin/client/main', $data);
    }
    public function add()
    {
        $this->breadcrumbs->push('Dashboard', 'Admin/Dashboard');
        $this->breadcrumbs->push('Client', 'Admin/Client');
        $this->breadcrumbs->push('Tambah Client', 'Admin/Client');
        // output
        $data['breadcrumbs'] = $this->breadcrumbs->show();

        $obj = new stdClass();
        $obj->id_client = null;
        $obj->nama_client = null;
        $obj->gambar_client = null;
        $obj->keterangan = null;
        $data['row'] = $obj;
        $data['title'] = 'Tambah Client Page';
        $data['page'] = 'tambah';

        $this->template->admin('admin/client/form_data', $data);
    }
    public function process()
    {
        $this->form_validation->set_rules('nama_client', 'Nama Client', 'required|trim');
        $this->form_validation->set_message('required', '{field} wajib diisi');
        $this->form_validation->set_error_delimiters('<small style="color:#f05154">', '</small><br>');
        if (isset($_POST['tambah'])) {
            if ($this->form_validation->run() == false) {
                return $this->add();
            } else {
                $data = [
                    'nama_client'  => htmlspecialchars($this->input->post('nama_client', true)),
                    'keterangan'  => htmlspecialchars($this->input->post('keterangan', true)),
                    'gambar_client'  => $this->uploadGambar(),
                ];
                $database = $this->Client_model->insert($data);
                if ($database > 0) {
                    $this->session->set_flashdata('success', 'Data Berhasil Ditambah');
                } else {
                    $this->session->set_flashdata('error', 'Data Gagal Ditambah');
                }
            }
        } else {
            if ($this->form_validation->run() == false) {
                $id = $this->input->post('id_client', true);
                return $this->edit($id);
            } else {
                $id = $this->input->post('id_client', true);
                $data = [
                    'nama_client'  => htmlspecialchars($this->input->post('nama_client', true)),
                    'keterangan'  => htmlspecialchars($this->input->post('keterangan', true)),
                    'gambar_client'  => $this->uploadGambar($id),
                ];
                $database = $this->Client_model->update($data, $id);
                if ($database > 0) {
                    $this->session->set_flashdata('success', 'Data Berhasil Diupdate');
                } else {
                    $this->session->set_flashdata('error', 'Data Gagal Diupdate');
                }
            }
        }

        return redirect(base_url('Admin/Client'));
    }
    public function edit($id)
    {
        $this->breadcrumbs->push('Dashboard', 'Admin/Dashboard');
        $this->breadcrumbs->push('Client', 'Admin/Client');
        $this->breadcrumbs->push('Edit Client', 'Admin/Client/edit/' . $id);
        // output
        $data['breadcrumbs'] = $this->breadcrumbs->show();
        $data['row'] = $this->Client_model->get($id)->row();
        $data['title'] = 'Edit Client Page';
        $data['page'] = 'edit';
        $this->template->admin('admin/client/form_data', $data);
    }
    public function delete($id)
    {
        $this->removeImage($id);
        $database = $this->Client_model->delete($id);
        if ($database > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        } else {
            $this->session->set_flashdata('error', 'Data Gagal Dihapus');
        }
        return redirect(base_url('Admin/Client'));
    }

    private function uploadGambar($id = null)
    {
        $gambar = $_FILES['gambar_client']['name'];

        if ($gambar != null) {
            if ($id != null) {
                $this->removeImage($id);
            }
            $config['upload_path'] = './images/client';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['overwrite'] = true;
            $new_name = rand(1000, 100000) . time() . $_FILES["gambar_client"]['name'];
            $config['file_name'] = $new_name;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar_client')) {
                echo $this->upload->display_errors();
            } else {
                $gambar = $this->upload->data();
                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = './images/client/' . $gambar['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = '50%';
                $config['new_image'] = './images/client/' . $gambar['file_name'];
                $this->load->library('image_lib', $config);
                $this->upload->initialize($config);
                $this->image_lib->resize();

                return $gambar['file_name'];
            }
        } else {
            if ($id != null) {
                $Client = $this->db->get_where('client', ['id_client' => $id])->row();
                if ($Client->gambar_client != 'default.png') {
                    return $Client->gambar_client;
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
        $select_image = $this->db->get_where('client', ['id_client' => $id])->row();

        if ($select_image->gambar_client != 'default.png') {
            $filename = explode('.', $select_image->gambar_client)[0];
            return array_map('unlink', glob(FCPATH . "images/client/" . $filename . '.*'));
        }
    }
    public function detailKeterangan($id)
    {
        $get = $this->Client_model->get($id)->row();
        echo json_encode($get);
    }
}
