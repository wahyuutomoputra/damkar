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
		$this->load->view('pegawai/menuPegawai');
    }
    
    
    //profile
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

    public function ajax_list()
    {
        $list = $this->M_pegawai->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $person->nip;
            $row[] = $person->nama;
            $row[] = $person->email;
            $row[] = $person->status;
            $row[] = $person->alamat;

            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$person->nip."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_person('."'".$person->nip."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
        
            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->M_pegawai->count_all(),
                        "recordsFiltered" => $this->M_pegawai->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_add()
    {
        $this->_validate();
        $data = array(
                'nip' => $this->input->post('nip'),
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('nip'),PASSWORD_DEFAULT),
                'status' => $this->input->post('status'),
                'alamat' => $this->input->post('alamat'),
            );
        $insert = $this->M_pegawai->save($data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_update()
    {
        $this->_validate();
        $data = array(
                'nip' => $this->input->post('nip'),
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'status' => $this->input->post('status'),
                'alamat' => $this->input->post('alamat'),
            );
        $this->M_pegawai->update(array('nip' => $this->input->post('nip')), $data);
        echo json_encode(array("status" => TRUE));
    }

    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if($this->input->post('nip') == '')
        {
            $data['inputerror'][] = 'nip';
            $data['error_string'][] = 'NIP harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('nama') == '')
        {
            $data['inputerror'][] = 'nama';
            $data['error_string'][] = 'Nama harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('email') == '')
        {
            $data['inputerror'][] = 'email';
            $data['error_string'][] = 'Email harus diisi';
            $data['status'] = FALSE;
        }

        if($this->input->post('status') == '')
        {
            $data['inputerror'][] = 'status';
            $data['error_string'][] = 'Status harus dipilih';
            $data['status'] = FALSE;
        }

        if($this->input->post('alamat') == '')
        {
            $data['inputerror'][] = 'alamat';
            $data['error_string'][] = 'Alamat harus diisi';
            $data['status'] = FALSE;
        }

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

    public function ajax_edit($id)
    {
        $data = $this->M_pegawai->get_by_id($id);
        echo json_encode($data);
    }

    public function ajax_delete($id)
    {
        $this->M_pegawai->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }
}
