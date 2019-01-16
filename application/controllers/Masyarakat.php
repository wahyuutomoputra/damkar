<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masyarakat extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url','form','html'));
		$this->load->library('form_validation');
		$this->load->model('M_masyarakat');
		session_start();
    }	

	public function index()
	{
		$this->load->view('masyarakat/laporan');
	}

	public function view_data()
	{
		$data = $this->M_masyarakat->tampil($kode='belum');
        echo json_encode($data);
	}

	public function lapor()
	{
		$this->load->view('masyarakat/lapor');
	}

	public function detail_laporan($id)
	{
		$this->M_masyarakat->update_laporan($id);
		$data = $this->M_masyarakat->get_detail($id)->row_array();
		$lokasi['kordinat'] = $data['latitude'].', '.$data['longitude'];
		$this->load->view('masyarakat/detail_laporan',$lokasi);
	}

	public function laporan_sudah_dibaca()
	{
		$this->load->view('masyarakat/laporan_sudah_dibaca');
	}

	public function view_data_sudah()
	{
		$data = $this->M_masyarakat->tampil($kode='sudah');
        echo json_encode($data);
	}

	public function input()
	{
		$data=$this->M_masyarakat->input();
        echo json_encode($data);
	}

	public function inputAndroid()
	{
		$nama = $this->input->post('nama');
		$data = array(
            'nama'=> $this->input->post('nama'),
            'nomor' => $this->input->post('nomor'),
            'pesan' => $this->input->post('pesan'),
            'lokasi'=>$this->input->post('lokasi'),
            'latitude'=>'-6.973634',
            'longitude'=>'107.630529',
            'status'=> 'belum'
        );
        $insert = $this->db->insert('laporan', $data);
        if ($insert) {
        	$pusher = new Pusher\Pusher("e17ba6c5aa281e4caa40", "de4362ba571d091e20dc", "690999", array('cluster' => 'ap1'));
  			$pusher->trigger('my-channel', 'my-event', array('message' => $nama));
        }
	}
}
