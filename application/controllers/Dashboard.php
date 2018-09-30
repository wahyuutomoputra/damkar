<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    function __construct()
	{
        parent::__construct();
        session_start();
		// if (!isset($_SESSION['nip'])) {
        //     die('login dulu bos');
        // }
	}	

	public function index()
	{
        $this->load->view('dashboard');
	}
}
