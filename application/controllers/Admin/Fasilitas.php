<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fasilitas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $profile = check_profile();
        if ($profile->level == 'manager') {
            show_404();
        }
        $this->load->model(['Kamar/Kamar_model', 'Fasilitas/Fasilitas_model', 'Icon/Icon_model']);
    }
    public function index()
    {
        $this->breadcrumbs->push('Dashboard', 'Admin/Dashboard');
        $this->breadcrumbs->push('Fasilitas', 'Admin/Fasilitas');
        // output
        $data['breadcrumbs'] = $this->breadcrumbs->show();
        $data['title'] = 'Fasilitas Page';
        $data['result'] = $this->Fasilitas_model->allData()->result();
        $this->template->admin('admin/fasilitas/main', $data);
    }
    public function add()
    {
        $this->breadcrumbs->push('Dashboard', 'Admin/Dashboard');
        $this->breadcrumbs->push('Fasilitas', 'Admin/Fasilitas');
        $this->breadcrumbs->push('Tambah Fasilitas', 'Admin/Fasilitas/add');
        // output
        $data['breadcrumbs'] = $this->breadcrumbs->show();

        $obj = new stdClass();
        $obj->id_fasilitas = null;
        $obj->nama_fasilitas = null;
        $obj->icon_id = null;
        $obj->icon_fasilitas = null;
        $obj->kamar_id = null;
        $data['row'] = $obj;
        $data['title'] = 'Tambah Fasilitas Page';
        $data['page'] = 'tambah';
        $data['kamar'] = $this->Kamar_model->allData()->result();
        $data['icon'] = $this->Icon_model->get()->result();

        $this->template->admin('admin/fasilitas/form_data', $data);
    }
    public function process()
    {
        $this->form_validation->set_rules('nama_fasilitas', 'Nama Fasilitas', 'required|trim');
        $this->form_validation->set_rules('icon_id', 'Icon Fasilitas', 'required|trim');
        $this->form_validation->set_rules('kamar_id', 'Kamar', 'required|trim');
        $this->form_validation->set_message('required', '{field} wajib diisi');
        $this->form_validation->set_error_delimiters('<small style="color:#f05154">', '</small><br>');
        if (isset($_POST['tambah'])) {
            if ($this->form_validation->run() == false) {
                return $this->add();
            } else {
                $data = [
                    'nama_fasilitas'  => htmlspecialchars($this->input->post('nama_fasilitas', true)),
                    'icon_id'  => htmlspecialchars($this->input->post('icon_id', true)),
                    'kamar_id'  => htmlspecialchars($this->input->post('kamar_id', true)),
                ];
                $database = $this->Fasilitas_model->insert($data);
                if ($database > 0) {
                    $this->session->set_flashdata('success', 'Data Berhasil Ditambah');
                } else {
                    $this->session->set_flashdata('error', 'Data Gagal Ditambah');
                }
            }
        } else {
            if ($this->form_validation->run() == false) {
                $id = $this->input->post('id_fasilitas', true);
                return $this->edit($id);
            } else {
                $id = $this->input->post('id_fasilitas', true);
                $data = [
                    'nama_fasilitas'  => htmlspecialchars($this->input->post('nama_fasilitas', true)),
                    'icon_id'  => htmlspecialchars($this->input->post('icon_id', true)),
                    'kamar_id'  => htmlspecialchars($this->input->post('kamar_id', true)),
                ];
                $database = $this->Fasilitas_model->update($data, $id);
                if ($database > 0) {
                    $this->session->set_flashdata('success', 'Data Berhasil Diupdate');
                } else {
                    $this->session->set_flashdata('error', 'Data Gagal Diupdate');
                }
            }
        }

        return redirect(base_url('Admin/Fasilitas'));
    }
    public function edit($id)
    {
        $this->breadcrumbs->push('Dashboard', 'Admin/Dashboard');
        $this->breadcrumbs->push('Fasilitas', 'Admin/Fasilitas');
        $this->breadcrumbs->push('Edit Fasilitas', 'Admin/Fasilitas/edit/' . $id);
        // output
        $data['breadcrumbs'] = $this->breadcrumbs->show();
        $data['row'] = $this->Fasilitas_model->allData($id)->row();

        $data['kamar'] = $this->Kamar_model->allData()->result();
        $data['title'] = 'Edit Fasilitas Page';
        $data['page'] = 'edit';
        $data['icon'] = $this->Icon_model->get()->result();
        $this->template->admin('Admin/Fasilitas/form_data', $data);
    }
    public function delete($id)
    {
        $database = $this->Fasilitas_model->delete($id);
        if ($database > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        } else {
            $this->session->set_flashdata('error', 'Data Gagal Dihapus');
        }
        return redirect(base_url('Admin/Fasilitas'));
    }
}
