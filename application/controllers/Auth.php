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
		$data = $hasil->row_array();
		$password = $data['password'];

		if($hasil->num_rows() > 0)
		{
			
			if (password_verify($pass,$password))
			{
				$_SESSION['nip'] = $nip;
				//$this->session->set_userdata('nip',$nip);
				
				redirect('Dashboard/index');
			}else {
				echo "Password Salah";
			}$this->session->set_userdata('nip','isi');
			redirect('Dashboard/index');
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
        
}
