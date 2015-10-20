<?php include 'includes/header.php'; ?>

<div class="container-fluide">
	
	<ul class="breadcrumb">
	    <li><a href="#">Home</a></li>
	    <li><a href="view_company.php">Companies</a></li>
	    <li><a class="active" href="#" >Add</a></li>
	</ul>

<div class="page-heading">
	<h1>Add Company</h1>
</div>

<div class="form-container">
<?php 

	$company = new company();
	
	$ID = (isset($_GET['id']))? $_GET['id'] : NULL;
			if (isset($_POST['add_company'])) {		
				
				// Update old record
				if (isset($ID)) {
					$results = $company->update_company($_POST, $ID);
				}else{ // Insert new
					$results = $company->insert_company($_POST);
				}
				if ($results) {
					echo '<div class="alert alert-success" role="alert">';  echo (isset($_GET['id']))? 'Updated ' : 'Added '; echo  'company Sucessfully </div>';
				}else{
					echo '<div class="alert alert-danger" role="alert"> Error </div>';
				}
			}
			if (isset($ID)) {
				$company_result = $company->get_companies($ID);
			}
	
?>

<form class="form-horizontal" action="" method="post">
	<div class="col-sm-6">


		  <div class="form-group">
		    <label for="company_name" class="col-sm-4 control-label">Name</label>
		    <div class="col-sm-8">
		      <input type="text" class="form-control" name="company_name" id="company_name" value="<?php echo (isset($ID))? $company_result->company_name : '' ?>" placeholder="Name" required>
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="company_location" class="col-sm-4 control-label">Location</label>
		    <div class="col-sm-8">
		      <input type="text" class="form-control" name="company_location" id="company_location" value="<?php echo (isset($ID))? $company_result->company_location : '' ?>" placeholder="location">
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="company_branch_count" class="col-sm-4 control-label">Total Branches</label>
		    <div class="col-sm-8">
		      <input type="text" class="form-control" name="company_branch_count" id="company_branch_count" value="<?php echo (isset($ID))? $company_result->company_branch_count : '' ?>" placeholder="count">
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="company_detail" class="col-sm-4 control-label">Details</label>
		    <div class="col-sm-8">
		      <textarea class="form-control" id="company_detail" name="company_detail" placeholder="Details"><?php echo (isset($ID))? $company_result->company_detail : '' ?></textarea>
		    </div>
		  </div>

		  <div class="col-sm-offset-4 form-group btn-container ">
			  <input type="submit" name="add_company" class="btn btn-primary" value="Save">
			  <input type="reset" class="btn btn-primary" value="Cancel">
			  <button  class="btn btn-primary">Back</button>
		  </div>

	</div>

    <div class="col-sm-3 col-sm-offset-2">
	  	 <div class="form-group">
		    <label for="company_status" class="col-sm-3 control-label">Status</label>
		    <div class="col-sm-8">
		      <select class="form-control" id="company_status" name="company_status"  required>
					<?php foreach($status as $status_key => $status_value){ ?>
						<option value="<?php echo $status_key; ?>" <?php (isset($ID))? $selected_status = $company_result->company_status : '';if(isset($ID)){if($status_key == $selected_status){echo 'selected=selected';}}?> ><?php echo $status_value; ?></option>
						<?php } ?>
				</select>
		    </div>
		  </div>
	</div>

	 
 </form>

</div><!--form-container-->

	
	</div><!--container-fluide-->


<?php include 'includes/footer.php'; ?>