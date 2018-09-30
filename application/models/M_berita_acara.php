<?php

class M_berita_acara extends CI_Model
{
    public function insert()
    {
        $data = array(
            'informasiDiterima' => $this->input->post('informasiDiterima'),
            'tibaDilokasi' => $this->input->post('tibaDilokasi'),
            'selesaiPemadaman' => $this->input->post('selesaiPemadaman'),
            'responTime' => "belum",
            'tanggal' => $this->input->post('tanggal'),
            'rt' => $this->input->post('rt'),
            'rw' => $this->input->post('rw'),
            'kampung' => $this->input->post('kampung'),
            'desa' => $this->input->post('desa'),
            'kecamatan' => $this->input->post('kecamatan'),
            'kota' => $this->input->post('kota'),
            'namaPemilik' => $this->input->post('namaPemilik'),
            'jumlahPenghuni' => $this->input->post('jumlahPenghuni'),
            'jenisBangunan' => $this->input->post('jenisBangunan'),
            'areaTerbakar' => $this->input->post('areaTerbakar'),
            'luasArea' => $this->input->post('luasArea'),
            'asetKeseluruhan' => $this->input->post('asetKeseluruhan'),
            'asetTerselamatkan' => $this->input->post('asetTerselamatkan'),
            'luka' => $this->input->post('luka'),
            'meninggal' => $this->input->post('meninggal'),
            'jumlahMobil' => $this->input->post('jumlahMobil'),
            'nomorPolisi' => $this->input->post('nomorPolisi'),
            'jumlahPetugas' => $this->input->post('jumlahPetugas'),
            'danru1' => $this->input->post('danru1'),
            'danru2' => $this->input->post('danru2'),
            'danton1' => $this->input->post('danton1'),
            'danton2' => $this->input->post('danton2'),
        );
        
        return $this->db->insert('Berita_Acara', $data);
    }

    public function get_kecamatan()
    {
        return $this->db->get('kecamatan');
    }
}
?>
