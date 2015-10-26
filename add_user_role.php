<?php include 'includes/header.php'; ?>

<div class="container-fluide">
<?php if(!isset($_SESSION['company_id'])){	?>	
	<ul class="breadcrumb">
	    <li><a href="#">Home</a></li>
	    <li><a href="view_user_role.php">Roles</a></li>
	    <li><a class="active" href="#" >Add</a></li>
	</ul>

<div class="page-heading">
	<h1>Add Role</h1>
</div>

<div class="form-container">
<?php 

	$user_role = new user_role();

	
	$ID = (isset($_GET['id']))? $_GET['id'] : NULL;
			if (isset($_POST['add_user_role'])) {		
				
				// Update old record
				if (isset($ID)) {
					$results = $user_role->update_user_role($_POST, $ID);
				}else{ // Insert new
					$results = $user_role->insert_user_role($_POST);
				}
				if ($results) {
					echo '<div class="alert alert-success" role="alert">';  echo (isset($_GET['id']))? 'Updated ' : 'Added '; echo  'branch user role Sucessfully </div>';
				}else{
					echo '<div class="alert alert-danger" role="alert"> Error </div>';
				}
			}
			if (isset($ID)) {
				$user_role_result = $user_role->get_user_role($ID);
			}
	
?>

<form class="form-horizontal" action="" method="post">
	<div class="col-sm-6">

		 <div class="form-group">
		    <label for="user_role_name" class="col-sm-4 control-label">Name</label>
		    <div class="col-sm-8">
		      <input type="text" class="form-control" name="user_role_name" id="user_role_name" value="<?php echo (isset($ID))? $user_role_result->user_role_name : '' ?>" placeholder="Name" required>
		    </div>
		 </div>
		 
		

		  <div class="col-sm-offset-3 form-group btn-container ">
			  <input type="submit" name="add_user_role" class="btn btn-primary" value="Save">
			  <input type="reset" class="btn btn-primary" value="Cancel">
			  <button  class="btn btn-primary">Back</button>
		  </div>

	</div>

    <div class="col-sm-3 col-sm-offset-2">
	  	 <div class="form-group">
		    <label for="user_role_status" class="col-sm-3 control-label">Status</label>
		    <div class="col-sm-8">
		      <select class="form-control" id="user_role_status" name="user_role_status"  required>
					<?php foreach($status as $status_key => $status_value){ ?>
						<option value="<?php echo $status_key; ?>" <?php (isset($ID))? $selected_status = $user_role_result->user_role_status : '';if(isset($ID)){if($status_key == $selected_status){echo 'selected=selected';}}?> ><?php echo $status_value; ?></option>
						<?php } ?>
				</select>
		    </div>
		  </div>
	</div>

	 
 </form>

</div><!--form-container-->

<?php } ?>
	</div><!--container-fluide-->


<?php include 'includes/footer.php'; ?>