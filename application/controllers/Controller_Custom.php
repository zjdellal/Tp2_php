<?php
/**
 * Created by PhpStorm.
 * User: 1634062
 * Date: 2018-04-30
 * Time: 14:36
 */
class Controller_Custom extends CI_Controller
{
    public function _render_page($view, $data = null)
    {
        $this->viewdata = (empty($data)) ? $this->data : $data;

        $this->load->view('template/header.php', $this->viewdata);
        $this->load->view($view, $this->viewdata);
        $this->load->view('template/footer.php');
    }
}