<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grafik extends CI_Controller {
    function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url','form','html'));
		$this->load->library('form_validation');
		$this->load->model('M_grafik');
		session_start();
    }	

	public function grafikKebakaran()
	{
        $x['data']=$this->M_grafik->get_dataKebakaran();
		$this->load->view('grafik/grafikKebakaran',$x);
	}
}
