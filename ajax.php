<?php 
ob_start();
require_once 'common/init.php';

$company = new company();
$package = new package();
$branch = new branch();
$header = new header();


// Get Single company Detail and create its session
if(isset($_POST['action']) && $_POST['action'] == 'get_company_detail'){
	$comapny_id		= $_POST['seleted_company'];
	header('Content-Type: application/json');
	echo json_encode($header->create_company_session($comapny_id));
}


// Set super admin session 
if(isset($_POST['action']) && $_POST['action'] == 'set_admin_session'){
	
	header('Content-Type: application/json');
	echo json_encode($header->create_admin_session());
}


?>