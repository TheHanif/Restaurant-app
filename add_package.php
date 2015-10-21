<?php include 'includes/header.php'; ?>

<div class="container-fluide">
	<?php if(!isset($_SESSION['company_id'])){	?>
	<ul class="breadcrumb">
	    <li><a href="#">Home</a></li>
	    <li><a href="view_package.php">Packages</a></li>
	    <li><a class="active" href="#" >Add</a></li>
	</ul>

<div class="page-heading">
	<h1>Add Package</h1>
</div>

<div class="form-container">
<?php 

	$package = new package();
	
	$ID = (isset($_GET['id']))? $_GET['id'] : NULL;
	if (isset($_POST['add_package'])) {		
		
		// Update old record
		if (isset($ID)) {
			$results = $package->update_package($_POST, $ID);
		}else{ // Insert new
			$results = $package->insert_package($_POST);
		}
		if ($results) {
			echo '<div class="alert alert-success" role="alert">';  echo (isset($_GET['id']))? 'Updated ' : 'Added '; echo  'package Sucessfully </div>';
		}else{
			echo '<div class="alert alert-danger" role="alert"> Error </div>';
		}
	}
	if (isset($ID)) {
		$package_result = $package->get_packages($ID);
		$package_result->package_features = json_decode($package_result->package_features);
	}
	
?>

<form class="form-horizontal" action="" method="post">
	<div class="col-sm-6">
		  <div class="form-group">
		    <label for="package_unique_id" class="col-sm-3 control-label">ID</label>
		    <div class="col-sm-8">
		      <input type="text" class="form-control" name="package_unique_id" id="package_unique_id" value="<?php echo (isset($ID))? $package_result->package_unique_id : '' ?>" placeholder="Id" readonly>
		      <small class="help-block">Unique Identifier</small>
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="package_name" class="col-sm-3 control-label">Name</label>
		    <div class="col-sm-8">
		      <input type="text" class="form-control" name="package_name" id="package_name" value="<?php echo (isset($ID))? $package_result->package_name : '' ?>" placeholder="Small description">
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="package_desc" class="col-sm-3 control-label">Description</label>
		    <div class="col-sm-8">
		      <textarea class="form-control" id="package_desc" name="package_desc" placeholder="Details"><?php echo (isset($ID))? $package_result->package_detail : '' ?></textarea>
		    </div>
		  </div>

		  <div class="form-group">
		    <label class="col-sm-3 control-label"></label>
		    <div class="col-sm-8 packages-features">
				<label for="" class="control-label"><strong>Features</strong></label>
				
				<div class="form-group">
					<label class="col-sm-3 control-label">Branches</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="package_features[branches]" value="<?php echo (isset($ID))? $package_result->package_features->branches : '' ?>">
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">Tables</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="package_features[tables]" value="<?php echo (isset($ID))? $package_result->package_features->tables : '' ?>">
						<small class="help-block">Number of table in each branch</small>
					</div>
				</div>

		    </div><!-- // .packages-features -->
		  </div>



		  <div class="col-sm-offset-3 form-group btn-container ">
			  <input type="submit" name="add_package" class="btn btn-primary" value="Save">
			  <input type="reset" class="btn btn-primary" value="Cancel">
			  <button  class="btn btn-primary">Back</button>
		  </div>

	</div>

    <div class="col-sm-3 col-sm-offset-2">
	  	 <div class="form-group">
		    <label for="package_status" class="col-sm-3 control-label">Status</label>
		    <div class="col-sm-8">
		      <select class="form-control" id="package_status" name="package_status"  required>
					<?php foreach($package->packages_status as $status_key => $status_value){ ?>
						<option value="<?php echo $status_key; ?>" <?php (isset($ID))? $selected_status = $package_result->package_status : '';if(isset($ID)){if($status_key == $selected_status){echo 'selected=selected';}}?> ><?php echo $status_value; ?></option>
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