<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gallery extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Galeri/Galeri_model');
    }
    public function index($page = null)
    {
        $config = array();
        $config["base_url"] = base_url('Front/Gallery/index/');
        $config["per_page"] = 9;
        $config["uri_segment"] = 4;
        $config["use_page_numbers"] = TRUE;
        $config["full_tag_open"] = '<ul class="pagination">';
        $config["full_tag_close"] = '</ul>';
        $config["first_tag_open"] = '<li>';
        $config["first_tag_close"] = '</li>';
        $config["last_tag_open"] = '<li>';
        $config["last_tag_close"] = '</li>';
        $config['next_link'] = '&raquo;';
        $config["next_tag_open"] = '<li>';
        $config["next_tag_close"] = '</li>';
        $config["prev_link"] = "&laquo;";
        $config["prev_tag_open"] = "<li>";
        $config["prev_tag_close"] = "</li>";
        $config["cur_tag_open"] = "<li class='active'><a href='#'>";
        $config["cur_tag_close"] = "</a></li>";
        $config["num_tag_open"] = "<li>";
        $config["num_tag_close"] = "</li>";
        $config["num_links"] = 1;
        $page = $this->uri->segment(4) == null ? 1 : $this->uri->segment(4);
        $start = ($page - 1) * $config["per_page"];
        $config["total_rows"] = $this->Galeri_model->get(null, null, null)->num_rows();
        $this->pagination->initialize($config);

        $result = $this->Galeri_model->get(null, $config["per_page"], $start)->result();
        $data['pagination_link'] = $this->pagination->create_links();
        $data['title'] = 'Gallery Page';
        $data['result'] = $result;
        $this->template->front('front/gallery/main', $data);
    }
}
