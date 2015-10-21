<?php include 'includes/header.php'; ?>

<div class="container-fluide">
<?php if(isset($_SESSION['company_id'])){	?>	
	<ul class="breadcrumb">
	    <li><a href="#">Home</a></li>
	    <li><a href="view_branch_user.php">Branch Users</a></li>
	    <li><a class="active" href="#" >Add</a></li>
	</ul>

<div class="page-heading">
	<h1>Add Branch Users</h1>
</div>

<div class="form-container">
<?php 

	$branch = new branch();
	$all_branch = $branch->get_branches();

	$branch_user = new branch_user();

	
	$ID = (isset($_GET['id']))? $_GET['id'] : NULL;
			if (isset($_POST['add_branch_user'])) {		
				
				// Update old record
				if (isset($ID)) {
					$results = $branch_user->update_branch_user($_POST, $ID);
				}else{ // Insert new
					$results = $branch_user->insert_branch_user($_POST);
				}
				if ($results) {
					echo '<div class="alert alert-success" role="alert">';  echo (isset($_GET['id']))? 'Updated ' : 'Added '; echo  'branch user Sucessfully </div>';
				}else{
					echo '<div class="alert alert-danger" role="alert"> Error </div>';
				}
			}
			if (isset($ID)) {
				$branch_user_result = $branch_user->get_branch_user($ID);
			}
	
?>

<form class="form-horizontal" action="" method="post">
	<div class="col-sm-6">

		
		 <input type="hidden" class="form-control" name="branch_user_company_id" id="branch_user_company_id" value="<?php echo (isset($ID))? $branch_user_result->branch_user_company_id : $_SESSION["company_id"] ?>" placeholder="Name" required>
		 

		 <div class="form-group">
		    <label for="branch_user_branch_id" class="col-sm-4 control-label">Select Branch</label>
		    <div class="col-sm-8">
		      	<select class="form-control" name="branch_user_branch_id" required>
					<option value="" selected disabled>Select</option>
					<?php foreach ($all_branch as $value){ ?>
					<?php if($value->branch_company_id == $_SESSION['company_id']){?>
						<option value="<?php echo $value->branch_id; ?>" <?php (isset($ID))? $branch_name = $branch_user_result->branch_user_branch_id : ''; if(isset($ID)){if($value->branch_id == $branch_name){echo 'selected=selected';}}?>><?php echo $value->branch_name; ?></option>
					<?php } }?>
				</select>
		 	</div>
		 </div>

		 <div class="form-group">
		    <label for="branch_user_name" class="col-sm-4 control-label">Name</label>
		    <div class="col-sm-8">
		      <input type="text" class="form-control" name="branch_user_name" id="branch_user_name" value="<?php echo (isset($ID))? $branch_user_result->branch_user_name : '' ?>" placeholder="Name" required>
		    </div>
		 </div>
		 
		<div class="form-group">
		    <label for="branch_user_email" class="col-sm-4 control-label">Email</label>
		    <div class="col-sm-8">
		      <input type="email" class="form-control" name="branch_user_email" id="branch_user_email" value="<?php echo (isset($ID))? $branch_user_result->branch_user_email : '' ?>" placeholder="Location">
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="branch_user_phone" class="col-sm-4 control-label">Phone</label>
		    <div class="col-sm-8">
		      <input type="number" min="0" class="form-control" name="branch_user_phone" id="branch_user_phone" value="<?php echo (isset($ID))? $branch_user_result->branch_user_phone : '' ?>" placeholder="Location">
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="branch_user_address" class="col-sm-4 control-label">Address</label>
		    <div class="col-sm-8">
		      <textarea class="form-control" id="branch_user_address" name="branch_user_address" placeholder="Details"><?php echo (isset($ID))? $branch_user_result->branch_user_address : '' ?></textarea>
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="branch_user_address" class="col-sm-4 control-label">Permissions/Role</label>
		    <div class="col-sm-8">
		      <?php 
				foreach($branch_user_capabilities as $capability=>$value){
					?>
						<?php
						if(isset($ID)){
							$user_capabilities = $branch_user_result->branch_user_capabilities;
							$user_capabilities = (!empty($user_capabilities))? json_decode($user_capabilities) : array();
						} 

							?>
							<div class="checkbox">
							    <label>
							      <input type="checkbox" name="branch_user_capabilities[]" <?php echo ((isset($ID)) && (!empty($user_capabilities)) && (in_array($capability, $user_capabilities)))? 'checked' : ''; ?>  value="<?php echo $capability; ?>"><?php echo $value; ?>
							    </label>
							  </div>
					<?php
					}
				?>
		    </div>
		  </div>



		  <div class="col-sm-offset-3 form-group btn-container ">
			  <input type="submit" name="add_branch_user" class="btn btn-primary" value="Save">
			  <input type="reset" class="btn btn-primary" value="Cancel">
			  <button  class="btn btn-primary">Back</button>
		  </div>

	</div>

    <div class="col-sm-3 col-sm-offset-2">
	  	 <div class="form-group">
		    <label for="branch_user_status" class="col-sm-3 control-label">Status</label>
		    <div class="col-sm-8">
		      <select class="form-control" id="branch_user_status" name="branch_user_status"  required>
					<?php foreach($status as $status_key => $status_value){ ?>
						<option value="<?php echo $status_key; ?>" <?php (isset($ID))? $selected_status = $branch_user_result->branch_user_status : '';if(isset($ID)){if($status_key == $selected_status){echo 'selected=selected';}}?> ><?php echo $status_value; ?></option>
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