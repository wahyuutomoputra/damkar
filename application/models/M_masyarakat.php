<?php

class M_masyarakat extends CI_Model
{   

    function tampil($kode)
    {
        $hasil=$this->db->query("SELECT * FROM laporan WHERE status = '$kode'");
        return $hasil->result();
    }

    function update_laporan($id)
    {
    	$this->db->set('status', 'sudah');
		$this->db->where('id', $id);
		$this->db->update('laporan');
    }

    function get_detail($id)
    {
    	$this->db->where('id',$id);
    	return $this->db->get('laporan');
    }

    function input()
    {
        $data = array(
            'nama'=> $this->input->post('nama'),
            'nomor' => $this->input->post('nomor'),
            'pesan' => $this->input->post('pesan'),
            'lokasi'=>'Telkom',
            'latitude'=>'-6.973634',
            'longitude'=>'107.630529',
            'status'=> 'belum'
        );
        return $this->db->insert('laporan', $data);
    }
}
?>
