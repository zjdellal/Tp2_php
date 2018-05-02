<?php
/**
 * Created by PhpStorm.
 * User:
 * Date: 2018-04-20
 * Time: 14:32
 */
if (!defined('BASEPATH'))exit('No direct script access allowed');
include_once(APPPATH . 'controllers/Controller_Custom.php');

class Salle extends Controller_Custom
{

    public function changeSalle($nomSalle)
    {
        $this->load->helper('url');
        redirect('/Conversation/afficheSalle/'.$nomSalle, 'refresh');
    }

    public function accueil()
    {
        $data = array("title"=>"Accueil");
        $this->_render_page('salle/accueil.php',$data);
    }

}