<?php

class M_rescue extends CI_Model
{
	var $table = 'rescue';
    var $column_order = array(null,'namaPemilik','desa','tanggal');
    var $column_search = array('namaPemilik','desa','tanggal');
    var $order = array('id' => 'asc');

	public function insert()
    {
        $selisih = $this->hitung_selisih($this->input->post('informasiDiterima').":00",$this->input->post('tibaDilokasi').":00");
        $this->load->library('upload');
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 5000;
        $config['max_width']            = 5000;
        $config['max_height']           = 5000;
        $namaGambar = array("index0");
        $date = date_create();
        
        for ($i=1; $i <= 2; $i++) {
            $namaBaru = date_format($date, 'U').",,".preg_replace('/\s+/', '', $_FILES['gambar'.$i]['name']);
            array_push($namaGambar,$namaBaru);
            $config['file_name'] = $namaBaru;
            $this->upload->initialize($config);
            $this->upload->do_upload('gambar'.$i);
        }

        $data = array(
            'informasiDiterima' => $this->input->post('informasiDiterima'),
            'tibaDilokasi' => $this->input->post('tibaDilokasi'),
            'selesaiPemadaman' => $this->input->post('selesaiPemadaman'),
            'responTime' => $selisih,
            'tanggal' => $this->input->post('tanggal'),
            'rt' => $this->input->post('rt'),
            'rw' => $this->input->post('rw'),
            'kampung' => $this->input->post('kampung'),
            'desa' => $this->input->post('desa'),
            'idKecamatan' => $this->input->post('kecamatan'),
            'kota' => $this->input->post('kota'),
            'namaPemilik' => $this->input->post('namaPemilik'),
            'jumlahPenghuni' => $this->input->post('jumlahPenghuni'),
            'jenisEvakuasi' => $this->input->post('jenisEvakuasi'),
            'jenisPenyelamatan' => $this->input->post('jenisPenyelamatan'),
            'keteranganPenyelamatan' => $this->input->post('keterangan'),
            'luka' => $this->input->post('luka'),
            'meninggal' => $this->input->post('meninggal'),
            'jumlahMobil' => $this->input->post('jumlahMobil'),
            'nomorPolisi' => $this->input->post('nomorPolisi'),
            'jumlahPetugas' => $this->input->post('jumlahPetugas'),
            'danru1' => $this->input->post('danru1'),
            'danru2' => $this->input->post('danru2'),
            'danton1' => $this->input->post('danton1'),
            'danton2' => $this->input->post('danton2'),
            'gambar1' => $namaGambar[1],
            'gambar2' => $namaGambar[2],
        );
        return $this->db->insert('rescue', $data);
    }

    public function update($id)
    {
        $selisih = $this->hitung_selisih($this->input->post('informasiDiterima').":00",$this->input->post('tibaDilokasi').":00");
         $this->load->library('upload');
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 5000;
        $config['max_width']            = 5000;
        $config['max_height']           = 5000;
        $namaGambar = array("index0");
        $date = date_create();
        //ini buat nyari kalo nama gambar sebelumnya ama yg baru sama ya gausah di unnlink
        for ($i=1; $i <=2 ; $i++) { 
            $namaBaru = date_format($date, 'U').",,".preg_replace('/\s+/', '', $_FILES['gambar'.$i]['name']);

            if ($_FILES['gambar'.$i]['name']) {
                array_push($namaGambar,$namaBaru);
                unlink(FCPATH . 'uploads/' . $this->input->post('gambarLama'.$i));
                $config['file_name'] = $namaBaru;
                $this->upload->initialize($config);
                $this->upload->do_upload('gambar'.$i);
            }else{
                 array_push($namaGambar,$this->input->post('gambarLama'.$i));
            }
        }

        $data = array(
            'informasiDiterima' => $this->input->post('informasiDiterima'),
            'tibaDilokasi' => $this->input->post('tibaDilokasi'),
            'selesaiPemadaman' => $this->input->post('selesaiPemadaman'),
            'responTime' => $selisih,
            'tanggal' => $this->input->post('tanggal'),
            'rt' => $this->input->post('rt'),
            'rw' => $this->input->post('rw'),
            'kampung' => $this->input->post('kampung'),
            'desa' => $this->input->post('desa'),
            'idKecamatan' => $this->input->post('kecamatan'),
            'kota' => $this->input->post('kota'),
            'namaPemilik' => $this->input->post('namaPemilik'),
            'jumlahPenghuni' => $this->input->post('jumlahPenghuni'),
            'jenisEvakuasi' => $this->input->post('jenisEvakuasi'),
            'jenisPenyelamatan' => $this->input->post('jenisPenyelamatan'),
            'keteranganPenyelamatan' => $this->input->post('keterangan'),
            'luka' => $this->input->post('luka'),
            'meninggal' => $this->input->post('meninggal'),
            'jumlahMobil' => $this->input->post('jumlahMobil'),
            'nomorPolisi' => $this->input->post('nomorPolisi'),
            'jumlahPetugas' => $this->input->post('jumlahPetugas'),
            'danru1' => $this->input->post('danru1'),
            'danru2' => $this->input->post('danru2'),
            'danton1' => $this->input->post('danton1'),
            'danton2' => $this->input->post('danton2'),
            'gambar1' => $namaGambar[1],
            'gambar2' => $namaGambar[2],
        );
        $this->db->where('id', $id);
        return $this->db->update('rescue', $data);
    }

