<?php 
$this->load->view('template/head');
?>
<body>
  <form method="POST">
    <input type="text" id="nama"><br>
    <input type="type" id="pesan"><br>
    
    <button type="button" id="submit" class="btn btn-primary">Submit</button>
    
  </form>
   <?php 
$this->load->view('template/js');
?>

   <script src="<?php echo base_url('node_modules/socket.io/node_modules/socket.io-client/socket.io.js');?>"></script>
   <script src="<?php echo base_url('node_modules/push.js/bin/push.min.js');?>"></script>
   <script src="<?php echo base_url('node_modules/push.js/bin/serviceWorker.min.js');?>"></script>
 <script type="text/javascript">
  $(document).ready(function(){

     $("#submit").click(function(){

        
             var  nama = $("#nama").val();
             var  pesan = $("#pesan").val();
             

                 var socket = io.connect( 'http://'+window.location.hostname+':3000' );

                 socket.emit('message', {
                   nama: nama,
                   pesan: pesan
                 });   
                
     });

   });
 </script>
</body>
</html>