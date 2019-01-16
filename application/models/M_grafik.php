<?php

class M_grafik extends CI_Model
{
    function get_dataKebakaran()
    {
        if($this->input->post('submit')){
            $dari = $this->input->post('dari');
            $sampai = $this->input->post('sampai');
            $tahun = $this->input->post('tahun');
            
            $query = $this->db->query("SELECT DISTINCT jenisBangunan, COUNT(jenisBangunan) AS jumlah, SUM(asetKeseluruhan) AS totalKerugian, SUM(asetTerselamatkan) AS totalTerselamatkan
            FROM berita_acara WHERE MONTH(tanggal) BETWEEN $dari AND $sampai AND YEAR(tanggal) = $tahun
            GROUP BY jenisBangunan");
        }else {
            $query = $this->db->query("SELECT DISTINCT jenisBangunan, COUNT(jenisBangunan) AS jumlah, SUM(asetKeseluruhan) AS totalKerugian, SUM(asetTerselamatkan) AS totalTerselamatkan
            FROM berita_acara WHERE YEAR(tanggal) = YEAR(CURDATE())
            GROUP BY jenisBangunan");
        }

        
        if($query->num_rows() > 0){
            $a=0;
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }else {
            $hasil = null;
            return $hasil;
        }
    }

    function get_dataKecamatan()
    {
        if($this->input->post('submit')){
            $dari = $this->input->post('dari');
            $sampai = $this->input->post('sampai');
            $tahun = $this->input->post('tahun');

            $query = $this->db->query("SELECT k.nama,IFNULL(count(ba.idKecamatan),0) AS jumlah
            FROM kecamatan k LEFT JOIN berita_acara ba ON k.idKecamatan = ba.idKecamatan
            WHERE IFNULL(MONTH(tanggal),$dari) BETWEEN $dari AND $sampai AND IFNULL(YEAR(tanggal),$tahun) = $tahun
            GROUP BY k.nama ORDER BY jumlah DESC");


            // $query = $this->db->query("SELECT k.nama,count(ba.idKecamatan) AS jumlah
            // FROM kecamatan k JOIN berita_acara ba ON k.idKecamatan = ba.idKecamatan
            // WHERE MONTH(tanggal) BETWEEN $dari AND $sampai AND YEAR(tanggal) = $tahun
            // GROUP BY k.nama ORDER BY k.nama ASC");
        }else {
            $query = $this->db->query("SELECT k.nama,IFNULL(count(ba.idKecamatan),0) AS jumlah
            FROM kecamatan k LEFT JOIN berita_acara ba ON k.idKecamatan = ba.idKecamatan
            GROUP BY k.nama ORDER BY jumlah DESC");
            // $query = $this->db->query("SELECT k.nama,count(ba.idKecamatan) AS jumlah
            // FROM kecamatan k JOIN berita_acara ba ON k.idKecamatan = ba.idKecamatan
            // GROUP BY k.nama ORDER BY k.nama ASC");
        }

        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
}
?>
