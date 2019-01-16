</div><!-- /.content-wrapper -->

<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2018 <a href="#">Wahyu</a>.</strong> All rights reserved.
</footer>
</div><!-- ./wrapper -->

<!-- jQuery 2.1.3 -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/jQuery/jQuery-2.1.3.min.js') ?>"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/bootstrap/js/bootstrap.min.js') ?>" type="text/javascript"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/slimScroll/jquery.slimscroll.min.js') ?>" type="text/javascript"></script>
<!-- FastClick -->
<script src='<?php echo base_url('assets/AdminLTE-2.0.5/plugins/fastclick/fastclick.min.js') ?>'></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/dist/js/app.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('node_modules/push.js/bin/push.min.js');?>"></script>
<script src="<?php echo base_url('node_modules/push.js/bin/serviceWorker.min.js');?>"></script>
<script src="https://js.pusher.com/4.3/pusher.min.js"></script>
<audio autoplay >
	<source src="<?php echo base_url('sound/silence.ogg'); ?>" type="audio/ogg">
	<source src="<?php echo base_url('sound/silence.mp3'); ?>" type="audio/mp3">
</audio>
<audio id="notif" >
	<source src="<?php echo base_url('sound/notify.ogg'); ?>" type="audio/ogg">
	<source src="<?php echo base_url('sound/notify.mp3'); ?>" type="audio/mp3">
</audio>
<!-- <iframe allow="autoplay" src="<?php echo base_url('sound/silence.ogg'); ?>" id="iframeAudio">
</iframe> -->
<script type="text/javascript">
	Pusher.logToConsole = true;

    var pusher = new Pusher('e17ba6c5aa281e4caa40', {
      cluster: 'ap1',
      forceTLS: true
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
    	$('#notif')[0].play();
    	Push.create("Kebakaran",{
    		body: data.message
    	});
    });
	// socket.on( 'message', function( data ) {
 //    	$('#notif')[0].play();
 //    	//audio.play();
	// 	Push.create("Kebakaran",{
	//                   body: data.lokasi
	//                  });
	// });
 </script>
