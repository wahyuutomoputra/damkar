<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url','form','html'));
		$this->load->library('form_validation');
		$this->load->model('M_auth');
		session_start();
	}	

	public function index()
	{
		$this->load->view('login');
	}

	public function validasi()
	{
		
		$nip = $this->input->post('nip');
		$pass = $this->input->post('password');
		$hasil = $this->M_auth->login($nip);
		

		if($hasil->num_rows() > 0)
		{
			$data = $hasil->row_array();
			$password = $data['password'];
			
			if (password_verify($pass,$password))
			{
				$_SESSION['nip'] = $data['nip'];
				$_SESSION['nama'] = $data['nama'];
				$_SESSION['status'] = $data['status'];
				$_SESSION['password'] = $password;
				redirect('Dashboard/index');
			}else {
				echo "Password Salah";
			}
		}else {
			echo "NIP salah";
		}
	}

	public function tes()
	{
		$this->session->set_userdata('nip','isi');
		redirect('Dashboard/index');
	}

	public function logout()
	{
		session_destroy();
		redirect('Auth');
	}

	public function reset_password()
	{	
		$data = $this->M_auth->reset();
		echo json_encode($data);
	}
        
}
