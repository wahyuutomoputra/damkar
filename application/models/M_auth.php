<?php

class M_auth extends CI_Model
{
    function login($nip)
    {
        $this->db->select('nip, password, nama');
        return $query = $this->db->get_where('Petugas', array('nip' => $nip));
        
    }
}
?>
