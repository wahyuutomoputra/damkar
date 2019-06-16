<?php 
$this->load->view('template/head');
?>
<!--tambahkan custom css disini-->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
<link type="text/css" href="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.11/css/dataTables.checkboxes.css" rel="stylesheet" />
<?php
$this->load->view('template/topbar');
$this->load->view('template/sidebar');
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Laporan Kebakaran
        <small>Sudah Dibaca</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Title</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            <table id="table" class="table table-striped table-bordered table-hover " cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th></th>
                        <th>NO</th>
                        <th>Tanggal</th>
                        <th>Kategori</th>
                        <th>Pesan</th>
                        <th>Lokasi</th>
                        <th>Berita Acara</th>
                    </tr>
                </thead>

                <tbody>
                </tbody>

                <tfoot>
                    <tr>
                        <th></th>
                        <th>NO</th>
                        <th>Tanggal</th>
                        <th>Kategori</th>
                        <th>Pesan</th>
                        <th>Lokasi</th>
                        <th>Berita Acara</th>
                    </tr>
                </tfoot>

            </table>
            <button id="kelompok" onclick="Kelompokkan()">Kelompokkan Berita Acara</button>
            <button type="submit" id="krm" value="submit" onclick="pilihBa()">Pilih BA</button>
        </div><!-- /.box-body -->
        <div class="box-footer">
            Footer
        </div><!-- /.box-footer-->
    </div><!-- /.box -->

</section><!-- /.content -->

<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Pilih Berita Acara</h4>
        </div>
        <div class="modal-body">
          <table id="ba" class="table table-striped table-bordered table-hover " cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th></th>
                        <th>NO</th>
                        <th>Tanggal</th>
                        <th>Hari</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>

                <tbody>
                </tbody>

                <tfoot>
                    <tr>
                        <th></th>
                        <th>NO</th>
                        <th>Tanggal</th>
                        <th>Hari</th>
                        <th>Tanggal</th>
                    </tr>
                </tfoot>

            </table>
        </div>
        <div class="modal-footer">
          <button type="button" onclick="inputBa()" class="btn btn-default" data-dismiss="modal">Submit</button>
        </div>
      </div>
      
    </div>
  </div>

<?php 
$this->load->view('template/js');
?>
<!--tambahkan custom js disini-->
<script type="text/javascript" src="https://cdn.datatables.net/s/dt/dt-1.10.10,se-1.1.0/datatables.min.js"></script>
<script src="<?php echo base_url('assets/datatables.net-bs/js/dataTables.bootstrap.min.js') ?>" type="text/javascript"></script>
<script type="text/javascript" src="http://gyrocode.github.io/jquery-datatables-checkboxes/1.2.11/js/dataTables.checkboxes.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
    var table;
    var pilih = true;
    var ba;
    var rows_selected = null;
    var id_laporan = [];
    $(document).ready(function() {
        document.getElementById('krm').style.visibility = 'hidden';
 
        //datatables
        table = $('#table').DataTable({ 
 
            "processing": true, 
            "serverSide": true,  
            "ajax": {
                "url": "<?php echo site_url('Masyarakat/view_data/sudah')?>",
                "type": "POST"
            },
            "columnDefs": [
            { 
                "order": [[1, 'asc']],
                "targets": [ 0 ], 
                'checkboxes': {
                    'selectRow': true,
                 }
            },
            {
                "targets": [ 0 ],
                "visible": false
            },
            ],
            'select': {
                  'style': 'multi'
               },
            
        });

         ba = $('#ba').DataTable({ 
 
            "processing": true, 
            "serverSide": true,
            "order": [], 
            "ajax": {
                "url": "<?php echo site_url('BeritaAcara/get_forLaporan/semua')?>",
                "type": "POST"
            },
            "columnDefs": [
            { 
                "order": [[1, 'asc']],
                "targets": [ 0 ], 
                "orderable": false,
                'checkboxes': {
                   'selectAll': false,
                   'selectRow': true
                } 
            },
            ],
            "select": {
                'style': 'single'
            },
        });

    });
    function Kelompokkan(){
        table.column( 0 ).visible( true );
        document.getElementById('krm').style.visibility = 'visible';
    }
    
    function pilihBa(){
        rows_selected = table.column(0).checkboxes.selected();
        if (rows_selected[0]==null) {
            swal("Peringatan!", "Tidak ada laporan yang dipilih", "error");
        }else{
            this.getBa();
            $('#myModal').modal('show');
            
            table.column(0).visible( false );
            table.column(0).checkboxes.deselect();
            table.ajax.reload();
            document.getElementById('krm').style.visibility = 'hidden';
            console.log(rows_selected);
            $.each(rows_selected, function(index, rowId){
                id_laporan.push(rowId);
            });
        }
    }

    function getBa(){
        ba.column(0).checkboxes.deselect();
        ba.ajax.reload();
    }

    function inputBa(){
        var id_ba = ba.column(0).checkboxes.selected()[0];
        console.log(id_ba);

        var postForm = { 
            // yg 'nama' itu ntar yg di panggil di model, yg ->input->post()
            'id_ba': id_ba,
            'laporan': id_laporan
            };

        $.ajax({
            type : "POST",
            url  : "<?php echo base_url('Masyarakat/kelompokBa')?>",
            dataType : "JSON",
            data : postForm,
            success: function(data){
                id_laporan = [];
                swal({
                  title: "Berhasil Mengelompokkan BA!",
                  icon: "success",
                  button: "Ok",
                });
                table.ajax.reload();
                console.log(data);
            }
        });
        return false;
    }

</script>
<?php
$this->load->view('template/foot');
?>