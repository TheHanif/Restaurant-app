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
	header ('Location: login.php');
}

function create_message($message){
	if (count($message) <= 0) {
		return;
	}
	?>

	<div class="alert alert-<?php echo $message[0]; ?>">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<?php echo $message[1]; ?>
	</div>
	<?php
}