<?php 
$this->load->view('template/head');
?>
<!--tambahkan custom css disini-->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
<?php
$this->load->view('template/topbar');
$this->load->view('template/sidebar');
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Petugas Damkar
        <small>Soreang</small>
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
        <?php if($_SESSION['status']=='admin'){?>
        <div class="pull-right"><a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#ModalaAdd"><span class="fa fa-plus"></span> Tambah Pegawai</a></div>
        <?php } ?>
        <table class="table table-striped" id="mydata">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Alamat</th>
                    <?php if($_SESSION['status']=='admin'){?>
                    <th style="text-align: right;">Aksi</th>
                    <?php } ?>
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

<!-- MODAL ADD -->
<div class="modal fade" id="ModalaAdd" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Tambah Pegawai</h3>
            </div>
            <form class="form-horizontal" name="postForm">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-xs-3" >NIP</label>
                        <div class="col-xs-9">
                            <input name="nip" id="nip" class="form-control" type="text" placeholder="NIP" style="width:335px;" required>
                        </div>
                    </div>
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama</label>
                        <div class="col-xs-9">
                            <input name="nama" id="nama" class="form-control" type="text" placeholder="Nama" style="width:335px;" required>
                        </div>
                    </div>
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Email</label>
                        <div class="col-xs-9">
                            <input name="email" id="email" class="form-control" type="text" placeholder="Email" style="width:335px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Status</label>
                        <div class="col-xs-9">
                            <select name="status" id="status" class="form-control" style="width:335px;">
                                <option value="kadis">Kepala Dinas</option>
                                <option value="petugas">Petugas</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Alamat</label>
                        <div class="col-xs-9">
                        <textarea name="alamat" id="alamat" class="form-control" style="width:335px;" cols="30" rows="10"></textarea>
                        </div>
                    </div>
 
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info" id="btn_simpan">Simpan</button>
                </div>
            </form>
            </div>
            </div>
    </div>
    <!--END MODAL ADD-->

    <!--MODAL HAPUS-->
    <div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                        <h4 class="modal-title" id="myModalLabel">Hapus Data Pegawai</h4>
                    </div>
                    <form class="form-horizontal">
                    <div class="modal-body">
                                           
                            <input type="hidden" name="kode" id="textkode" value="">
                            <div class="alert alert-warning"><p>Apakah Anda yakin mau menghapus data ini?</p></div>
                                         
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                        <button class="btn_hapus btn btn-danger" id="btn_hapus">Hapus</button>
                    </div>
                    </form>
                </div>
            </div>
    </div>
    <!--END MODAL HAPUS-->
    <div class="modal fade" id="ModalaEdit" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Edit Pegawai</h3>
            </div>
            <form class="form-horizontal">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-xs-3" >NIP</label>
                        <div class="col-xs-9">
                            <input name="nip_edit" id="nip2" class="form-control" type="text" placeholder="NIP" style="width:335px;" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama</label>
                        <div class="col-xs-9">
                            <input name="nama_edit" id="nama2" class="form-control" type="text" placeholder="Nama" style="width:335px;" required>
                        </div>
                    </div>
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Email</label>
                        <div class="col-xs-9">
                            <input name="email_edit" id="email2" class="form-control" type="text" placeholder="Email" style="width:335px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Status</label>
                        <div class="col-xs-9">
                            <select name="status_edit" id="status2" class="form-control" style="width:335px;">
                                <option value="kadis">Kepala Dinas</option>
                                <option value="petugas">Petugas</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Alamat</label>
                        <div class="col-xs-9">
                        <textarea name="alamat_edit" id="alamat2" class="form-control" style="width:335px;" cols="30" rows="10"></textarea>
                        </div>
                    </div>
 
                </div>
 
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info" id="btn_update">Update</button>
                </div>
            </form>
            </div>
            </div>
        </div>
        <!--END MODAL EDIT-->

