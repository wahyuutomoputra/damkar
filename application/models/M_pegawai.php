<?php

class M_pegawai extends CI_Model
{

    var $table = 'pegawai';
    var $column_order = array('nip','nama','email','status','alamat',null); //set column field database for datatable orderable
    var $column_search = array('nip','nama','status'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $order = array('nama' => 'asc'); // default order 

    private function _get_datatables_query()
    {
        
        $this->db->from($this->table);

        $i = 0;
    
        foreach ($this->column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
        
        if(isset($_POST['order'])) // here order processing
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
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function get_by_id($id)
    {
        $this->db->from($this->table);
        $this->db->where('nip',$id);
        $query = $this->db->get();

        return $query->row();
    }

    public function save($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }

    public function delete_by_id($id)
    {
        $this->db->where('nip', $id);
        $this->db->delete($this->table);
    }

    //profile
    function get_profile()
    {
        $nip = $_SESSION['nip'];
        $this->db->where('nip', $nip);
        return $this->db->get('pegawai');
    }

    function update_profile()
    {
        $nip = $_SESSION['nip'];
        $data = array(
            'nama' => $this->input->post('Nama'),
            'email' => $this->input->post('Email'),
            'alamat' => $this->input->post('Alamat')
        );
        $this->db->where('nip', $nip);
        return $this->db->update('pegawai', $data);

    }

    function ubah_password()
    {
        $nip = $_SESSION['nip'];
        $passBaru = $this->input->post('pb');
        $passLama = $this->input->post('pl');
        $password = $_SESSION['password'];

        if (password_verify($passLama,$password)){
            $this->db->set('password', password_hash($passBaru,PASSWORD_DEFAULT));
            $this->db->where('nip', $nip);
            $this->db->update('pegawai');
            return true;
        }else{
            return false;
        }

        
    }
}
?>
