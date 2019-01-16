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
        Blank page
        <small>it all starts here</small>
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
            <?php echo form_open('Pegawai/update_profile'); ?>
            <form role="form">
                <div class="form-group">
                  <label for="selesaiPemadaman">Nama:</label>
                  <input type="text" class="form-control" id="Nama"  name="Nama" value="<?php echo $pegawai['nama']; ?>" disabled>
                </div>

                <div class="form-group">
                  <label for="selesaiPemadaman">Email:</label>
                  <input type="text" class="form-control" id="Email"  name="Email" value="<?php echo $pegawai['email']; ?>" disabled>
                </div>

                <div class="form-group">
                  <label for="selesaiPemadaman">Alamat:</label>
                  <input type="text" class="form-control" id="Alamat"  name="Alamat" value="<?php echo $pegawai['alamat']; ?>" disabled>
                </div>

                <button type="submit" id="update" class="btn btn-info pull-right">Update</button>
            </form>
            <?php echo form_close(); ?>
            <button type="submit" id="Edit" class="btn btn-default" onclick="aksi()">Edit</button>
            <button type="submit" id="Cancel" class="btn btn-default" onclick="aksi2()">Cancel</button>
            <br><br>
            <a data-toggle="modal" href="#ModalaAdd">Ubah Password</a><br>
        </div><!-- /.box-body -->
        <div class="box-footer">
            Footer
        </div><!-- /.box-footer-->
    </div><!-- /.box -->

</section><!-- /.content -->

    <div class="modal fade" id="ModalaAdd" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Masukkan Nip</h4>
            </div>
            <form class="form-horizontal" name="postForm">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Password Lama</label>
                        <div class="col-xs-9">
                            <input name="pl" id="pl" class="form-control" type="text"  style="width:335px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Password Baru</label>
                        <div class="col-xs-9">
                            <input name="pb" id="pb" class="form-control" type="text"  style="width:335px;" required>
                        </div>
                    </div>    
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info" id="btn_simpan">Kirim</button>
                </div>
            </form>
            </div>
            </div>
    </div>

<?php 
$this->load->view('template/js');
?>
<!--tambahkan custom js disini-->
<script src="<?php echo base_url('assets/sweetalert/sweetalert.min.js') ?>" type="text/javascript"></script>
<script type="text/javascript">

    document.getElementById('update').style.visibility = 'hidden';
    
    function aksi(){
        document.getElementById('update').style.visibility = 'visible';

        document.getElementById("Nama").disabled = false;
        document.getElementById("Email").disabled = false;
        document.getElementById("Alamat").disabled = false;
    }

    function aksi2(){
        document.getElementById('update').style.visibility = 'hidden';

        document.getElementById("Nama").disabled = true;
        document.getElementById("Email").disabled = true;
        document.getElementById("Alamat").disabled = true;
    }

    $('#btn_simpan').on('click',function(){
                    var postForm = { 
                    // yg 'nama' itu ntar yg di panggil di model, yg ->input->post()
                    'pl'      : $('#pl').val(),
                    'pb'      : $('#pb').val(),
                    };
                   
                    $.ajax({
                        type : "POST",
                        url  : "<?php echo base_url('Pegawai/ubah_password')?>",
                        dataType : "JSON",
                        data : postForm,
                        success: function(data){
                            console.log(data);
                            if (data == true) {
                                $('[name="pl"]').val("");
                                $('[name="pb"]').val("");
                                $('#ModalaAdd').modal('hide');
                                swal("Selamat", "Password berhasil dirubah", "success");
                                setTimeout(function() {logout(); }, 5000);
                            }else{
                                $('[name="pl"]').val("");
                                $('[name="pb"]').val("");
                                $('#ModalaAdd').modal('hide');
                                swal("Maaf", "Password lama anda salah", "error");
                            }   
                        }
                    });
                    return false;
                });
    function logout(){
        window.location = "<?php echo base_url('Auth/logout')?>";
    }
</script>
<?php
$this->load->view('template/foot');
?>