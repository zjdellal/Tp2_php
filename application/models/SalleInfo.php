<?php

/**
 * Created by PhpStorm.
 * User: 1634062
 * Date: 2018-04-20
 * Time: 15:52
 */
class SalleInfo extends CI_Model
{
    private $sallesBD = [
        'LOISIR' => 'CONNECTE',
        'SPORTS' => 'CONNECTE',
        'ETUDES' => 'CONNECTE'
    ];
    private $sallesXML = [
        'LIBRE' => 'PUBLIC',
        'PLAINTES' => 'PUBLIC',
        'ADMINISTRATION' => 'ADMIN'
    ];
    private $motsInterdits = ['MERDE', 'FUCK', 'CALISS', 'CRISS', 'ESTIE', 'OSTIE', 'TABARNAK', 'TABARNAQUE', 'SACRAMENT', 'BULLSHIT', 'SHIT'];

    /**
     *  Indique si le nom reçu est contenu en BD ou dans les fichiers XML. Retourne
     * faux si le nom n’est contenu dans aucun des deux systèmes.
     * @param $nomSalle
     */
    public function isBDorXML($nomSalle)
    {
        $retour = FALSE;
        if (isset($this->sallesBD[strtoupper($nomSalle)])) {
            $retour = 'BD';
        } else if (isset($this->$this->sallesXML[strtoupper($nomSalle)])) {
            $retour = 'XML';
        }
        return $retour;
    }

    /**
     * Retourne faux si le texte reçu contient un mot interdit.
     * @param $str
     * @return bool true si le texte est valide
     */
    public function isTextAllowed($str)
    {
        $valide = true;
        $tokens = explode(" ", $str);
        for ($i = 0; $i < sizeof($tokens); $i++) {
            if (in_array(strtoupper($tokens[$i]), $this->motsInterdits)) {
                $valide = false;
            }
        }
        return $valide;

    }

    /**
     * Retourne l'ID associé à la salle.
     * @param $nomSalle
     * @return mixed ID ou null si introuvable
     */
    public function getSalleId($nomSalle)
    {
        $query = $this->db->get_where('salles', array('nom' => $nomSalle));
        return $query->result_array()[0];
    }

    public function getSalleStatus($nomSalle)
    {
        $status = null;
        if ($this->isBDorXML($nomSalle) === 'BD') {
            $status = $this->sallesBD[strtoupper($nomSalle)];
        } elseif ($this->isBDorXML($nomSalle) === 'XML') {
            $status = $this->sallesXML[strtoupper($nomSalle)];
        }
        return $status;
    }
}