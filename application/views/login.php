<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Damkar | Soreang</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.2 -->
        <link href="<?php echo base_url('assets/AdminLTE-2.0.5/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- Font Awesome Icons -->
        <link href="<?php echo base_url('assets/font-awesome-4.3.0/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url('assets/AdminLTE-2.0.5/dist/css/AdminLTE.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- iCheck -->
        <link href="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/iCheck/square/blue.css') ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/loading/loading.css') ?>" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="#"><b>Damkar</b>Soreang</a>
            </div><!-- /.login-logo -->
            <div class="login-box-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <form action="<?php echo site_url('Auth/validasi') ?>" method="post">
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" name="nip" placeholder="NIP"/>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" name="password" placeholder="Password"/>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-8">    
                            <!-- <div class="checkbox icheck">
                                <label>
                                    <input type="checkbox"> Remember Me
                                </label>
                            </div>   -->                      
                        </div><!-- /.col -->
                        <div class="col-xs-4">
                            <input type="submit" value="submit" class="btn btn-primary btn-block btn-flat"></button>
                        </div><!-- /.col -->
                    </div>
                </form>

                

                <a data-toggle="modal" href="#ModalaAdd">Lupa Password</a><br>
              

            </div><!-- /.login-box-body -->
        </div><!-- /.login-box -->

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
                        <label class="control-label col-xs-3" >NIP</label>
                        <div class="col-xs-9">
                            <input name="nip" id="nip" class="form-control" type="text" placeholder="NIP" style="width:335px;" required>
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

        <!-- jQuery 2.1.3 -->
        <script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/jQuery/jQuery-2.1.3.min.js') ?>"></script>
        <!-- Bootstrap 3.3.2 JS -->
        <script src="<?php echo base_url('assets/AdminLTE-2.0.5/bootstrap/js/bootstrap.min.js') ?>" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/iCheck/icheck.min.js') ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/sweetalert/sweetalert.min.js') ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/loading/loading.js') ?>" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                    $('#btn_simpan').on('click',function(){
                    $('#ModalaAdd').loading({
                        message: 'Loading...'
                    });
                    var postForm = { 
                    // yg 'nama' itu ntar yg di panggil di model, yg ->input->post()
                    'nip'      : $('#nip').val(),
                    };
                   
                    $.ajax({
                        type : "POST",
                        url  : "<?php echo base_url('Auth/reset_password')?>",
                        dataType : "JSON",
                        data : postForm,
                        success: function(data){
                            $('[name="nip"]').val("");
                            $('#ModalaAdd').loading('stop');
                            $('#ModalaAdd').modal('hide');
                            swal("Password berhasil dirubah", "Silakan periksa email anda", "success");
                        }
                    });
                    return false;
                });
            }); 
        </script>
       <!--  <script>
            $(function () {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue',
                    increaseArea: '20%' // optional
                });
            });
        </script> -->
    </body>
</html>