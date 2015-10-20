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
				$company = new company();
				$results = $company->get_companies();
				if ($results) {}
			?>
		<table id="myTable">  
	        <thead>  
	          <tr>  
	           
	            <th>Name</th>  
	             <th>Location</th>  
	            <th>Details</th>  
	            <th>Total Branches</th>  
	            <th></th>  
	          </tr>  
	        </thead>  
	        <tbody>  

	        <?php 
				foreach($results as $res){
				
				echo '<tr>';
				echo '<td>'. $res->company_name .'</td>';
				echo '<td>'. $res->company_location .'</td>';
				echo '<td>'. $res->company_detail .'</td>';
				echo '<td>'. $res->company_branch_count .'</td>';
				
				echo '<td><a class="edit_btn" href="add_company.php?id='.$res->company_id.'"><i class="fa fa-pencil edit-icon"></i>';
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