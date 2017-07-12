<?php 
session_start(); // This makes $_SESSION available to us

// Prevent cross site request forgeries
if(!isset($_POST['crsf_token']) || $_SESSION['crsf_token'] != $_POST['crsf_token'] ) die('Bad token.');

/* Okay, if they've made it this far then they have passed our security checks */

// User just placed an order
if(isset($_POST['ajax_order'])){
	
	if(!isset($_POST['items']) || empty($_POST['items'])) 
		exit(json_encode(array('success' => false, 'msg' => 'Cart empty.')));
	
	/* Here you would save to database, send notification email, etc*/

	// Start a receipt string
	$receipt = '<div class="text-center well"><h3>Thank you! This Is Your Receipt</h3>';

	foreach($_POST['items'] as $row)
		$receipt .= '1 @ $1 [IMG '.filter_var($row, FILTER_SANITIZE_STRING).']<br />';
	
	$receipt .= '<hr /><p>Grand Total: $'.count($_POST['items']).'</p></div>'; // close element
	
	exit(json_encode(array('success' => true, 'msg' => $receipt)));
}

if(isset($_POST['order'])){
	// Some non-ajax thing would go here
}

die('Invalid request.'); 

// You'll notice this script replies in two ways, plain text and JSON.
// Is that the best way to do it? You'll choose for each project.
