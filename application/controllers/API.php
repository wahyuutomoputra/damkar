<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;
class API extends REST_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url','form','html'));
		$this->load->library('form_validation');
		$this->load->model('M_masyarakat');
		session_start();
	}

	public function index_get()
	{
		$this->response($this->db->get('laporan')->result());
	}

	public function index_post()
	{
		$uploaddir = './uploads/products/';
	    $file_name = underscore($_FILES['file']['name']);
	    $uploadfile = $uploaddir.$file_name;

	    if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
	        $dataDB['status'] = 'success';       
	        $dataDB['filename'] = $file_name;
	     } else {
	        $dataDB['status'] =  'failure';       
	     }
        $data = array(
                    'id'       => $this->post('id'),
                    'nama'     => $this->post('nama'),
                    'nomor'    => $this->post('nomor'));
        $insert = $this->db->insert('telepon', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    public function index_put() 
    {
        $id = $this->put('id');
        $data = array(
                    'id'       => $this->put('id'),
                    'nama'          => $this->put('nama'),
                    'nomor'    => $this->put('nomor'));
        $this->db->where('id', $id);
        $update = $this->db->update('telepon', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    public function index_delete()
    {
        $id = $this->delete('id');
        $this->db->where('id', $id);
        $delete = $this->db->delete('telepon');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

  
} 
 ?>