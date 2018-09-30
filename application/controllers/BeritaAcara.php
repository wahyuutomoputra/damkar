<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BeritaAcara extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url','form','html'));
		$this->load->library('form_validation');
		$this->load->model('M_berita_acara');
		session_start();
    }	
    
    public function view_isi()
    {
        $data['kec'] = $this->M_berita_acara->get_kecamatan()->result();
        $this->load->view('beritaAcara/view_beritaAcara',$data);
    }

    public function input()
    {
        $this->M_berita_acara->insert();
    }

	
        
}
