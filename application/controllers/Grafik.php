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
		if ($this->input->post('submit')) {
			$bulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
			$dari = intval($this->input->post('dari')) - 1;
			$sampai = intval($this->input->post('sampai')) - 1;
			$x['tanggal'] = "Laporan Penanggulangan Kejadian Kebakaran selama bulan "
						.$bulan[$dari]." - "
						.$bulan[$sampai]." Tahun "
						.$this->input->post('tahun');
		}

		$x['data'] = $this->M_grafik->get_dataKebakaran();
		$this->load->view('grafik/grafikKebakaran',$x);
	}

	//menampilkan data kebakaran per kecamatan
	public function grafikKecamatan()
	{
		if ($this->input->post('submit')) {
			$bulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
			$dari = intval($this->input->post('dari')) - 1;
			$sampai = intval($this->input->post('sampai')) - 1;
			$x['tanggal'] = "Laporan Penanggulangan Kebakaran Per-Kecamatan selama bulan "
						.$bulan[$dari]." - "
						.$bulan[$sampai]." Tahun "
						.$this->input->post('tahun');
		}
		
		$x['data'] = $this->M_grafik->get_dataKecamatan();
		$this->load->view('grafik/grafikKecamatan',$x);
	}
}
