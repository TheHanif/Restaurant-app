<?php require_once 'common/init.php'; 

	$company = new company();
	$all_company = $company->get_companies();

	$user = new user();

?>
<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">

	<!-- CODYHOUSE MENU -->
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="assets/codyhouse-menu/css/style.css"> <!-- Resource style -->
	<script src="assets/codyhouse-menu/js/modernizr.js"></script> <!-- Modernizr -->
	<link rel="stylesheet" href="assets/css/jquery.dataTables.min.css"></style>
	
	<link rel="stylesheet" href="assets/css/main-styles.css">
	<script src="//code.jquery.com/jquery.js"></script>

</head>
<body>

<div id="main-wrapper">

<header class="cd-main-header">
	<a href="#0" class="cd-logo"><img src="assets/images/logo.png" alt="Logo"></a>

	<!-- <div class="cd-search is-hidden">
		<form action="#0">
			<input type="search" placeholder="Search...">
		</form>
	</div> --> <!-- cd-search -->

	<div class="cd-welcome">
		<i class="fa fa-ellipsis-v"></i><strong>Welcome</strong>
		<?php 

		if(isset($_SESSION['company_id'])){
			$company_details = $company->get_companies($_SESSION['company_id']);
			echo '<p class="company_name"><strong> '.$company_details->company_name.'</strong></p>';
		}else{
				if(isset($_SESSION['logged_id_data'])){
					if(isset($_SESSION['super_admin'])){
					echo '<p class="company_name"><strong> '.$_SESSION["logged_id_data"]->user_display_name.'</strong></p>';
				 }
				}
			}?>

	</div><!-- cd-welcome -->

	<a href="#0" class="cd-nav-trigger"><span></span></a>

	<nav class="cd-nav">
		<ul class="cd-top-nav">

			<li><a href="" id="admin_selected">Switch Admin</a></li>

			<li class="has-children account ">
				<a href="#0">
					Switch Company
				</a>

				<ul class="company_selection">
					<?php foreach ($all_company as $value){ ?>
						<li><a href="" class="selected_company" id="<?php echo $value->company_id; ?>"><?php echo $value->company_name; ?></a></li>
					<?php } ?>
				</ul>
			</li>

			<li class="has-children account dropdown dropdown-toggle" data-toggle="dropdown2">
				<a href="#0">
					<img src="assets/codyhouse-menu/img/cd-avatar.png" alt="avatar">
					Account
				</a>

				<ul class="">

					<li><a href="#0">My Account</a></li>
					<li><a href="#0">Edit Account</a></li>
					<li><a href="login.php?logout=true">Logout</a></li>
				</ul>
			</li>
		</ul>
	</nav>
</header> <!-- .cd-main-header -->

<main class="cd-main-content">
	<nav class="cd-side-nav">
		<ul>
		<?php if(!isset($_SESSION['company_id'])){?>
			<li class="has-children active">
				<a href="#0"><i class="fa fa-th"></i> Packages</a>
				
				<ul>
					<li><a href="view_package.php">View Packages</a></li>
					<li><a href="add_package.php">Add Package</a></li>
					
				</ul>
			</li>

			
			<li class="has-children active">
				<a href="#0"><i class="fa fa-th"></i> Companies</a>
				
				<ul>
					<li><a href="view_company.php">View Companies</a></li>
					<li><a href="add_company.php">Add Company</a></li>
					
				</ul>
			</li>
			<?php } ?>

			<?php if(isset($_SESSION['company_id'])){?>
			<li class="has-children active">
				<a href="#0"><i class="fa fa-th"></i> Branches</a>
				
				<ul>
					<li><a href="view_branch.php">View Branches</a></li>
					<li><a href="add_branch.php">Add Branch</a></li>
					
				</ul>
			</li>

			<li class="has-children active">
				<a href="#0"><i class="fa fa-th"></i> Staffs</a>
				
				<ul>
					<li><a href="view_branch_user.php">View Staffs</a></li>
					<li><a href="add_branch_user.php">Add Staff</a></li>
					
				</ul>
			</li>

			<li class="has-children active">
				<a href="#0"><i class="fa fa-th"></i> Menu</a>
				
				<ul>
					<li><a href="view_branch_category.php">Categories</a></li>
					<li><a href="add_branch_user.php">Add Staff</a></li>
					
				</ul>
			</li>


			<?php } ?>
			<li class="has-children ">
				<a href="#0"><i class="fa fa-th"></i> test</a>
				
				<ul>
					<li><a href="#0">test</a></li>
					<li><a href="#0">test</a></li>
					<li><a href="#0">test</a></li>
				</ul>
			</li>

			<li class="has-children">
				<a href="#0"><i class="fa fa-th"></i> Special Offers</a>
				
				<ul>
					<li><a href="#0">All test</a></li>
					<li><a href="#0">Edit test</a></li>
					<li><a href="#0">Delete test</a></li>
				</ul>
			</li>
		</ul>
	</nav>

	<div class="content-wrapper">
	<?php require_once 'short_scripts/header_script.php'; ?>