<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form>
		Nama:<br>
		<input type="text" id="nama"><br>
		Nomor:<br>
		<input type="text" id="nomor"><br>
		Pesan:<br>
		<input type="text" id="pesan"><br>
		<input type="hidden" id="lokasi" value="bdg"><br>
		<button type="button" id="submit" class="btn btn-primary">Submit</button>
	</form>

</body>
<script src="<?php echo base_url('assets/sweetalert/sweetalert.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/jQuery/jQuery-2.1.3.min.js') ?>"></script>
<script src="<?php echo base_url('node_modules/socket.io/node_modules/socket.io-client/socket.io.js');?>"></script>
<script type="text/javascript">
	$(document).ready(function(){
	$("#submit").click(function(){
		var socket = io.connect( 'http://'+window.location.hostname+':3000' );

                 socket.emit('message', {
                   nama: "nama",
                   nomor: "nomor",
                   pesan: "pesan",
                   lokasi: "lokasi"
                 });
        var postForm = { 
            // yg 'nama' itu ntar yg di panggil di model, yg ->input->post()
            'nama'      : $('#nama').val(),
            'nomor'      : $('#nomor').val(),
            'pesan'      : $('#pesan').val(),
            };
           
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('Masyarakat/input')?>",
                dataType : "JSON",
                data : postForm,
                success: function(data){
                    swal("Terkirim", "Sedang di proses", "success");
                }
            });
	});
	});
</script>
</html>