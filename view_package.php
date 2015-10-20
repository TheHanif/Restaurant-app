<?php include 'includes/header.php'; ?>



<div class="container-fluide">
	
	<ul class="breadcrumb">
	    <li><a href="#">Home</a></li>
	    <li><a class="active" href="#">Packages</a></li>
	</ul>

<div class="page-heading">
	<h1>View Packages</h1>
</div>

	<div class="table-responsive custom-table">
		<?php 
				$package = new package();
				$results = $package->get_packages();
				if ($results) {}
			?>
		<table id="myTable">  
	        <thead>  
	          <tr>  
	            <th>ID</th>  
	            <th>Name</th>  
	            <th>Details</th>  
	            <th></th>  
	          </tr>  
	        </thead>  
	        <tbody>  

	        <?php 
				foreach($results as $res){
				
				echo '<tr>';
				echo '<td>'. $res->package_unique_id .'</td>';
				echo '<td>'. $res->package_name .'</td>';
				echo '<td>'. $res->package_detail .'</td>';
				echo '<td><a class="edit_btn" href="add_package.php?id='.$res->package_id.'"><i class="fa fa-pencil edit-icon"></i>';
	            echo '<i class="fa fa-ban hold-icon"></i>';
	            echo '<i class="fa fa-trash-o delete-icon"></i>';
	            echo '</td>';
				echo '</tr>';
				}
				?>
	          

	        </tbody>  
      </table>  
	</div>

</div>

<?php include 'includes/footer.php'; ?>