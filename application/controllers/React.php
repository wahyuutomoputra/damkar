<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class React extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		header('Content-Type: application/json; charset=utf-8');
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Methods: PUT, GET, POST");
		$this->load->helper(array('url','form','html'));
		$this->load->model('M_react');
    }

    public function cek_login()
    {
    	$email = $this->input->post('email');
    	$password = $this->input->post('password');
    	$status = false;
    	$response['id'] = null;
    	$cek = $this->M_react->cek_user($email,$password);
    	if ($cek->num_rows()>0) {
    		$status = true;
    		$data = $cek->row_array();
    		$response['id'] = $data['id'];
    	}

    	$response['hasil'] = $status;
        echo json_encode($response,TRUE);
    }

    public function laporan()
    {
        $this->load->library('upload');
        $config['upload_path']          = './uploads/laporan';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 5000;
        $config['max_width']            = 5000;
        $config['max_height']           = 5000;
        $this->upload->initialize($config);

        $date = date('Y-m-d');
        $id = $this->input->post('id');
        $latitude = $this->input->post('latitude');
        $longitude = $this->input->post('longitude');
        $kategori = $this->input->post('kategori');
        $pesan = $this->input->post('pesan');

        $data = array('id_masyarakat' => $id,
                      'latitude' => $latitude,
                      'longitude' => $longitude,
                      'kategori' => $kategori,
                      'status' => 'belum',
                      'foto' => $_FILES['fileToUpload']['name'],
                      'pesan' => $pesan,
                      'tanggal' => $date);
        $insert = $this->M_react->insertLaporan($data);

        $pusher = new Pusher\Pusher("e17ba6c5aa281e4caa40", "de4362ba571d091e20dc", "690999", array('cluster' => 'ap1'));
        $pusher->trigger('my-channel', 'my-event', array('message' => $kategori));

        $response['hasil'] = "gagal";
        $response['insert'] = "belum";
        $response['id'] = $id;

        if($insert){
            $response['hasil'] = "sudah";
        }
       
        if($this->upload->do_upload('fileToUpload')){
            $response['hasil'] = "berhasil";
        }

        echo json_encode($response,TRUE);
    }	

	public function get_riwayat($offset)
	{

		$data = $this->M_react->get_riwayat($offset)->result();
		$response = array();
        $posts = array();
    
        foreach ($data as $hasil) {
        	$posts[] = array('id' => $hasil->id,
        					 'kampung' => $hasil->kampung);
        }

        $response['d'] = $posts;
        header('Content-Type: application/json');
        echo json_encode($response,TRUE);
	}

    public function riwayat_laporan($id)
    {
        $data = $this->M_react->riwayatLaporan($id)->result();
        $isi = array();

        foreach ($data as $hasil) {
            $isi[] = array('id' => $hasil->id,
                           'latitude' => $hasil->latitude,
                           'longitude' => $hasil->longitude,
                           'foto' => $hasil->foto,
                           'pesan' => $hasil->pesan,
                           'kategori' => $hasil->kategori,
                           'tanggal' => $hasil->tanggal);
        }

        $response['d'] = $isi;
        //header('Content-Type: application/json');
        echo json_encode($response,TRUE);
    }

    public function detail($id)
    {
        $data = $this->M_react->detailLaporan($id)->result();
        $isi = array();

        foreach ($data as $hasil) {
            $isi[] = array('id' => $hasil->id,
                           'latitude' => $hasil->latitude,
                           'longitude' => $hasil->longitude,
                           'foto' => $hasil->foto,
                           'pesan' => $hasil->pesan,
                           'kategori' => $hasil->kategori,
                           'tanggal' => $hasil->tanggal);
        }

        $response['d'] = $isi;
        //header('Content-Type: application/json');
        echo json_encode($response,TRUE);
    }
}
