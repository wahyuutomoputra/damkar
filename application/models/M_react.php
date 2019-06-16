<?php 
class M_react extends CI_Model
{
	function get_riwayat($offset)
	{
		return $this->db->query('SELECT * FROM berita_acara LIMIT 20 OFFSET '.$offset.'');
	}

	function cek_user($email,$password)
	{
		return $query = $this->db->get_where('masyarakat', array('email' => $email, 'password'=>$password));
		// return $this->db->query('SELECT * FROM masyarakat WHERE email = '.$email.' AND password = '.$password.'');
	}

	function insertLaporan($data)
	{
		return $this->db->insert('laporan_kejadian', $data);
	}

	function riwayatLaporan($id)
	{
		return $this->db->get_where('laporan_kejadian', array('id_masyarakat'=>$id));
	}

	function create_user($data)
	{
		return $this->db->insert('masyarakat', $data);
	}

	function detailLaporan($id)
	{
		return $this->db->get_where('laporan_kejadian', array('id'=>$id));
	}

}

 ?>