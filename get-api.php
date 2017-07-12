<?php 

// Set up a standard way that the server will reply
function send_reply($success = false, $msg = '', $data = array()){
	$data['success'] = $success;
	if(!empty($msg)) $data['msg'] = $msg;
	
	exit(json_encode($data));
}

if(!isset($_GET['key']) || $_GET['key'] != 'my-api') send_reply(false, 'Unauthorized.');

/* Okay, if they've made it this far then they have passed our security checks */

// User would like to get prices
if(isset($_GET['get_photos'])){
	if(!isset($_GET['industry']) || empty($_GET['industry'])) send_reply(false, 'Missing industry.');
	
	$industry = filter_var($_GET['industry'], FILTER_SANITIZE_STRING);
	
	// Set up a selection of images for each industry
	$images = array(
		'advertising' 	=> array('uCzBVrIbdvQ', '45FJgZMXCK8', '5brvJbR1Pn8'),
		'posters'		=> array('b_8eErngWm4', 'Ovn1hyBge38', 'j0OrqIdjyQw'),
		'webdesign'		=> array('VmCPfSU_84A', '7nsqPSnYCoY', 'B1Zcy2ZV9gQ')
	);
	
	if(!isset($images[$industry])) send_reply(false, 'Invalid industry.');
	
	send_reply(true, false, array('images' => $images[$industry]));
}

send_reply(false, 'Invalid request.');
