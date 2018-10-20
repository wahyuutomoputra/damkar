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

    //tampilkan berita acara
    public function tampil_beritaAcara()
    {
        $this->load->view('beritaAcara/tampil_beritaAcara');
    }

    //tampilkan detail berita acara
    public function detail_beritaAcara($id)
    {
        $data['detail'] = $this->M_berita_acara->get_detail($id)->row_array();
        $this->load->view('beritaAcara/detail_beritaAcara',$data);

    }

    public function get_data_beritaAcara()
    {
        $list = $this->M_berita_acara->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->namaPemilik;
            $row[] = $field->desa;
            $row[] = $field->tanggal;
            $row[] =  "<a href=".base_url('BeritaAcara/detail_beritaAcara/'.$field->id).">Detail</a>";
 
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_berita_acara->count_all(),
            "recordsFiltered" => $this->M_berita_acara->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    
    }
        
}
