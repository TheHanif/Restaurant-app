<?php include 'includes/header.php'; ?>

<div class="container-fluide">
	
	<ul class="breadcrumb">
	    <li><a href="#">Home</a></li>
	    <li><a href="view_branch.php">Branches</a></li>
	    <li><a class="active" href="#" >Add</a></li>
	</ul>

<div class="page-heading">
	<h1>Add Branch</h1>
</div>

<div class="form-container">
<?php 

	$branch = new branch();

	
	$ID = (isset($_GET['id']))? $_GET['id'] : NULL;
			if (isset($_POST['add_branch'])) {		
				
				// Update old record
				if (isset($ID)) {
					$results = $branch->update_branch($_POST, $ID);
				}else{ // Insert new
					$results = $branch->insert_branch($_POST);
				}
				if ($results) {
					echo '<div class="alert alert-success" role="alert">';  echo (isset($_GET['id']))? 'Updated ' : 'Added '; echo  'branch Sucessfully </div>';
				}else{
					echo '<div class="alert alert-danger" role="alert"> Error </div>';
				}
			}
			if (isset($ID)) {
				$branch_result = $branch->get_branches($ID);
			}
	
?>

<form class="form-horizontal" action="" method="post">
	<div class="col-sm-6">
		  <div class="form-group">
		    <label for="branch_code" class="col-sm-3 control-label">ID</label>
		    <div class="col-sm-8">
		      <input type="text" class="form-control" name="branch_code" id="branch_code" value="<?php echo (isset($ID))? $branch_result->branch_code : '123' ?>" placeholder="Id" readonly>
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="branch_company_id" class="col-sm-3 control-label">Company</label>
		    <div class="col-sm-8">
		      <input type="text" class="form-control" name="branch_company_id" id="branch_company_id" value="<?php echo (isset($ID))? $branch_result->branch_company_id : 'session 123' ?>" placeholder="Company id" readonly>
		    </div>
		    </div>
		 

		  <div class="form-group">
		    <label for="branch_name" class="col-sm-3 control-label">Name</label>
		    <div class="col-sm-8">
		      <input type="text" class="form-control" name="branch_name" id="branch_name" value="<?php echo (isset($ID))? $branch_result->branch_name : '' ?>" placeholder="Name" required>
		    </div>
		    </div>
		 
		<div class="form-group">
		    <label for="branch_location" class="col-sm-3 control-label">Location</label>
		    <div class="col-sm-8">
		      <input type="text" class="form-control" name="branch_location" id="branch_location" value="<?php echo (isset($ID))? $branch_result->branch_location : '' ?>" placeholder="Location">
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="branch_detail" class="col-sm-3 control-label">Description</label>
		    <div class="col-sm-8">
		      <textarea class="form-control" id="branch_detail" name="branch_detail" placeholder="Details"><?php echo (isset($ID))? $branch_result->branch_detail : '' ?></textarea>
		    </div>
		  </div>

		  <div class="col-sm-offset-3 form-group btn-container ">
			  <input type="submit" name="add_branch" class="btn btn-primary" value="Save">
			  <input type="reset" class="btn btn-primary" value="Cancel">
			  <button  class="btn btn-primary">Back</button>
		  </div>

	</div>

    <div class="col-sm-3 col-sm-offset-2">
	  	 <div class="form-group">
		    <label for="branch_status" class="col-sm-3 control-label">Status</label>
		    <div class="col-sm-8">
		      <select class="form-control" id="branch_status" name="branch_status"  required>
					<?php foreach($status as $status_key => $status_value){ ?>
						<option value="<?php echo $status_key; ?>" <?php (isset($ID))? $selected_status = $branch_result->branch_status : '';if(isset($ID)){if($status_key == $selected_status){echo 'selected=selected';}}?> ><?php echo $status_value; ?></option>
						<?php } ?>
				</select>
		    </div>
		  </div>
	</div>

	 
 </form>

</div><!--form-container-->

	
	</div><!--container-fluide-->


<?php include 'includes/footer.php'; ?>