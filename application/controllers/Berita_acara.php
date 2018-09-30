<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita_acara extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url','form','html'));
		$this->load->library('form_validation');
		$this->load->model('M_auth');
		session_start();
    }	
    
    public function view_isi()
    {
        $this->load->view('beritaAcara/view_beritaAcara');
    }

    public function input()
    {
        $informasiDiterima = $this->input->post('informasiDiterima');
        echo $informasiDiterima;
    }

	
        
}
