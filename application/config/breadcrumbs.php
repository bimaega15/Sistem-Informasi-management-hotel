<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| BREADCRUMB CONFIG
| -------------------------------------------------------------------
| This file will contain some breadcrumbs' settings.
|
| $config['crumb_divider']		The string used to divide the crumbs
| $config['tag_open'] 			The opening tag for breadcrumb's holder.
| $config['tag_close'] 			The closing tag for breadcrumb's holder.
| $config['crumb_open'] 		The opening tag for breadcrumb's holder.
| $config['crumb_close'] 		The closing tag for breadcrumb's holder.
|
| Defaults provided for twitter bootstrap 2.0
*/
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$explode = explode('/', $actual_link);
if (isset($explode[4])) {
    if ($explode[4] == 'Admin') {
        $config['tag_open'] = '<nav aria-label="breadcrumb">
    <ol class="breadcrumb">';
        $config['tag_close'] = '</ol></nav>';
        $config['crumb_open'] = '<li class="breadcrumb-item">';
        $config['crumb_last_open'] = '<li class="breadcrumb-item active" aria-current="page">';
        $config['crumb_close'] = '</li>';
    } else {
        // $config['crumb_divider'] = '<span class="divider"><i class="fas fa-angle-right"></i>&nbsp;</span>';
        $config['tag_open'] = '<div class="breadcrumbs"><ul>';
        $config['tag_close'] = '</ul></div>';
        $config['crumb_open'] = '<li>';
        $config['crumb_last_open'] = '<li class="active">';
        $config['crumb_close'] = '</li>';
    }
} else {
    // $config['crumb_divider'] = '<span class="divider"><i class="fas fa-angle-right"></i>&nbsp;</span>';
    $config['tag_open'] = '<nav aria-label="breadcrumb">
    <ol class="breadcrumb">';
    $config['tag_close'] = '</ol></nav>';
    $config['crumb_open'] = '<li class="breadcrumb-item">';
    $config['crumb_last_open'] = '<li class="breadcrumb-item active" aria-current="page">';
    $config['crumb_close'] = '</li>';
}


/* End of file breadcrumbs.php */
/* Location: ./application/config/breadcrumbs.php */