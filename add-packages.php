<?php include 'includes/header.php'; ?>



<div class="container-fluide">
	
	<ul class="breadcrumb">
	    <li><a href="#">Home</a></li>
	    <li><a href="view-packages.php">Packages</a></li>
	    <li><a class="active" href="#" >Add</a></li>
	</ul>

<div class="page-heading">
	<h1>Add Package</h1>
</div>

<div class="form-container">

<form class="form-horizontal">
	<div class="col-sm-6">
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">ID</label>
		    <div class="col-sm-8">
		      <input type="text" class="form-control" id="inputEmail3" placeholder="Id">
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
		    <div class="col-sm-8">
		      <input type="text" class="form-control" id="" placeholder="Name">
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Class</label>
		    <div class="col-sm-8">
		      <input type="text" class="form-control" id="" placeholder="Class">
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Class</label>
		    <div class="col-sm-8">
		      <select class="form-control" id="" >
		      	<option>option</option>
		      	<option>option</option>
		      	<option>option</option>
		      </select>
		    </div>
		  </div>

		  <div class="form-group btn-container">
			  <button type="submit" class="btn btn-primary">Save</button>
			  <button type="submit" class="btn btn-primary">Cancel</button>
			  <button type="submit" class="btn btn-primary">Back</button>
		  </div>

	  </div>
 </form>

</div><!--form-container-->

	
	</div><!--container-fluide-->


<?php include 'includes/footer.php'; ?>