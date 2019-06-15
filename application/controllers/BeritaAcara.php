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
        $insert = $this->M_berita_acara->insert();
        if ($insert) {
            redirect('BeritaAcara/tampil_beritaAcara');
        }
    }

    //tampilkan berita acara
    public function tampil_beritaAcara($params="")
    {
        $data['filter'] = $params;
        $this->load->view('beritaAcara/tampil_beritaAcara',$data);
    }

    //tampilkan detail berita acara
    public function detail_beritaAcara($id)
    {
        $data['detail'] = $this->M_berita_acara->get_detail($id)->row_array();
        $data['kec'] = $this->M_berita_acara->get_kecamatan()->result();
        $this->load->view('beritaAcara/detail_beritaAcara',$data);
    }

    public function get_data_beritaAcara($filter)
    {
        $list = $this->M_berita_acara->get_datatables($filter);
        $data = array();
        $no = $_POST['start'];
        $hari = array ( 1 => 'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat',
            'Sabtu',
            'Minggu'
        );


        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $field->id;
            $row[] = $no;
            $row[] = $field->tanggal;
            $row[] = $hari[date('N', strtotime($field->tanggal))];
            $row[] = $field->namaPemilik;
            //$row[] = $field->desa;
            
           
 
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

    public function get_forLaporan($filter)
    {
        $list = $this->M_berita_acara->get_datatables($filter);
        $data = array();
        $no = $_POST['start'];
        $hari = array ( 1 => 'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat',
            'Sabtu',
            'Minggu'
        );


        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->tanggal;
            $row[] = $hari[date('N', strtotime($field->tanggal))];
            $row[] = $field->namaPemilik;
            //$row[] = $field->desa;
            
            $row[] =  $field->id;
 
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

    public function update()
    {
        $id = $this->input->post('id');
        $update = $this->M_berita_acara->update($id);
        if ($update) {
            redirect('BeritaAcara/detail_beritaAcara/'.$id);
        }
    }

    public function cetak($id)
    {
        $this->M_berita_acara->cetak($id);
    }
        
}
