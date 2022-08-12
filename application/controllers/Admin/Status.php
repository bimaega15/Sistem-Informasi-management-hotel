<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Status extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $profile = check_profile();
        if ($profile->level == 'manager') {
            show_404();
        }
        $this->load->model('Status/Status_kamar_model');
    }
    public function index()
    {
        $this->breadcrumbs->push('Dashboard', 'Admin/Dashboard');
        $this->breadcrumbs->push('Status', 'Admin/Status');
        // output
        $data['breadcrumbs'] = $this->breadcrumbs->show();
        $data['title'] = 'Status Page';
        $data['result'] = $this->Status_kamar_model->get()->result();
        $this->template->admin('admin/status/main', $data);
    }
    public function add()
    {
        $this->breadcrumbs->push('Dashboard', 'Admin/Dashboard');
        $this->breadcrumbs->push('Status', 'Admin/Status');
        $this->breadcrumbs->push('Tambah Status', 'Admin/Status/add');
        // output
        $data['breadcrumbs'] = $this->breadcrumbs->show();

        $obj = new stdClass();
        $obj->nama_status_kamar = null;
        $data['row'] = $obj;
        $data['title'] = 'Tambah Status Page';
        $data['page'] = 'tambah';
        $this->template->admin('admin/status/form_data', $data);
    }
    public function process()
    {
        $this->form_validation->set_rules('nama_status_kamar', 'Nama Status Kamar', 'required|trim');
        $this->form_validation->set_message('required', '{field} wajib diisi');
        $this->form_validation->set_error_delimiters('<small style="color:#f05154">', '</small><br>');
        if (isset($_POST['tambah'])) {
            if ($this->form_validation->run() == false) {
                return $this->add();
            } else {
                $data = [
                    'nama_status_kamar'  => htmlspecialchars($this->input->post('nama_status_kamar', true)),
                ];
                $database = $this->Status_kamar_model->insert($data);
                if ($database > 0) {
                    $this->session->set_flashdata('success', 'Data Berhasil Ditambah');
                } else {
                    $this->session->set_flashdata('error', 'Data Gagal Ditambah');
                }
            }
        } else {
            if ($this->form_validation->run() == false) {
                $id = $this->input->post('id_status_kamar', true);
                return $this->edit($id);
            } else {
                $id = $this->input->post('id_status_kamar', true);
                $data = [
                    'nama_status_kamar'  => htmlspecialchars($this->input->post('nama_status_kamar', true)),
                ];
                $database = $this->Status_kamar_model->update($data, $id);
                if ($database > 0) {
                    $this->session->set_flashdata('success', 'Data Berhasil Diupdate');
                } else {
                    $this->session->set_flashdata('error', 'Data Gagal Diupdate');
                }
            }
        }

        return redirect(base_url('Admin/Status'));
    }
    public function edit($id)
    {
        $this->breadcrumbs->push('Dashboard', 'Admin/Dashboard');
        $this->breadcrumbs->push('Status', 'Admin/Status');
        $this->breadcrumbs->push('Edit Status', 'Admin/Status/edit/' . $id);
        // output
        $data['breadcrumbs'] = $this->breadcrumbs->show();
        $data['row'] = $this->Status_kamar_model->get($id)->row();
        $data['title'] = 'Edit Status Page';
        $data['page'] = 'edit';
        $this->template->admin('admin/Status/form_data', $data);
    }
    public function delete($id)
    {
        $database = $this->Status_kamar_model->delete($id);
        if ($database > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        } else {
            $this->session->set_flashdata('error', 'Data Gagal Dihapus');
        }
        return redirect(base_url('Admin/Status'));
    }
}
