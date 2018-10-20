<?php

class M_grafik extends CI_Model
{
    function get_dataKebakaran()
    {
        $query = $this->db->query("SELECT DISTINCT jenisBangunan,count(jenisBangunan) AS jenis FROM Berita_Acara GROUP BY jenisBangunan");

        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
}
?>
