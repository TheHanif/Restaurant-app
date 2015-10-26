<?php include 'includes/header.php'; ?>

<div class="container-fluide">
<?php if(isset($_SESSION['company_id'])){	?>	
	<ul class="breadcrumb">
	    <li><a href="#">Home</a></li>
	    <li><a href="view_branch_item.php">Items</a></li>
	    <li><a class="active" href="#" >Add</a></li>
	</ul>

<div class="page-heading">
	<h1>Add Item</h1>
</div>

<div class="form-container">
<?php 

	$branch = new branch();
	$all_branch = $branch->get_branches();

	$branch_category = new branch_category();
	$all_branch_category = $branch_category->get_branch_category();

	$branch_menu_type = new branch_menu_type();
	$all_branch_menu_type = $branch_menu_type->get_branch_menu_type();

	$branch_spice = new branch_spice();
	$all_branch_spice = $branch_spice->get_branch_spice();

	$branch_item = new branch_item();

	
	$ID = (isset($_GET['id']))? $_GET['id'] : NULL;
			if (isset($_POST['add_branch_item'])) {		
				
				// Update old record
				if (isset($ID)) {
					$results = $branch_item->update_branch_item($_POST, $ID);
				}else{ // Insert new
					$results = $branch_item->insert_branch_item($_POST);
				}
				if ($results) {
					echo '<div class="alert alert-success" role="alert">';  echo (isset($_GET['id']))? 'Updated ' : 'Added '; echo  'branch item Sucessfully </div>';
				}else{
					echo '<div class="alert alert-danger" role="alert"> Error </div>';
				}
			}
			if (isset($ID)) {
				$branch_item_result = $branch_item->get_branch_item($ID);
			}
	
?>

<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" >
	<div class="col-sm-6">

		
		 <input type="hidden" class="form-control" name="branch_item_company" id="branch_item_company" value="<?php echo (isset($ID))? $branch_item_result->branch_item_company : $_SESSION["company_id"] ?>" placeholder="Name" required>
		 

		 <div class="form-group">
		    <label for="branch_item_branch" class="col-sm-4 control-label">Select Branch</label>
		    <div class="col-sm-8">
		      	<select class="form-control" name="branch_item_branch" required>
					<option value="" selected disabled>Select</option>
					<?php foreach ($all_branch as $value){ ?>
					<?php if($value->branch_company_id == $_SESSION['company_id']){?>
						<option value="<?php echo $value->branch_id; ?>" <?php (isset($ID))? $branch_name = $branch_item_result->branch_item_branch : ''; if(isset($ID)){if($value->branch_id == $branch_name){echo 'selected=selected';}}?>><?php echo $value->branch_name; ?></option>
					<?php } }?>
				</select>
		 	</div>
		 </div>

		 <div class="form-group">
		    <label for="branch_item_name" class="col-sm-4 control-label">Name</label>
		    <div class="col-sm-8">
		      <input type="text" class="form-control" name="branch_item_name" id="branch_item_name" value="<?php echo (isset($ID))? $branch_item_result->branch_item_name : '' ?>" placeholder="Name" required>
		    </div>
		 </div>

		 <div class="form-group">
		    <label for="branch_item_small_decs" class="col-sm-4 control-label">Small Desc</label>
		    <div class="col-sm-8">
		      <input type="text" class="form-control" name="branch_item_small_decs" id="branch_item_small_decs" value="<?php echo (isset($ID))? $branch_item_result->branch_item_small_decs : '' ?>" placeholder="Small Desc" required>
		    </div>
		 </div>

		 <div class="form-group">
		    <label for="branch_item_measuring_unit" class="col-sm-4 control-label">Measuring Unit</label>
		    <div class="col-sm-8">
		      <input type="text" class="form-control" name="branch_item_measuring_unit" id="branch_item_measuring_unit" value="<?php echo (isset($ID))? $branch_item_result->branch_item_measuring_unit	 : '' ?>" placeholder="Measuring Unit" required>
		    </div>
		 </div>

		  <div class="form-group">
		    <label for="branch_item_category" class="col-sm-4 control-label"> Category</label>
		    <div class="col-sm-8">
		      <select class="form-control" name="branch_item_category" required>
					<option value="" selected disabled>Select</option>
					<?php foreach ($all_branch_category as $value){ ?>
					<?php if($value->branch_category_company == $_SESSION['company_id']){?>
						<option value="<?php echo $value->branch_category_id; ?>" <?php (isset($ID))? $branch_cat = $branch_item_result->branch_item_category : ''; if(isset($ID)){if($value->branch_category_id == $branch_cat){echo 'selected=selected';}}?>><?php echo $value->branch_category_name; ?></option>
					<?php } }?>
				</select>
		    </div>
		 </div>

		 <div class="form-group">
		    <label for="branch_item_menu_type" class="col-sm-4 control-label"> Menu Type</label>
		    <div class="col-sm-8">
		      <select class="form-control" name="branch_item_menu_type" required>
					<option value="" selected disabled>Select</option>
					<?php foreach ($all_branch_menu_type as $value){ ?>
					<?php if($value->branch_menu_type_company == $_SESSION['company_id']){?>
						<option value="<?php echo $value->branch_menu_type_id; ?>" <?php (isset($ID))? $branch_menu = $branch_item_result->branch_item_menu_type : ''; if(isset($ID)){if($value->branch_menu_type_id == $branch_menu){echo 'selected=selected';}}?>><?php echo $value->branch_menu_type_name; ?></option>
					<?php } }?>
				</select>
		    </div>
		 </div>

		 <div class="form-group">
		    <label for="branch_item_sale_price" class="col-sm-4 control-label"> Sale Price</label>
		    <div class="col-sm-8">
		      <input type="number" min="0" class="form-control" name="branch_item_sale_price" id="branch_item_sale_price" value="<?php echo (isset($ID))? $branch_item_result->branch_item_sale_price : '' ?>" placeholder="Sale Price" required>
		    </div>
		 </div>

		 <div class="form-group">
		    <label for="branch_item_cost_price" class="col-sm-4 control-label"> Cost Price</label>
		    <div class="col-sm-8">
		      <input type="number" min="0" class="form-control" name="branch_item_cost_price" id="branch_item_cost_price" value="<?php echo (isset($ID))? $branch_item_result->branch_item_cost_price : '' ?>" placeholder="Cost Price" required>
		    </div>
		 </div>

		 <div class="form-group">
		    <label for="branch_item_display_order" class="col-sm-4 control-label"> Display Order</label>
		    <div class="col-sm-8">
		      <input type="number" min="0" class="form-control" name="branch_item_display_order" id="branch_item_display_order" value="<?php echo (isset($ID))? $branch_item_result->branch_item_display_order : '' ?>" placeholder="Display Order" required>
		    </div>
		 </div>

		 <div class="form-group">
		    <label for="branch_item_display_order" class="col-sm-4 control-label"> Spices</label>
		    <div class="col-sm-8">
		     <?php 

				foreach($all_branch_spice as $value){
					 //print_f($value);
					?>
						<?php
						if(isset($ID)){
							$selected_spices = $branch_item_result->branch_item_spice;
							$selected_spices = (!empty($selected_spices))? json_decode($selected_spices) : array();
						} ?>

						<?php if($value->branch_spice_company == $_SESSION['company_id']){?>
							<div class="checkbox">
							    <label>
							      <input type="checkbox" name="branch_item_spice[]" <?php echo ((isset($ID)) && (!empty($selected_spices)) && (in_array($value->branch_spice_id, $selected_spices)))? 'checked' : ''; ?>  value="<?php echo $value->branch_spice_id; ?>" ><?php echo $value->branch_spice_name; ?>
							    </label>
							  </div>
					<?php
					} }
				?>
		   </div>
		 </div>


		 
		  <div class="col-sm-offset-3 form-group btn-container ">
			  <input type="submit" name="add_branch_item" class="btn btn-primary" value="Save">
			  <input type="reset" class="btn btn-primary" value="Cancel">
			  <button  class="btn btn-primary">Back</button>
		  </div>

	</div>

    <div class="col-sm-5 col-sm-offset-1">

    <div class="col-md-8 col-sm-8">
	  	 <div class="form-group">
		    <label for="item_status" class="col-sm-3 control-label">Status</label>
		    <div class="col-sm-8">
		      <select class="form-control" id="item_status" name="item_status"  required>
					<?php foreach($status as $status_key => $status_value){ ?>
						<option value="<?php echo $status_key; ?>" <?php (isset($ID))? $selected_status = $branch_item_result->item_status : '';if(isset($ID)){if($status_key == $selected_status){echo 'selected=selected';}}?> ><?php echo $status_value; ?></option>
						<?php } ?>
				</select>
		    </div>
		  </div>
		</div><!--col-md-12-->

		<div class="col-md-12 col-sm-12">
		  <?php 
	        if(isset($ID)){
	         if($branch_item_result->branch_item_img){ ?>
	          <div class="profilePic">
	           <span>
	            <?php echo '<img src="assets/images/uploads/'.$branch_item_result->branch_item_img.'" style="width:auto;" class="img-responsive" alt="">'; ?>
	            <a id="removeProfilePic"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
	           </span>
	           <input type="hidden" name="branch_item_img1" value="<?php echo $branch_item_result->branch_item_img; ?>">
	          </div>

	          <div class="form-group" id="showNewPicSubmit" style="display:none;">
				<label for="movie_synopsis" class="col-sm-2 control-label">Image: </label>
				<div class="col-sm-10">
					 <input type="file" name="branch_item_img" class="form-control" style="width:100%;height: 33px;" >
				</div>
			 </div>
			<?php
	         }
	         else { ?>
	          <div class="form-group">
				<label for="movie_synopsis" class="col-sm-2 control-label">Image: </label>
				<div class="col-sm-10">
					 <input type="hidden" class="form-control" name="branch_item_img" id="photo" readonly>
					 <input type="file" name="branch_item_img" class="form-control" style="width:100%;height: 33px;" >
				</div>
			 </div>
	         <?php
	         }
	        } else { ?>
	         <div class="form-group">
				<label for="movie_synopsis" class="col-sm-2 control-label">Image: </label>
				<div class="col-sm-10">
					 <input type="hidden" class="form-control" name="branch_item_img" id="photo" readonly>
					 <input type="file" name="branch_item_img" class="form-control" style="width:100%;height: 33px;" >
				</div>
			 </div>
	        <?php
	        }
	        ?>
	</div><!--col-md-12-->

</div> <!--col-md-6-->
 </form>

</div><!--form-container-->

<?php } ?>
	</div><!--container-fluide-->


<?php include 'includes/footer.php'; ?>