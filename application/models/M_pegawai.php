<?php

class M_pegawai extends CI_Model
{
    function input()
    {
        //$status = 
        $data = array(
            'nip'=> $this->input->post('nip'),
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'password' => password_hash($this->input->post('nip'),PASSWORD_DEFAULT),
            'status' => $this->input->post('status'),
            'alamat' => $this->input->post('alamat')
        );
        return $this->db->insert('Pegawai', $data);
        
    }

    function daftar_pegawai()
    {
        $hasil=$this->db->get("Pegawai");
        return $hasil->result();
    }

    function hapus_pegawai()
    {
        $id = $this->input->post('id_pegawai');
        $hasil=$this->db->query("DELETE FROM Pegawai WHERE nip='$id'");
        return $hasil;
    }

    function get_pegawai_by_id($id)
    {
        $hsl=$this->db->query("SELECT * FROM Pegawai WHERE nip='$id'");
        if($hsl->num_rows()>0){
            foreach ($hsl->result() as $data) {
                $hasil=array(
                    'pegawai_nip' => $data->nip,
                    'pegawai_nama' => $data->nama,
                    'pegawai_email' => $data->email,
                    'pegawai_status' => $data->status,
                    'pegawai_alamat' => $data->alamat,
                    );
            }
        }
        return $hasil;
    }

    function update_pegawai()
    {
        $data = array(
            'nip'=> $this->input->post('nip'),
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'status' => $this->input->post('status'),
            'alamat' => $this->input->post('alamat')
        );
        $this->db->where('nip', $this->input->post('nip'));
        return $this->db->update('pegawai', $data);
    }

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
