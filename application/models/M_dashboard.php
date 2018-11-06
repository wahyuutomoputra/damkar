<?php

class M_dashboard extends CI_Model
{
    function isi()
    {
    	
		$hari = $this->db->query("SELECT count(*) AS hari FROM Berita_Acara WHERE tanggal =  CURDATE()")->row_array();
		$bulan = $this->db->query("SELECT count(*) AS bulan 
			FROM Berita_Acara
			WHERE MONTH(tanggal) =  MONTH(CURDATE())")->row_array();
		$tahun = $this->db->query("SELECT count(*) AS tahun 
			FROM Berita_Acara WHERE YEAR(tanggal) =  YEAR(CURDATE())")->row_array();

		$hasil=array($hari,$bulan,$tahun,);
		return $hasil;
		 
    	
    }
}
?>
