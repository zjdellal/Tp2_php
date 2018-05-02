<?php
/**
 * Created by PhpStorm.
 * User:
 * Date: 2018-04-20
 * Time: 14:30
 */

if (!defined('BASEPATH')) exit('No direct script access allowed');
include_once(APPPATH . 'controllers/Controller_Custom.php');

class Conversation extends Controller_Custom
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('form_validation'));
		$this->load->helper(array('url', 'language'));
		$this->statut = $this->ion_auth->logged_in();
		//chargement du model Xml
		$this->load->model('SalleXml');
	}

	/**cette méthode appel la vue affiche Salle
	 * cette vue doit generée la discussion des table (LIBRE par default)
	 *
	 * @param string $nomSalle
	 */
	public function afficheSalle($nomSalle = "Plainte")
	{
		//TODO Regarder si la salle existe


		$data = [
			"userId" => $this->ion_auth->get_user_id(),
			"title" => "Chat",
			"nomSalle" => $nomSalle,
			"messages" => $this->SalleXml->retrouveTousMessages($nomSalle)
		];

		//var_dump($data['messages']);
		$this->_render_page('Conversation/afficheSalle.php', $data);
	}

	public function ajouteMessage()
	{
	//ici je prépare les info que j'ai besoins a l'ecriture
	$data_user ['salle'] = $_POST['salle'];
	$data_user['user'] = $_POST['nom_user'];
	$data_user['message'] = $_POST['message'];
		$this->SalleXml->ajouterMessages($data_user);
		redirect( 'Conversation/afficheSalle','refresh');
	}
}
