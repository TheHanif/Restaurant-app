<?php include 'includes/header.php'; ?>



<div class="container-fluide">
<?php if(isset($_SESSION['company_id'])){	?>
	<ul class="breadcrumb">
	    <li><a href="#">Home</a></li>
	    <li><a class="active" href="#">Branches Items</a></li>
	</ul>

<div class="page-heading">
	<h1>View Items</h1>
</div>

	<div class="table-responsive custom-table">
		<?php 
				$branch = new branch();
				$branch_item = new branch_item();

				$results = $branch_item->get_branch_item();
				
			?>
		<table id="myTable">  
	        <thead>  
	          <tr>  
	            <th>Name</th>  
	            <th>Branch</th>  
	            <th>Category</th> 
	            <th>Status</th> 
	            <th></th>  
	          </tr>  
	        </thead>  
	        <tbody>  

	        <?php 
				foreach($results as $res){
				 if($res->branch_item_company == $_SESSION['company_id']){

			 	//get branch name by id 
			 	$branch_detail = $branch->get_branches($res->branch_item_branch);
				
				echo '<tr>';
				echo '<td>'. $res->branch_item_name .'</td>';
				echo '<td>'. $branch_detail->branch_name.'</td>';
				echo '<td>'. $res->branch_item_category .'</td>';
				echo '<td>'. $res->item_status .'</td>';
				echo '<td><a class="edit_btn" href="add_branch_item.php?id='.$res->branch_item_id.'"><i class="fa fa-pencil edit-icon"></i>';
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