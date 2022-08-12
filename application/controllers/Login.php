<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Users/Users_model');
    }
    public function index()
    {
        check_already_login();
        $this->template->login('auth/login');
    }
    public function process()
    {
        $this->form_validation->set_rules('username', 'username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required');

        $this->form_validation->set_message('required', '{field} wajib diisi');
        $this->form_validation->set_error_delimiters('<small class="text-danger">', '</small><br>');
        if ($this->form_validation->run() == false) {
            return $this->index();
        } else {
            $username = $this->input->post('username', true);
            $password = $this->input->post('password', true);
            $remember = $this->input->post('remember', true);
            $model = $this->Users_model->login($username, $password);

            if ($model->num_rows() > 0) {
                $row = $model->row();
                if ($row->status == 'active') {
                    if ($remember != null) {
                        $key = hash('sha256', $row->username);
                        set_cookie('cookie', $key, 60 * 60 * 24);
                        $this->db->update('users', ['cookie' => $key], ['username' => $username]);
                    }
                    $this->session->set_userdata([
                        'level' => $row->level,
                        'id_users' => $row->id_users,
                    ]);
                    $this->session->set_flashdata('success', 'Selamat login! ' . $row->nama);
                    if (isset($_POST['redirect'])) {
                        if ($_POST['redirect'] != null) {
                            $url = $_POST['redirect'];
                            return redirect($url);
                        } else {
                            return redirect(base_url('Admin/Home'));
                        }
                    } else {
                        return redirect(base_url('Admin/Home'));
                    }
                } else {
                    $this->session->set_flashdata('error', 'Account anda belum aktif silahkan hubungi admin<br> No HP: 6282277506232');
                    return redirect('/Login');
                }
            } else {
                $this->session->set_flashdata('error', 'Username atau Password salah');
                return redirect('/Login');
            }
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('id_users');
        $this->session->unset_userdata('level');
        delete_cookie('cookie');
        return redirect(base_url('Login'));
    }
}