<?php 
$this->load->view('template/js');
?>
<!--tambahkan custom js disini-->
<script src="<?php echo base_url('assets/datatables.net/js/jquery.dataTables.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/datatables.net-bs/js/dataTables.bootstrap.min.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function(){
        tampil_data();
        function tampil_data(){
            $.ajax({
                type  : 'ajax',
                url   : '<?php echo base_url()?>Pegawai/get_data',
                async : false,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                                '<td>'+data[i].nama+'</td>'+
                                '<td>'+data[i].email+'</td>'+
                                '<td>'+data[i].status+'</td>'+
                                '<td>'+data[i].alamat+'</td>'+
                                <?php if($_SESSION['status']=='admin'){?>
                                '<td style="text-align:right;">'+
                                    '<a href="javascript:;" class="btn btn-info btn-xs item_edit" data="'+data[i].nip+'">Edit</a>'+' '+
                                    '<a href="javascript:;" class="btn btn-danger btn-xs item_hapus" data="'+data[i].nip+'">Hapus</a>'+
                                '</td>'+
                                <?php } ?>
                                '</tr>';
                    }
                    $('#show_data').html(html);
                }
 
            });
        }

        //GET HAPUS
        $('#show_data').on('click','.item_hapus',function(){
            var id=$(this).attr('data');
            $('#ModalHapus').modal('show');
            $('[name="kode"]').val(id);
        });
 
 
        //Simpan Data
        $('#btn_simpan').on('click',function(){
            var postForm = { 
            // yg 'nama' itu ntar yg di panggil di model, yg ->input->post()
            'nip'      : $('#nip').val(),
            'nama'     : $('#nama').val(),
            'email'    : $('#email').val(),
            'status'   : $('#status').val(),
            'alamat'   : $('#alamat').val(),
            };
           
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('Pegawai/input')?>",
                dataType : "JSON",
                data : postForm,
                success: function(data){
                    $('[name="nip"]').val("");
                    $('[name="nama"]').val("");
                    $('[name="email"]').val("");
                    $('[name="status"]').val("");
                    $('[name="alamat"]').val("");
                    $('#ModalaAdd').modal('hide');
                    tampil_data();
                }
            });
            return false;
        });

        //GET UPDATE
        $('#show_data').on('click','.item_edit',function(){
            var id=$(this).attr('data');
            $.ajax({
                type : "GET",
                url  : "<?php echo base_url('Pegawai/get_pegawai')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    $.each(data,function(pegawai_nip, pegawai_nama,pegawai_email,pegawai_status,pegawai_alamat){
                        $('#ModalaEdit').modal('show');
                        $('[name="nip_edit"]').val(data.pegawai_nip);
                        $('[name="nama_edit"]').val(data.pegawai_nama);
                        $('[name="email_edit"]').val(data.pegawai_email);
                        $('[name="status_edit"]').val(data.pegawai_status);
                        $('[name="alamat_edit"]').val(data.pegawai_alamat);
                    });
                }
            });
            return false;
        });

        $('#btn_update').on('click',function(){
            var nip=$('#nip2').val();
            var nama=$('#nama2').val();
            var email=$('#email2').val();
            var status=$('#status2').val();
            var alamat=$('#alamat2').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('Pegawai/update_pegawai')?>",
                dataType : "JSON",
                data : {nip:nip , nama:nama, email:email, status:status, alamat:alamat},
                success: function(data){
                    $('[name="nip_edit"]').val("");
                    $('[name="nama_edit"]').val("");
                    $('[name="email_edit"]').val("");
                    $('[name="status_edit"]').val("");
                    $('[name="alamat_edit"]').val("");
                    $('#ModalaEdit').modal('hide');
                    tampil_data();
                }
            });
            return false;
        });

        //Hapus Data
        $('#btn_hapus').on('click',function(){
            var id=$('#textkode').val();
            $.ajax({
            type : "POST",
            url  : "<?php echo base_url('Pegawai/hapus')?>",
            dataType : "JSON",
                    data : {id_pegawai: id},
                    success: function(data){
                            $('#ModalHapus').modal('hide');
                            tampil_data();
                    }
                });
                return false;
            });
    }); 
</script>
<?php
$this->load->view('template/foot');
?>