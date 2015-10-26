<?php include 'includes/header.php'; ?>

<div class="container-fluide">
<?php if(isset($_SESSION['company_id'])){	?>	
	<ul class="breadcrumb">
	    <li><a href="#">Home</a></li>
	    <li><a href="view_branch_table.php">Tables</a></li>
	    <li><a class="active" href="#" >Add</a></li>
	</ul>

<div class="page-heading">
	<h1>Add Table</h1>
</div>

<div class="form-container">
<?php 

	$branch = new branch();
	$all_branch = $branch->get_branches();

	$branch_table = new branch_table();

	
	$ID = (isset($_GET['id']))? $_GET['id'] : NULL;
			if (isset($_POST['add_branch_table'])) {		
				
				// Update old record
				if (isset($ID)) {
					$results = $branch_table->update_branch_table($_POST, $ID);
				}else{ // Insert new
					$results = $branch_table->insert_branch_table($_POST);
				}
				if ($results) {
					echo '<div class="alert alert-success" role="alert">';  echo (isset($_GET['id']))? 'Updated ' : 'Added '; echo  'Tables Sucessfully </div>';
				}else{
					echo '<div class="alert alert-danger" role="alert"> Error </div>';
				}
			}
			if (isset($ID)) {
				$branch_table_result = $branch_table->get_branch_table($ID);
			}
	
?>

<form class="form-horizontal" action="" method="post">
	
<div class="col-sm-12">
	<div class="col-sm-6">

		<input type="hidden" class="form-control" name="branch_table_company" id="branch_table_company" value="<?php echo (isset($ID))? $branch_table_result->branch_table_company : $_SESSION["company_id"] ?>" placeholder="Name" required>
		 
		 <div class="form-group">
		    <label for="branch_table_branch" class="col-sm-4 control-label">Select Branch</label>
		    <div class="col-sm-6">
		      	<select class="form-control" name="branch_table_branch" required>
					<option value="" selected disabled>Select</option>
					<?php foreach ($all_branch as $value){ ?>
					<?php if($value->branch_company_id == $_SESSION['company_id']){?>
						<option value="<?php echo $value->branch_id; ?>" <?php (isset($ID))? $branch_name = $branch_table_result->branch_table_branch : ''; if(isset($ID)){if($value->branch_id == $branch_name){echo 'selected=selected';}}?>><?php echo $value->branch_name; ?></option>
					<?php } }?>
				</select>
		 	</div>
		 </div>
	</div>
	<div class="col-sm-6">
	</div>

    <div class="col-sm-3 col-sm-offset-2">
	  	 <div class="form-group">
		    <label for="branch_table_status" class="col-sm-3 control-label">Status</label>
		    <div class="col-sm-8">
		      <select class="form-control" id="branch_table_status" name="branch_table_status"  required>
					<?php foreach($status as $status_key => $status_value){ ?>
						<option value="<?php echo $status_key; ?>" <?php (isset($ID))? $selected_status = $branch_table_result->branch_table_status : '';if(isset($ID)){if($status_key == $selected_status){echo 'selected=selected';}}?> ><?php echo $status_value; ?></option>
						<?php } ?>
				</select>
		    </div>
		  </div>
	</div>

	</div><!--col-sm-12-->


	<div class="clear"></div>
	
	
	
	<div class="col-sm-12 tables_chair">
	<button type="button" class="btn add_table" value="" onclick="addRow()">Add new Table</button>
	
	<div id="content">
	<?php if(isset($ID)){
			$counter = 0;
			$current_table = $branch_table_result->branch_table_name;
			$current_table = (!empty($current_table))? json_decode($current_table) : array();

			$current_chairs = $branch_table_result->branch_table_chairs;
			$current_chairs = (!empty($current_chairs))? json_decode($current_chairs) : array();?>

		<?php foreach ($current_table as $current_table_values) {?>
	<div class="row">
		<div class="col-md-12 row-el">
			<div class="col-sm-5">

				<div class="form-group">
				    <label for="branch_table_name" class="col-sm-4 control-label">Name</label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" name="branch_table_name[]" id="branch_table_name" value="<?php echo $current_table_values; ?>" placeholder="Name" required>
				    </div>
				 </div>

			 </div>
				 
			<div class="col-sm-5">
				 
				<div class="form-group">
				    <label for="branch_table_chairs" class="col-sm-4 control-label">Chairs Qty</label>
				    <div class="col-sm-8">
				      <input type="number" min="0" class="form-control" name="branch_table_chairs[]" id="branch_table_chairs" value="<?php echo $current_chairs[$counter]; ?>" placeholder="Chairs qty" required>
				    </div>
				 </div>
			</div>

			<div class="col-sm-2">
				 
				<div class="form-group">
				   <div class="col-sm-8">
				      <button type="button" class="btn submitBtn minus-btn" value="" >Remove</button>
				    </div>
				 </div>
			</div>
		</div>
	</div>
		<?php $counter++; ?>
		<?php }?>
		<?php }?>
	</div><!-- #Content CLose -->
				

	


	


	<div class="col-sm-6">
	<div class="col-sm-offset-3 form-group btn-container ">
		  <input type="submit" name="add_branch_table" class="btn btn-primary" value="Save">
		  <input type="reset" class="btn btn-primary" value="Cancel">
		  <button  class="btn btn-primary">Back</button>
	</div>
	</div><!--col-sm-6-->
	 
 </form>

</div><!--form-container-->

<?php } ?>
	</div><!--container-fluide-->

<?php require_once 'includes/short_scripts/table_script.php'; ?>
<?php include 'includes/footer.php'; ?>