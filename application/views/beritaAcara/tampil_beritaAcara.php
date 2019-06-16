<?php 
$this->load->view('template/head');
?>
<!--tambahkan custom css disini-->

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
<link href="<?php echo base_url('assets/datatables.net-bs/css/buttons.dataTables.min.css') ?>" rel="stylesheet" type="text/css" />
<?php
$this->load->view('template/topbar');
$this->load->view('template/sidebar');
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Berita Acara
        <small>Kebakaran</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Filter</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            <form id="form-filter">
            <div class="form-group">
                <label for="Tahun">Dari Tanggal:</label>
                <input type="date" class="form-control" id="min"  name="min" required>
            </div>

            <div class="form-group">
                <label for="Tahun">Sampai Tanggal:</label>
                <input type="date" class="form-control" id="max"  name="max" required>
            </div>

            <button type="button" id="btn-filter" class="btn btn-primary pull-right">Cari</button>
        </form> 
        <button type="button" id="btn-reset" class="btn btn-default">Reset</button>
        </div><!-- /.box-body -->
    </div><!-- /.box -->


    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Title</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table id="table" class="table table-striped table-bordered table-hover " cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Tanggal</th>
                        <th>Hari</th>
                        <th>Nama Pemilik</th>
                        <th>Detail</th>
                    </tr>
                </thead>

                <tbody>
                </tbody>

                <tfoot>
                    <tr>
                        <th>NO</th>
                        <th>Tanggal</th>
                        <th>Hari</th>
                        <th>Nama Pemilik</th>
                        <th>Detail</th>
                    </tr>
                </tfoot>

            </table>

        </div><!-- /.box-body -->
        <div class="box-footer">
            Footer
        </div><!-- /.box-footer-->
    </div><!-- /.box -->

</section><!-- /.content -->

<?php 
$this->load->view('template/js');
?>
<!--tambahkan custom js disini-->
<script src="<?php echo base_url('assets/datatables.net/js/jquery.dataTables.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/datatables.net-bs/js/dataTables.bootstrap.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/datatables.net-bs/js/dataTables.buttons.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/datatables.net-bs/js/buttons.flash.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/datatables.net-bs/js/jszip.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/datatables.net-bs/js/pdfmake.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/datatables.net-bs/js/vfs_fonts.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/datatables.net-bs/js/buttons.html5.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/datatables.net-bs/js/buttons.print.min.js') ?>" type="text/javascript"></script>

<script type="text/javascript">
    var table;

    $(document).ready(function() {

        var filtering = "<?php echo $filter; ?>";
        var url_ba = "<?php echo site_url('BeritaAcara/get_data_beritaAcara/semua')?>";
        if (filtering=="tahun") {
            var url_ba = "<?php echo site_url('BeritaAcara/get_data_beritaAcara/tahun')?>";
        }else if(filtering=="bulan"){
            var url_ba = "<?php echo site_url('BeritaAcara/get_data_beritaAcara/bulan')?>";
        }else if(filtering=="hari"){
            var url_ba = "<?php echo site_url('BeritaAcara/get_data_beritaAcara/hari')?>";
        }

        
        //datatables
        table = $('#table').DataTable({ 
            "responsive": true,
            "processing": true, 
            "serverSide": true, 
            "order": [],  
            "ajax": {
                "url": url_ba,
                "type": "POST",
                "data": function(data){
                    data.dariTgl = $('#min').val();
                    data.sampaiTgl = $('#max').val();
                }
            },
            "columnDefs": [
            { 
                "targets": [ 0 ], 
                "orderable": false, 
            },
            ],
            "dom": 'Bfrtip',
            "buttons": [
                'copy',
                {
                    "extend": 'excel',
                    "messageTop": "Laporan kebakaran"
                },
                {
                    "extend": 'pdf',
                    "exportOptions": {
                        "columns": [0, 1, 2, 3]
                    },
                    "messageBottom": null
                },
                {
                    "extend": 'print',
                    "exportOptions": {
                        "columns": [0, 1, 2, 3]
                    },
                    " messageTop": "Laporan kebakaran",
                    "messageBottom": null
                }
            ],
        });

        $('#btn-filter').click(function(){ //button filter event click
            table.ajax.reload();  //just reload table
        });

        $('#btn-reset').click(function(){ 
            $('#form-filter')[0].reset();
            table.ajax.reload();  
        });
 
    });
 
</script>
 
<?php
$this->load->view('template/foot');
?>