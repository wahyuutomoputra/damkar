<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form class="form" action="<?php echo base_url();?>Pusher/process" method="post">
        <input type="text" name="message" value="">
        <button type="submit" name="button">Submit</button>
    </form>

    <div id="message">
    	
    </div>

<script src="https://js.pusher.com/4.3/pusher.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">

	$('.form').submit(function(e){
				e.preventDefault();

				$.ajax({
					url: $(this).attr('action'),
					type: 'post',
					data: new FormData($(this)[0]),
					contentType: false,
					processData: false,
					success: function(data){

					}
				})
			})
	// $('.form').submit(function(e){
	// 	e.preventDefault();

	// 	$.ajax({
	// 		url: $(this).attr('action'),
	// 		type: 'post',
	// 		data: new FormData($(this)[0]),
	// 		contentType: false,
	// 		processData: false,
	// 		success: function(data){
				

	// 		}

	// 	})
	// })


	// Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('b432d8d3f3a21996a419', {
      cluster: 'ap1',
      forceTLS: true
    });

    var channel = pusher.subscribe('panic_button');
    channel.bind('my-event', function(data) {
    	$('#message').append('<div>'+data.message+'</div>');
      //$('#message').append('<div>'+data.message+'</div>');
    });
</script>
</body>
</html>