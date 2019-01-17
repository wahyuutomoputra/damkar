<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rescue extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url','form','html'));
		$this->load->model('M_rescue');
		session_start();
    }	

	public function index()
	{
		$data['kec'] = $this->M_rescue->get_kecamatan()->result();
		$this->load->view('rescue/input_rescue',$data);
	}

	public function input()
	{
		$insert = $this->M_rescue->insert();
        if ($insert) {
            redirect('Rescue/tampil_rescue');
        }
	}

	public function tampil_rescue($params="")
    {
        $data['filter'] = $params;
        $this->load->view('rescue/tampil_rescue',$data);
    }

    public function detail_rescue($id)
    {
        $data['detail'] = $this->M_rescue->get_detail($id)->row_array();
        $data['kec'] = $this->M_rescue->get_kecamatan()->result();
        $data['jenis'] = array("Penyelamatan Korban kebakaran","Penyelamatan dibangunan Tinggi",
                                "Penyelamatan di Air","Penyelamatan di Bangunan Runtuh","Evakuasi Pohon Tumbang","Evakuasi Sarang Tawon","Evakuasi Hewan","Bencana Lainnya");
        $this->load->view('rescue/detail_rescue',$data);
    }

    public function get_data_rescue($filter)
    {
        $list = $this->M_rescue->get_datatables($filter);
        $data = array();
        $no = $_POST['start'];
        $hari = array ( 1 =>    'Senin',
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
            
            $row[] =  "<a href=".base_url('Rescue/detail_rescue/'.$field->id).">Detail</a>";
 
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_rescue->count_all(),
            "recordsFiltered" => $this->M_rescue->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    public function update()
    {
        $id = $this->input->post('id');
        $update = $this->M_rescue->update($id);
        if ($update) {
            redirect('Rescue/detail_rescue/'.$id);
        }
    }

    public function cetak($id)
    {
        $this->M_rescue->cetak($id);
    }
}
