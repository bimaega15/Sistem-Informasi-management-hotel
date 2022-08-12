<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Icon extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $profile = check_profile();
        if ($profile->level == 'manager') {
            show_404();
        }
        $this->load->model('Icon/Icon_model');
    }
    public function index()
    {
        $this->breadcrumbs->push('Dashboard', 'Admin/Dashboard');
        $this->breadcrumbs->push('Icon', 'Admin/Icon');
        // output
        $data['breadcrumbs'] = $this->breadcrumbs->show();
        $data['title'] = 'Icon Page';
        $data['result'] = $this->Icon_model->get()->result();
        $this->template->admin('admin/icon/main', $data);
    }
    public function add()
    {
        $this->breadcrumbs->push('Dashboard', 'Admin/Dashboard');
        $this->breadcrumbs->push('Icon', 'Admin/Icon');
        $this->breadcrumbs->push('Tambah Icon', 'Admin/Icon/add');
        // output
        $data['breadcrumbs'] = $this->breadcrumbs->show();

        $obj = new stdClass();
        $obj->nama_icon = null;
        $data['row'] = $obj;
        $data['title'] = 'Tambah Icon Page';
        $data['page'] = 'tambah';
        $this->template->admin('admin/icon/form_data', $data);
    }
    public function process()
    {
        $this->form_validation->set_rules('nama_icon', 'Nama Icon Kamar', 'required|trim');
        $this->form_validation->set_message('required', '{field} wajib diisi');
        $this->form_validation->set_error_delimiters('<small style="color:#f05154">', '</small><br>');
        if (isset($_POST['tambah'])) {
            if ($this->form_validation->run() == false) {
                return $this->add();
            } else {
                $data = [
                    'nama_icon'  => htmlspecialchars($this->input->post('nama_icon', true)),
                ];
                $database = $this->Icon_model->insert($data);
                if ($database > 0) {
                    $this->session->set_flashdata('success', 'Data Berhasil Ditambah');
                } else {
                    $this->session->set_flashdata('error', 'Data Gagal Ditambah');
                }
            }
        } else {
            if ($this->form_validation->run() == false) {
                $id = $this->input->post('id_icon', true);
                return $this->edit($id);
            } else {
                $id = $this->input->post('id_icon', true);
                $data = [
                    'nama_icon'  => htmlspecialchars($this->input->post('nama_icon', true)),
                ];
                $database = $this->Icon_model->update($data, $id);
                if ($database > 0) {
                    $this->session->set_flashdata('success', 'Data Berhasil Diupdate');
                } else {
                    $this->session->set_flashdata('error', 'Data Gagal Diupdate');
                }
            }
        }

        return redirect(base_url('Admin/Icon'));
    }
    public function edit($id)
    {
        $this->breadcrumbs->push('Dashboard', 'Admin/Dashboard');
        $this->breadcrumbs->push('Icon', 'Admin/Icon');
        $this->breadcrumbs->push('Edit Icon', 'Admin/Icon/edit/' . $id);
        // output
        $data['breadcrumbs'] = $this->breadcrumbs->show();
        $data['row'] = $this->Icon_model->get($id)->row();
        $data['title'] = 'Edit Icon Page';
        $data['page'] = 'edit';
        $this->template->admin('admin/icon/form_data', $data);
    }
    public function delete($id)
    {
        $database = $this->Icon_model->delete($id);
        if ($database > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        } else {
            $this->session->set_flashdata('error', 'Data Gagal Dihapus');
        }
        return redirect(base_url('Admin/Icon'));
    }
}
