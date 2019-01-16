<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {
    function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url','form','html'));
		$this->load->library('form_validation');
		$this->load->model('M_pegawai');
		session_start();
    }	

	public function index()
	{
		$this->load->view('pegawai/Menu');
    }
    
    public function input()
    {
        $data=$this->M_pegawai->input();
        echo json_encode($data);
    }

    public function get_data()
    {
        $data=$this->M_pegawai->daftar_pegawai();
        echo json_encode($data);
    }

    public function hapus()
    {
        $data=$this->M_pegawai->hapus_pegawai();
        echo json_encode($data);
    }

    public function get_pegawai()
    {
        $id=$this->input->get('id');
        $data=$this->M_pegawai->get_pegawai_by_id($id);
        echo json_encode($data);
    }

    public function update_pegawai()
    {
         $data=$this->M_pegawai->update_pegawai();
         echo json_encode($data);
    }

    public function update_profile()
    {
        $data = $this->M_pegawai->update_profile();
        redirect('Pegawai/profile');
    }

    public function profile()
    {
        $data['pegawai']=$this->M_pegawai->get_profile()->row_array();
        $this->load->view('pegawai/profile',$data);
    }

    public function ubah_password()
    {
        $data = $this->M_pegawai->ubah_password();
        echo json_encode($data);
    }
}