    private function hitung_selisih($jam_terima,$jam_tiba)
    {

        list($h,$m,$s) = explode(":",$jam_terima);
        $dtAwal = mktime($h,$m,$s,"1","1","1");
        if (substr($jam_tiba,0,2)>= 18) {
            $waktu = mktime("18","00","00","1","1","1");
            $dtAkhir = $waktu;
        }else {
            list($h,$m,$s) = explode(":",$jam_tiba);
            $dtAkhir = mktime($h,$m,$s,"1","1","1");
        }
        $dtSelisih = $dtAkhir-$dtAwal;
        $totalmenit = $dtSelisih/60;
        $jam = explode(".",$totalmenit/60);
        $sisamenit = ($totalmenit/60)-$jam[0];
        $sisamenit2 = $sisamenit*60;
        $jml_jam = $jam[0];

        return $jml_jam." jam ".ceil($sisamenit2)." menit";
    }

    public function get_detail($id)
    {
        $this->db->select('*');
        $this->db->from('rescue');
        $this->db->join('kecamatan', 'kecamatan.idKecamatan = rescue.idKecamatan');
        $this->db->where('id', $id);
        return $this->db->get();
    }

    public function get_kecamatan()
    {
        $this->db->order_by("nama", "asc");
        return $this->db->get('kecamatan');
    }

    private function get_datatables_query()
    {
        if($this->input->post('dariTgl'))
        {
        	$this->db->where('tanggal BETWEEN "'. $this->input->post('dariTgl'). '" and "'. $this->input->post('sampaiTgl').'"');
        }
        
        $this->db->from($this->table);
        $i = 0;

        foreach ($this->column_search as $item) // looping awal
        {
            if($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {
                if($i===0) // looping awal
                {
                    $this->db->group_start(); 
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) 
                    $this->db->group_end(); 
            }
            $i++;
        }
         
        if(isset($_POST['order'])) 
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables($filter)
    {
        $this->get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        if ($filter=="tahun") {
            $this->db->where("DATE_FORMAT(tanggal,'%Y')", date("Y"));
        }else if($filter=="bulan"){
            $month_num = date('m');
            $month_name = date("F", mktime(0, 0, 0, $month_num, 10));
            $condition = array("DATE_FORMAT(tanggal,'%M')"=>$month_name,
                               "DATE_FORMAT(tanggal,'%Y')"=>date("Y"));
            $this->db->where($condition);
        }else if($filter=="hari"){
            $month_num = date('m');
            $month_name = date("F", mktime(0, 0, 0, $month_num, 10));
            $condition = array("DATE_FORMAT(tanggal,'%M')"=>$month_name,
                               "DATE_FORMAT(tanggal,'%Y')"=>date("Y"),
                               "DATE_FORMAT(tanggal,'%d')"=>date("d"));
            $this->db->where($condition);
        }
        $query = $this->db->get();
        return $query->result();

    }

    function count_filtered()
    {
        $this->get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function cetak($id)
    {
        $data = $this->M_rescue->get_detail($id)->row_array();
        $hari = array ( 1 => 'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat',
            'Sabtu',
            'Minggu'
        );

        $tgl = $hari[date('N', strtotime($data['tanggal']))];

        $document = file_get_contents(FCPATH . "bap/Rescue.rtf");
        $document = str_replace("#informasiDiterima", $data['informasiDiterima'], $document);
        $document = str_replace("#tibaDilokasi", $data['tibaDilokasi'], $document);
        $document = str_replace("#selesaiPemadaman",  $data['selesaiPemadaman'], $document);
        $document = str_replace("#responTime",  $data['responTime'], $document);
        $document = str_replace("#tanggal",  $this->tanggal($data['tanggal']), $document);
        $document = str_replace("#hari", $tgl , $document);
        $document = str_replace("#rt",  $data['rt'], $document);
        $document = str_replace("#rw",  $data['rw'], $document);
        $document = str_replace("#kampung",  $data['kampung'], $document);
        $document = str_replace("#desa",  $data['desa'], $document);
        $document = str_replace("#kecamatan",  $data['nama'], $document);
        $document = str_replace("#kab",  $data['kota'], $document);
        $document = str_replace("#nama",  $data['namaPemilik'], $document);
        $document = str_replace("#penghuni",  $data['jumlahPenghuni'], $document);
        $document = str_replace("#jenisEvakuasi",  $data['jenisEvakuasi'], $document);
        $document = str_replace("#jenisPenyelamatan",  $data['jenisPenyelamatan'], $document);
        $document = str_replace("#luka",  $data['luka'], $document);
        $document = str_replace("#meninggal",  $data['meninggal'], $document);
        $document = str_replace("#jumlahMobil",  $data['jumlahMobil'], $document);
        $document = str_replace("#nomorPolisi",  $data['nomorPolisi'], $document);
        $document = str_replace("#jumlahPetugas",  $data['jumlahPetugas'], $document);
        $document = str_replace("#danru1",  $data['danru1'], $document);
        $document = str_replace("#danru2",  $data['danru2'], $document);
        $document = str_replace("#danton1",  $data['danton1'], $document);
        $document = str_replace("#danton2",  $data['danton2'], $document);

        header("Content-type: application/msword");
        header("Content-disposition: inline; filename=Rescue.doc");
        header("Content-length: ".strlen($document));
        echo $document;
    }

    function tanggal($tanggal)
    {

        $bulan = array (
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('-', $tanggal);
        return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
    }

} 

?>