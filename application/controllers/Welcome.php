<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function process(){
		//require FCPATH . 'vendor/autoload.php';
		//require __DIR__ . '/vendor/autoload.php';

		  $options = array(
		    'cluster' => 'ap1',
		    'useTLS' => true
		  );
		  $pusher = new Pusher\Pusher(
		    'b432d8d3f3a21996a419',
		    'c2e2decba1c7d0ca3cb4',
		    '490512',
		    $options
		  );

		  $data['message'] = 'hello world';
		  $pusher->trigger('panic_button', 'my-event', $data);
	}

	public function tes()
	{
		
			$pusher = new Pusher\Pusher("e17ba6c5aa281e4caa40", "de4362ba571d091e20dc", "690999", array('cluster' => 'ap1'));
  $pusher->trigger('my-channel', 'my-event', array('message' => 'h'));
		
	}
}
