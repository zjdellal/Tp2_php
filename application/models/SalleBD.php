<?php

/**
 * User: 1634062 Charles Marceau
 * Date: 2018-04-20
 * Time: 13:38
 */
class SalleBD extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    function ajouteMessage($salleId,$userId,$message){
        $data = array(
            'message' => $message,
            'users_id' => $userId,
            'date' => date('Y-m-d H:i:s'),
            'salle_id_salle'=>$salleId
        );
        return $this->db->insert('messages', $data);
    }

    function retrouveTousLesMessages($salleId){
        $query = $this->db->get_where('messages',array('salle_id_salle'=>$salleId));
        return $query->result_array();
    }
}