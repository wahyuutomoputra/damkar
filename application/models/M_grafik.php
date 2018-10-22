<?php

class M_grafik extends CI_Model
{
    function get_dataKebakaran()
    {
        if($this->input->post('submit')){
            $dari = $this->input->post('dari');
            $sampai = $this->input->post('sampai');
            $tahun = $this->input->post('tahun');
            
            $query = $this->db->query(
            "SELECT DISTINCT ambil.jenisBangunan,count(jenisBangunan) AS jenis, SUM(jenis) AS totalJumlah, SUM(nilaiKerugian) AS totalKerugian, SUM(asetTerselamatkan) As totalAset
            FROM (SELECT DISTINCT jenisBangunan,count(jenisBangunan) AS jenis, nilaiKerugian, asetTerselamatkan FROM Berita_Acara
            WHERE MONTH(tanggal) BETWEEN $dari AND $sampai AND YEAR(tanggal) = $tahun
            GROUP BY jenisBangunan,nilaiKerugian,asetTerselamatkan) AS ambil
            GROUP BY ambil.jenisBangunan");

        }else {
            $query = $this->db->query(
            "SELECT DISTINCT ambil.jenisBangunan,count(jenisBangunan) AS jenis, SUM(jenis) AS totalJumlah, SUM(nilaiKerugian) AS totalKerugian, SUM(asetTerselamatkan) As totalAset
            FROM (SELECT DISTINCT jenisBangunan,count(jenisBangunan) AS jenis, nilaiKerugian, asetTerselamatkan FROM Berita_Acara
            GROUP BY jenisBangunan,nilaiKerugian,asetTerselamatkan) AS ambil
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

    function get_dataKecamatan()
    {
        if($this->input->post('submit')){
            $dari = $this->input->post('dari');
            $sampai = $this->input->post('sampai');
            $tahun = $this->input->post('tahun');

            $query = $this->db->query("SELECT kecamatan,count(kecamatan) AS jumlah FROM Berita_Acara
            WHERE MONTH(tanggal) BETWEEN $dari AND $sampai AND YEAR(tanggal) = $tahun
            GROUP BY kecamatan 
            ORDER BY kecamatan ASC");
        }else {
            $query = $this->db->query("SELECT k.nama,IFNULL(count(ba.idKecamatan),0) AS jumlah
            FROM kecamatan k JOIN Berita_Acara ba ON k.idKecamatan = ba.idKecamatan
            GROUP BY k.nama ORDER BY k.nama ASC");
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
