<?php

/**
 * Created by PhpStorm.
 * User: Zachary
 * Date: 2018-04-30
 * Time: 22:39
 */
class SalleXml extends CI_Model
{

	private $domDoc;

	public function __construct()
	{
		parent::__construct();
		$this->domDoc = new DOMDocument('1.0', 'utf-8');
		// load  le fichier Message xml via le fichier constants qui contient la constance Path_xml
		$this->domDoc->load(XML_PATH);
		$this->domDoc->formatOutput = true;

	}

	/**
	 * @param $nomSalle
	 * @return int|null
	 * méthode qui retourne le id de la salle delctionnée
	 */
	private function returnId($nomSalle)
	{
		$retval = null;
		switch (strtoupper($nomSalle)) {
			case 'LIBRE':
				$retval = 0;
				break;
			case 'PLAINTE';
				$retval = 1;
				break;
		}
		return $retval;
	}

	//on récupère les users
	public function retrouveTousMessages($salleId)
	{

		$resultat = array();
		//conversion nom salle en id INT
		$id = $this->returnId($salleId);

		//je selecte le node salle
		$salle_xml = $this->domDoc->getElementsByTagName('salle');

		//je récupère l'attribut
		$idSalle = $salle_xml->item($id)->getAttribute('id');

		//je parcour les message de la salle selectionnée
		foreach ($salle_xml->item($id)->getElementsByTagName('message') as $msg) {
			//noeud
			$text = $msg->getElementsByTagName('texte');
			//recupération attribut User
			$user = $msg->getAttribute('user');

			// recupération du message tout les texte et leur infoss
			$message = $text->item(0)->nodeValue;

			//récupération ed l'attribut heure du message
			$heure = $text->item(0)->getAttribute('heure');


			$resultat[] = array(
				"utilisateur" => $user,
				"message" => $message,
				'heure' => $heure,
				'idSalle' => $idSalle
			);
			continue;
		}

		return $resultat;

	}


	//on ecrit ou on crrée dans a notre xml
	public function ajouterMessages($data_post)
	{

		/**
		 * important !
		 * la selection des salles se fait via le item(id)
		 * le récupération de id se fait a partir de la m.thode privée retournId
		 */

		$id = $this->returnId($data_post['salle']);
		$salle_xml = $this->domDoc->getElementsByTagName('salle')->item($id);
		$nom_Salle = $salle_xml->getAttribute('id');

		//creation de noeud message
		$message_xml = $this->domDoc->createElement('message');
		//lui donner un attribut user afin de savoir qui la ecrit
		$message_xml->setAttribute('user', $data_post['user']);

		//mettre message dans la salle
		$salle_xml->appendChild($message_xml);

		//creation du message (noeud texte)
		$msg_texte = $this->domDoc->createElement('texte' , $data_post['message']);
		//ajoute de lattribut heure au texte
		$msg_texte->setAttribute('heure',date(DATE_RFC822, now('America/Toronto')) );
		//metrre le texte dans le message
		$message_xml->appendChild($msg_texte);

		$this->domDoc->save(XML_PATH);


	}
}
