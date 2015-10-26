<?php include 'includes/header.php'; ?>



<div class="container-fluide">
<?php if(isset($_SESSION['company_id'])){	?>
	<ul class="breadcrumb">
	    <li><a href="#">Home</a></li>
	    <li><a class="active" href="#">Branches Tables</a></li>
	</ul>

<div class="page-heading">
	<h1>View Tables</h1>
</div>

	<div class="table-responsive custom-table">
		<?php 
				$branch = new branch();
				$branch_table = new branch_table();

				$results = $branch_table->get_branch_table();
				
			?>
		<table id="myTable">  
	        <thead>  
	          <tr>  
	            <th>Name</th> 
	            <th>Branch</th>  
	            <th>Status</th> 
	            <th></th>  
	          </tr>  
	        </thead>  
	        <tbody>  

	        <?php 
				foreach($results as $res){
				 if($res->branch_table_company == $_SESSION['company_id']){

				 $branch_detail = $branch->get_branches($res->branch_table_branch);	
			 	
				
				echo '<tr>';
				echo '<td>'. $res->branch_table_name .'</td>';
				echo '<td>'. $branch_detail->branch_name .'</td>';
				echo '<td>'. $res->branch_table_status .'</td>';
				echo '<td><a class="edit_btn" href="add_branch_table.php?id='.$res->branch_table_id.'"><i class="fa fa-pencil edit-icon"></i>';
	            echo '<i class="fa fa-ban hold-icon"></i>';
	            echo '<i class="fa fa-trash-o delete-icon"></i>';
	            echo '</td>';
				echo '</tr>';
						
					}
				}
				
				?>
	          

	        </tbody>  
      </table>  
      <?php }?>
	</div>

</div>

<?php include 'includes/footer.php'; ?>