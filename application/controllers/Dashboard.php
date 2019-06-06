<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    function __construct()
	{
        parent::__construct();
        $this->load->helper(array('url','form','html'));
		$this->load->library('form_validation');
		$this->load->model('M_dashboard');
        session_start();
		if (!isset($_SESSION['nip'])) {
            die('login dulu bos');
        }
	}	

	public function index()
	{
        $this->load->view('Dashboard');
	}

	public function get_data()
	{
		$data = $this->M_dashboard->isi();
        echo json_encode($data);
	}
}
