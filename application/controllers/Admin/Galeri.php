<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Galeri extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $profile = check_profile();
        if ($profile->level != 'admin') {
            show_404();
        }
        $this->load->model('Galeri/Galeri_model');
    }
    public function index()
    {
        $this->breadcrumbs->push('Dashboard', 'Admin/Dashboard');
        $this->breadcrumbs->push('Galeri', 'Admin/Galeri');
        // output
        $data['breadcrumbs'] = $this->breadcrumbs->show();
        $data['title'] = 'Galeri Page';
        $data['result'] = $this->Galeri_model->get()->result();
        $this->template->admin('admin/galeri/main', $data);
    }
    public function add()
    {
        $this->breadcrumbs->push('Dashboard', 'Admin/Dashboard');
        $this->breadcrumbs->push('Galeri', 'Admin/Galeri');
        $this->breadcrumbs->push('Tambah Galeri', 'Admin/Galeri');
        // output
        $data['breadcrumbs'] = $this->breadcrumbs->show();

        $obj = new stdClass();
        $obj->id_galeri = null;
        $obj->nama_galeri = null;
        $obj->gambar_galeri = null;
        $data['row'] = $obj;
        $data['title'] = 'Tambah Galeri Page';
        $data['page'] = 'tambah';

        $this->template->admin('admin/galeri/form_data', $data);
    }
    public function process()
    {
        $this->form_validation->set_rules('nama_galeri', 'Nama Galeri', 'required|trim');
        $this->form_validation->set_message('required', '{field} wajib diisi');
        $this->form_validation->set_error_delimiters('<small style="color:#f05154">', '</small><br>');
        if (isset($_POST['tambah'])) {
            if ($this->form_validation->run() == false) {
                return $this->add();
            } else {
                $data = [
                    'nama_galeri'  => htmlspecialchars($this->input->post('nama_galeri', true)),
                    'gambar_galeri'  => $this->uploadGambar(),
                ];
                $database = $this->Galeri_model->insert($data);
                if ($database > 0) {
                    $this->session->set_flashdata('success', 'Data Berhasil Ditambah');
                } else {
                    $this->session->set_flashdata('error', 'Data Gagal Ditambah');
                }
            }
        } else {
            if ($this->form_validation->run() == false) {
                $id = $this->input->post('id_galeri', true);
                return $this->edit($id);
            } else {
                $id = $this->input->post('id_galeri', true);
                $data = [
                    'nama_galeri'  => htmlspecialchars($this->input->post('nama_galeri', true)),
                    'gambar_galeri'  => $this->uploadGambar($id),
                ];
                $database = $this->Galeri_model->update($data, $id);
                if ($database > 0) {
                    $this->session->set_flashdata('success', 'Data Berhasil Diupdate');
                } else {
                    $this->session->set_flashdata('error', 'Data Gagal Diupdate');
                }
            }
        }

        return redirect(base_url('Admin/Galeri'));
    }
    public function edit($id)
    {
        $this->breadcrumbs->push('Dashboard', 'Admin/Dashboard');
        $this->breadcrumbs->push('Galeri', 'Admin/Galeri');
        $this->breadcrumbs->push('Edit Galeri', 'Admin/Galeri/edit/' . $id);
        // output
        $data['breadcrumbs'] = $this->breadcrumbs->show();
        $data['row'] = $this->Galeri_model->get($id)->row();
        $data['title'] = 'Edit Galeri Page';
        $data['page'] = 'edit';
        $this->template->admin('admin/galeri/form_data', $data);
    }
    public function delete($id)
    {
        $this->removeImage($id);
        $database = $this->Galeri_model->delete($id);
        if ($database > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        } else {
            $this->session->set_flashdata('error', 'Data Gagal Dihapus');
        }
        return redirect(base_url('Admin/Galeri'));
    }

    private function uploadGambar($id = null)
    {
        $gambar = $_FILES['gambar_galeri']['name'];

        if ($gambar != null) {
            if ($id != null) {
                $this->removeImage($id);
            }
            $config['upload_path'] = './images/galeri';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['overwrite'] = true;
            $new_name = rand(1000, 100000) . time() . $_FILES["gambar_galeri"]['name'];
            $config['file_name'] = $new_name;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar_galeri')) {
                echo $this->upload->display_errors();
            } else {
                $gambar = $this->upload->data();
                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = './images/galeri/' . $gambar['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = '50%';
                $config['new_image'] = './images/galeri/' . $gambar['file_name'];
                $this->load->library('image_lib', $config);
                $this->upload->initialize($config);
                $this->image_lib->resize();

                return $gambar['file_name'];
            }
        } else {
            if ($id != null) {
                $galeri = $this->db->get_where('galeri', ['id_galeri' => $id])->row();
                if ($galeri->gambar_galeri != 'default.png') {
                    return $galeri->gambar_galeri;
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
        $select_image = $this->db->get_where('galeri', ['id_galeri' => $id])->row();

        if ($select_image->gambar_galeri != 'default.png') {
            $filename = explode('.', $select_image->gambar_galeri)[0];
            return array_map('unlink', glob(FCPATH . "images/galeri/" . $filename . '.*'));
        }
    }
}
