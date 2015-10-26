<?php include 'includes/header.php'; ?>

<div class="container-fluide">
<?php if(isset($_SESSION['company_id'])){	?>	
	<ul class="breadcrumb">
	    <li><a href="#">Home</a></li>
	    <li><a href="view_branch_menu_type.php">Menu Types</a></li>
	    <li><a class="active" href="#" >Add</a></li>
	</ul>

<div class="page-heading">
	<h1>Add Category</h1>
</div>

<div class="form-container">
<?php 

	$branch = new branch();
	$all_branch = $branch->get_branches();

	$branch_menu_type = new branch_menu_type();

	
	$ID = (isset($_GET['id']))? $_GET['id'] : NULL;
			if (isset($_POST['add_branch_menu_type'])) {		
				
				// Update old record
				if (isset($ID)) {
					$results = $branch_menu_type->update_branch_menu_type($_POST, $ID);
				}else{ // Insert new
					$results = $branch_menu_type->insert_branch_menu_type($_POST);
				}
				if ($results) {
					echo '<div class="alert alert-success" role="alert">';  echo (isset($_GET['id']))? 'Updated ' : 'Added '; echo  'branch Menu Type Sucessfully </div>';
				}else{
					echo '<div class="alert alert-danger" role="alert"> Error </div>';
				}
			}
			if (isset($ID)) {
				$branch_menu_type_result = $branch_menu_type->get_branch_menu_type($ID);
			}
	
?>

<form class="form-horizontal" action="" method="post">
	<div class="col-sm-6">

		
		 <input type="hidden" class="form-control" name="branch_menu_type_company" id="branch_menu_type_company" value="<?php echo (isset($ID))? $branch_menu_type_result->branch_menu_type_company : $_SESSION["company_id"] ?>" placeholder="Name" required>
		 

		 <div class="form-group">
		    <label for="branch_menu_type_name" class="col-sm-4 control-label">Name</label>
		    <div class="col-sm-8">
		      <input type="text" class="form-control" name="branch_menu_type_name" id="branch_menu_type_name" value="<?php echo (isset($ID))? $branch_menu_type_result->branch_menu_type_name : '' ?>" placeholder="Name" required>
		    </div>
		 </div>
		 
		

		  <div class="col-sm-offset-3 form-group btn-container ">
			  <input type="submit" name="add_branch_menu_type" class="btn btn-primary" value="Save">
			  <input type="reset" class="btn btn-primary" value="Cancel">
			  <button  class="btn btn-primary">Back</button>
		  </div>

	</div>

    <div class="col-sm-3 col-sm-offset-2">
	  	 <div class="form-group">
		    <label for="branch_menu_type_status" class="col-sm-3 control-label">Status</label>
		    <div class="col-sm-8">
		      <select class="form-control" id="branch_menu_type_status" name="branch_menu_type_status"  required>
					<?php foreach($status as $status_key => $status_value){ ?>
						<option value="<?php echo $status_key; ?>" <?php (isset($ID))? $selected_status = $branch_menu_type_result->branch_menu_type_status : '';if(isset($ID)){if($status_key == $selected_status){echo 'selected=selected';}}?> ><?php echo $status_value; ?></option>
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