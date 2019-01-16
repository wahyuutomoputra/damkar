<?php

class M_dashboard extends CI_Model
{
    function isi()
    {
    	
		$hari = $this->db->query("SELECT count(*) AS hari FROM berita_acara WHERE tanggal =  CURDATE()")->row_array();
		$bulan = $this->db->query("SELECT count(*) AS bulan 
			FROM berita_acara
			WHERE MONTH(tanggal) =  MONTH(CURDATE()) AND YEAR(tanggal) =  YEAR(CURDATE())")->row_array();
		$tahun = $this->db->query("SELECT count(*) AS tahun 
			FROM berita_acara WHERE YEAR(tanggal) =  YEAR(CURDATE())")->row_array();

		$hasil=array($hari,$bulan,$tahun,);
		return $hasil;
		 
    	
    }
}
?>
