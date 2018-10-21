<?php

class M_grafik extends CI_Model
{
    function get_dataKebakaran()
    {
        if($this->input->post('submit')){
            $dari = $this->input->post('dari');
            $sampai = $this->input->post('sampai');
            $query = $this->db->query("SELECT DISTINCT ambil.jenisBangunan,count(jenisBangunan) AS jenis, SUM(jenis) AS total FROM 
            (SELECT DISTINCT jenisBangunan,count(jenisBangunan) AS jenis FROM Berita_Acara
            WHERE MONTH(tanggal) BETWEEN $dari AND $sampai
            GROUP BY jenisBangunan) AS ambil
            GROUP BY ambil.jenisBangunan");

        }else {
            $query = $this->db->query("SELECT DISTINCT ambil.jenisBangunan,count(jenisBangunan) AS jenis, SUM(jenis) AS total FROM 
            (SELECT DISTINCT jenisBangunan,count(jenisBangunan) AS jenis FROM Berita_Acara GROUP BY jenisBangunan) AS ambil
            GROUP BY ambil.jenisBangunan");
        }
        

        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }else {
            $hasil = null;
            return $hasil;
        }
    }
}
?>
