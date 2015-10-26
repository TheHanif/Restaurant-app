<?php include 'includes/header.php'; ?>

<div class="container-fluide">
<?php if(!isset($_SESSION['company_id'])){	?>	
	<ul class="breadcrumb">
	    <li><a href="#">Home</a></li>
	    <li><a href="view_user.php">Users</a></li>
	    <li><a class="active" href="#" >Add</a></li>
	</ul>

<div class="page-heading">
	<h1>Add Users</h1>
</div>

<div class="form-container">
<?php 

	
	$user_role = new user_role();
	$all_user_role = $user_role->get_user_role();

	$user = new user();

	
	$ID = (isset($_GET['id']))? $_GET['id'] : NULL;
			if (isset($_POST['add_user'])) {		
				
				// Update old record
				if (isset($ID)) {
					$results = $user->update_user($_POST, $ID);
				}else{ // Insert new
					$results = $user->insert_user($_POST);
				}
				if ($results) {
					echo '<div class="alert alert-success" role="alert">';  echo (isset($_GET['id']))? 'Updated ' : 'Added '; echo  'user Sucessfully </div>';
				}else{
					echo '<div class="alert alert-danger" role="alert"> Error </div>';
				}
			}
			if (isset($ID)) {
				$user_result = $user->get_user($ID);
				//print_f($user_result);
			}
	
?>

<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
	<div class="col-sm-6">

		
		 <div class="form-group">
		    <label for="user_first_name" class="col-sm-4 control-label">First Name</label>
		    <div class="col-sm-8">
		      <input type="text" class="form-control" name="user_first_name" id="user_first_name" value="<?php echo (isset($ID))? $user_result->user_first_name : '' ?>" placeholder="First Name" required>
		    </div>
		 </div>

		  <div class="form-group">
		    <label for="user_last_name" class="col-sm-4 control-label">Last Name</label>
		    <div class="col-sm-8">
		      <input type="text" class="form-control" name="user_last_name" id="user_last_name" value="<?php echo (isset($ID))? $user_result->user_last_name : '' ?>" placeholder="Last Name" required>
		    </div>
		 </div>

		 <div class="form-group">
		    <label for="user_display_name" class="col-sm-4 control-label">Display name</label>
		    <div class="col-sm-8">
		      <input type="text" class="form-control" name="user_display_name" id="user_display_name" value="<?php echo (isset($ID))? $user_result->user_display_name : '' ?>" placeholder="Display Name" required>
		    </div>
		 </div>

		 <div class="form-group">
		    <label for="user_email" class="col-sm-4 control-label">Email</label>
		    <div class="col-sm-8">
		      <input type="text" class="form-control" name="user_email" id="user_email" value="<?php echo (isset($ID))? $user_result->user_email : '' ?>" placeholder="Email" required>
		    </div>
		 </div>

		 <div class="form-group">
		    <label for="user_login" class="col-sm-4 control-label">User Login</label>
		    <div class="col-sm-8">
		      <input type="text" class="form-control" name="user_login" id="user_login" value="<?php echo (isset($ID))? $user_result->user_login : '' ?>" placeholder="Login name" required>
		    </div>
		 </div>

		 <div class="form-group">
		    <label for="user_login" class="col-sm-4 control-label">Password</label>
		    <div class="col-sm-8">
		      <input type="password" class="form-control" name="user_password" id="user_password" value="<?php echo (isset($ID))? $user_result->user_password : '' ?>" placeholder="Password" required>
		    </div>
		 </div>

		<div class="form-group">
		    <label for="branch_user_address" class="col-sm-4 control-label">Permissions/Role</label>
		    <div class="col-sm-8">
		      <?php 

		      	

				foreach($all_user_role as $value){

					if(isset($ID)){

					$user_capabilities = $user_result->user_role;
					$user_capabilities = (!empty($user_capabilities))? json_decode($user_capabilities) : array();
					} 
					?>
						
					<div class="checkbox">
					    <label>
					      <input type="checkbox" name="user_role[]" <?php echo ((isset($ID)) && (!empty($user_capabilities)) && (in_array($value->user_role_id, $user_capabilities)))? 'checked' : ''; ?>  value="<?php echo $value->user_role_id; ?>"><?php echo $value->user_role_name; ?>
					    </label>
					  </div>

					<?php
					}
				?>
		    </div>
		  </div>



		  <div class="col-sm-offset-3 form-group btn-container ">
			  <input type="submit" name="add_user" class="btn btn-primary" value="Save">
			  <input type="reset" class="btn btn-primary" value="Cancel">
			  <button  class="btn btn-primary">Back</button>
		  </div>

	</div>

     <div class="col-sm-5 col-sm-offset-1">

     <div class="col-md-8 col-sm-8">
	  	 <div class="form-group">
		    <label for="user_status" class="col-sm-3 control-label">Status</label>
		    <div class="col-sm-8">
		      <select class="form-control" id="user_status" name="user_status"  required>
					<?php foreach($status as $status_key => $status_value){ ?>
						<option value="<?php echo $status_key; ?>" <?php (isset($ID))? $selected_status = $user_result->user_status : '';if(isset($ID)){if($status_key == $selected_status){echo 'selected=selected';}}?> ><?php echo $status_value; ?></option>
						<?php } ?>
				</select>
		    </div>
		  </div>
	</div>

	<div class="col-md-12 col-sm-12">
		  <?php 
	        if(isset($ID)){
	         if($user_result->user_img){ ?>
	          <div class="profilePic">
	           <span>
	            <?php echo '<img src="assets/images/uploads/'.$user_result->user_img.'" style="width:auto;" class="img-responsive" alt="">'; ?>
	            <a id="removeProfilePic"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
	           </span>
	           <input type="hidden" name="user_img1" value="<?php echo $user_result->user_img; ?>">
	          </div>

	          <div class="form-group" id="showNewPicSubmit" style="display:none;">
				<label for="user_img" class="col-sm-2 control-label">Image: </label>
				<div class="col-sm-10">
					 <input type="file" name="user_img" class="form-control" style="width:100%;height: 33px;" >
				</div>
			 </div>
			<?php
	         }
	         else { ?>
	          <div class="form-group">
				<label for="user_img" class="col-sm-2 control-label">Image: </label>
				<div class="col-sm-10">
					 <input type="hidden" class="form-control" name="user_img" id="photo" readonly>
					 <input type="file" name="user_img" class="form-control" style="width:100%;height: 33px;" >
				</div>
			 </div>
	         <?php
	         }
	        } else { ?>
	         <div class="form-group">
				<label for="user_img" class="col-sm-2 control-label">Image: </label>
				<div class="col-sm-10">
					 <input type="hidden" class="form-control" name="user_img" id="photo" readonly>
					 <input type="file" name="user_img" class="form-control" style="width:100%;height: 33px;" >
				</div>
			 </div>
	        <?php
	        }
	        ?>
	</div><!--col-md-12-->

	</div><!--col-sm-6-->

	 
 </form>

</div><!--form-container-->

<?php } ?>
	</div><!--container-fluide-->


<?php include 'includes/footer.php'; ?>