<?php

/**
 * Created by PhpStorm.
 * User:
 * Date: 2018-04-20
 * Time: 14:32
 */
class Salle extends CI_Controller
{
	private $statut;
	public function __construct(){
		parent::__construct();
		$this->load->library(array('ion_auth','form_validation'));
		$this->load->helper(array('url','language'));
		$this->statut = $this->ion_auth->logged_in();

}
    public function changeSalle(){
        echo "Salle/changeSalle";
    }

    public function accueil(){
        echo "Salle/accueil";
    }

    public function index()
	{
		$this->load->view('templates/header');
		if ($this->statut)
		{
		$data['contenu'] = 'remplis moi je suis vide :/ ';
		$this->load->view('Gabarit', $data);

		}else{
			redirect('auth');
		}
		$this->load->view('templates/footer');
}
}
