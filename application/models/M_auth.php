<?php

class M_auth extends CI_Model
{
    function login($nip)
    {
        $this->db->select('nip, password, nama, status');
        return $query = $this->db->get_where('pegawai', array('nip' => $nip));
        
    }

    function reset()
    {
    	$nip = $this->input->post('nip');
    	$query = $this->db->get_where('pegawai', array('nip' => $nip))->row_array();
    	$email = $query['email'];
    	
  		$new_pass=0;
		for ($i=0; $i <= 6 ; $i++) { 
			$new_pass = $new_pass.rand(1,9);
		}
    	$this->db->set('password', password_hash($new_pass,PASSWORD_DEFAULT));
		$this->db->where('nip', $nip);
		$hasil = $this->db->update('pegawai');
		if ($hasil) {
			 $from_email = "tyasr56@gmail.com"; 
		        $config = Array(
		                'protocol' => 'smtp',
		                'smtp_host' => 'ssl://smtp.googlemail.com',
		                'smtp_port' => 465,
		                'smtp_user' => $from_email,
		                'smtp_pass' => 'sobontoro24',
		                'mailtype'  => 'html', 
		                'charset'   => 'iso-8859-1'
		        );

		        $this->load->library('email');
		        $this->email->initialize($config);
		        $this->email->set_newline("\r\n");   

		        $this->email->from($from_email, 'Damkar Soreang'); 
		        $this->email->to($email);
		        $this->email->subject('Reset Password'); 
		        $this->email->message($new_pass); 
		        $this->email->send();
		        return $hasil;
		}

		
    }
}
?>
