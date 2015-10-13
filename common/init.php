<?php
session_start();

require_once 'config.php';
require_once 'defaults.php';
require_once 'class.database.php';

function print_f($array = array()){
	echo '<pre>';
	print_r($array);
	echo '</pre>';
}

// Custom auto loader
function admin_autoloader($class) {
    include_once ABSPATH.'classes/class.' . $class . '.php';
}
spl_autoload_register('admin_autoloader');

// Check User Authentication
if(!isset($_SESSION['is_logged_in']) && !isset($redirect_login)){
	// header ('Location: login.php');
	
	$hanif = 123;

	echo $hanif;

	echo 'master';
}