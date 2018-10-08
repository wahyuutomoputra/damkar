<?php

class M_berita_acara extends CI_Model
{
    var $table = 'Berita_Acara';
    var $column_order = array(null,'namaPemilik','desa','kecamatan');
    var $column_search = array('namaPemilik','desa','kecamatan');
    var $order = array('id' => 'asc');

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

    private function get_datatables_query()
    {
        $this->db->from($this->table);
        $i = 0;

        foreach ($this->column_search as $item) // looping awal
        {
            if($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {
                if($i===0) // looping awal
                {
                    $this->db->group_start(); 
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) 
                    $this->db->group_end(); 
            }
            $i++;
        }
         
        if(isset($_POST['order'])) 
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();

    }

    function count_filtered()
    {
        $this->get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
}
?>
