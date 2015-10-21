<?php 
$redirect_login = false;
require_once 'common/init.php';

$user = new user();

if (isset($_GET['logout']) && $_GET['logout'] == 'true') {
	 $user->session_destroy();
}

if (isset($_POST['username']) && isset($_POST['password'])) {
	
	if (!$user->do_login($_POST['username'], $_POST['password'])) {
		$message = array('danger', 'Inalid username or password. Please try again');
	}
}

if ($user->is_logged_in()) {
	header('Location: index.php');
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
</head>
<body>
	
	<div class="container">
			
		<form action="login.php" method="POST" role="form">
			<legend>Login</legend>
		
			<div class="form-group">
				<label for="">Username</label>
				<input type="text" class="form-control" name="username">
			</div>

			<div class="form-group">
				<label for="">Password</label>
				<input type="password" class="form-control" name="password">
			</div>
		
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>

		<?php if (isset($message)) {
			create_message($message);
		} ?>

	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</body>
</html>