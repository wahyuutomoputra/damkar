var socket  = require( 'socket.io' );
var express = require('express');
var app     = express();
var server  = require('http').createServer(app);
var io      = socket.listen( server );
var port    = process.env.PORT || 3000;

server.listen(port, function () {
  console.log('Server listening at port %d', port);
});

io.on('connection', function (socket) {

	socket.on( 'message', function( data ) {
	    io.sockets.emit( 'message', {
	    	nama: data.nama,
	    	nomor: data.nomor,
	    	pesan: data.pesan,
	    	lokasi: data.lokasi
	    });
	  });

	// socket.on( 'notif', function( data ) {
	//     io.sockets.emit( 'notif', {
	//     	statusNotif: data.statusNotif,
	    	
	//     });
	//   });

});
