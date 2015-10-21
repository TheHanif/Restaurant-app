<?php include 'includes/header.php'; ?>



<div class="container-fluide">
	
	<ul class="breadcrumb">
	    <li><a href="#">Home</a></li>
	    <li><a class="active" href="#">Branches</a></li>
	</ul>

<div class="page-heading">
	<h1>View Branches</h1>
</div>

	<div class="table-responsive custom-table">
		<?php 
				$branch = new branch();
				$results = $branch->get_branches();
				if ($results) {}
			?>
		<table id="myTable">  
	        <thead>  
	          <tr>  
	            <th>ID</th>  
	            <th>Company</th>  
	            <th>Name</th>  
	            <th>Location</th>  
	            <th>Desc</th> 
	            <th></th>  
	          </tr>  
	        </thead>  
	        <tbody>  

	        <?php 
				foreach($results as $res){
				
				echo '<tr>';
				echo '<td>'. $res->branch_code .'</td>';
				echo '<td>'. $res->branch_company_id .'</td>';
				echo '<td>'. $res->branch_name .'</td>';
				echo '<td>'. $res->branch_location .'</td>';
				echo '<td>'. $res->branch_detail .'</td>';
				echo '<td><a class="edit_btn" href="add_branch.php?id='.$res->branch_id.'"><i class="fa fa-pencil edit-icon"></i>';
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