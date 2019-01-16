<?php 
$this->load->view('template/head');
?>
<!--tambahkan custom css disini-->
<?php
$this->load->view('template/topbar');
$this->load->view('template/sidebar');
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Laporan Kebakaran
        <small>Belum Dibaca</small>
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
            <table class="table table-striped" id="mydata">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Nomor</th>
                    <th>Pesan</th>
                    <th>Lokasi</th>
                    <th style="text-align: right;">Detail</th>
                </tr>
            </thead>
            <tbody id="show_data">
                 
            </tbody>
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
<script type="text/javascript">
    $(document).ready(function(){
        tampil_data();
        function tampil_data(){
            $.ajax({
                type  : 'ajax',
                url   : '<?php echo base_url()?>Masyarakat/view_data',
                async : false,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                                '<td>'+data[i].nama+'</td>'+
                                '<td>'+data[i].nomor+'</td>'+
                                '<td>'+data[i].pesan+'</td>'+
                                '<td>'+data[i].lokasi+'</td>'+
                                '<td style="text-align:right;">'+
                                '<a href="<?php echo base_url('Masyarakat/detail_laporan')?>/'+data[i].id+'" class="btn btn-danger btn-xs item_hapus" >Detail</a>'+
                                '</td>'+
                                '</tr>';
                    }
                    $('#show_data').html(html);
                }
 
            });
        }
    });
</script>
<?php
$this->load->view('template/foot');
?>