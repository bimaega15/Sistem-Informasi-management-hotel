<?php
class Template
{
    protected $ci;
    public function __construct()
    {
        $this->ci = &get_instance();
    }
    public function home($template, $data = null)
    {
        $data['content'] = $this->ci->load->view($template, $data, true);
        $this->ci->load->view('home', $data);
    }
    public function login($template, $data = null)
    {
        $data['content'] = $this->ci->load->view($template, $data, true);
        $this->ci->load->view('template/auth/main', $data);
    }
    public function admin($template, $data = null)
    {
        $data['sidebar'] = $this->ci->load->view('template/admin/partial/sidebar', $data, true);
        $data['topbar'] = $this->ci->load->view('template/admin/partial/topbar', $data, true);
        $data['content'] = $this->ci->load->view($template, $data, true);
        $data['footer'] = $this->ci->load->view('template/admin/partial/footer', null, true);

        $this->ci->load->view('template/admin/main', $data);
    }
    public function front($template, $data = null)
    {
        $data['header'] = $this->ci->load->view('template/front/partials/header', $data, true);
        $data['content'] = $this->ci->load->view($template, $data, true);
        $data['footer'] = $this->ci->load->view('template/front/partials/footer', $data, true);

        $this->ci->load->view('template/front/main', $data);
    }
}
