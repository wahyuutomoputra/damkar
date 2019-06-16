<?php

class M_masyarakat extends CI_Model
{
    var $table = 'laporan_kejadian';
    var $column_order = array(null,'nama','nomor','pesan','lokasi');
    var $column_search = array('nama','nomor','pesan','lokasi');
    var $order = array('id' => 'asc');


    function tampil($kode)
    {
        $hasil=$this->db->query("SELECT * FROM laporan WHERE status = '$kode'");
        return $hasil->result();
    }

    function updateBa($data,$where)
    {
        $this->db->where($where);
        return $this->db->update('laporan_kejadian', $data);
    }

    function update_laporan($id)
    {
    	$this->db->set('status', 'sudah');
		$this->db->where('id', $id);
		$this->db->update('laporan_kejadian');
    }

    function get_detail($id)
    {
    	$this->db->where('id',$id);
    	return $this->db->get('laporan_kejadian');
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
        return $this->db->insert('laporan_kejadian', $data);
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

    function get_datatables($filter)
    {
        $this->get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);

        if ($filter=="belum") {
            $this->db->where("status", "belum");
        }else if($filter=="sudah"){
            $this->db->where("status", "sudah");
        }
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
