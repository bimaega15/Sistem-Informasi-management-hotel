<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tipe extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $profile = check_profile();
        if ($profile->level == 'manager') {
            show_404();
        }
        $this->load->model('Tipe/Tipe_kamar_model');
    }
    public function index()
    {
        $this->breadcrumbs->push('Dashboard', 'Admin/Dashboard');
        $this->breadcrumbs->push('Tipe', 'Admin/Tipe');
        // output
        $data['breadcrumbs'] = $this->breadcrumbs->show();
        $data['title'] = 'Tipe Page';
        $data['result'] = $this->Tipe_kamar_model->get()->result();
        $this->template->admin('admin/tipe/main', $data);
    }
    public function add()
    {
        $this->breadcrumbs->push('Dashboard', 'Admin/Dashboard');
        $this->breadcrumbs->push('Tipe', 'Admin/Tipe');
        $this->breadcrumbs->push('Tambah Tipe', 'Admin/Tipe/add');
        // output
        $data['breadcrumbs'] = $this->breadcrumbs->show();

        $obj = new stdClass();
        $obj->nama_tipe_kamar = null;
        $data['row'] = $obj;
        $data['title'] = 'Tambah Tipe Page';
        $data['page'] = 'tambah';
        $this->template->admin('admin/tipe/form_data', $data);
    }
    public function process()
    {
        $this->form_validation->set_rules('nama_tipe_kamar', 'Nama Tipe Kamar', 'required|trim');
        $this->form_validation->set_message('required', '{field} wajib diisi');
        $this->form_validation->set_error_delimiters('<small style="color:#f05154">', '</small><br>');
        if (isset($_POST['tambah'])) {
            if ($this->form_validation->run() == false) {
                return $this->add();
            } else {
                $data = [
                    'nama_tipe_kamar'  => htmlspecialchars($this->input->post('nama_tipe_kamar', true)),
                ];
                $database = $this->Tipe_kamar_model->insert($data);
                if ($database > 0) {
                    $this->session->set_flashdata('success', 'Data Berhasil Ditambah');
                } else {
                    $this->session->set_flashdata('error', 'Data Gagal Ditambah');
                }
            }
        } else {
            if ($this->form_validation->run() == false) {
                $id = $this->input->post('id_tipe_kamar', true);
                return $this->edit($id);
            } else {
                $id = $this->input->post('id_tipe_kamar', true);
                $data = [
                    'nama_tipe_kamar'  => htmlspecialchars($this->input->post('nama_tipe_kamar', true)),
                ];
                $database = $this->Tipe_kamar_model->update($data, $id);
                if ($database > 0) {
                    $this->session->set_flashdata('success', 'Data Berhasil Diupdate');
                } else {
                    $this->session->set_flashdata('error', 'Data Gagal Diupdate');
                }
            }
        }

        return redirect(base_url('Admin/Tipe'));
    }
    public function edit($id)
    {
        $this->breadcrumbs->push('Dashboard', 'Admin/Dashboard');
        $this->breadcrumbs->push('Tipe', 'Admin/Tipe');
        $this->breadcrumbs->push('Edit Tipe', 'Admin/Tipe/edit/' . $id);
        // output
        $data['breadcrumbs'] = $this->breadcrumbs->show();
        $data['row'] = $this->Tipe_kamar_model->get($id)->row();
        $data['title'] = 'Edit Tipe Page';
        $data['page'] = 'edit';
        $this->template->admin('admin/tipe/form_data', $data);
    }
    public function delete($id)
    {
        $database = $this->Tipe_kamar_model->delete($id);
        if ($database > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        } else {
            $this->session->set_flashdata('error', 'Data Gagal Dihapus');
        }
        return redirect(base_url('Admin/Tipe'));
    }
}
