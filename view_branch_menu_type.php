<?php include 'includes/header.php'; ?>



<div class="container-fluide">
<?php if(isset($_SESSION['company_id'])){	?>
	<ul class="breadcrumb">
	    <li><a href="#">Home</a></li>
	    <li><a class="active" href="#">Branches Menu Types</a></li>
	</ul>

<div class="page-heading">
	<h1>View Menu Types</h1>
</div>

	<div class="table-responsive custom-table">
		<?php 
				$branch = new branch();
				$branch_menu_type = new branch_menu_type();

				$results = $branch_menu_type->get_branch_menu_type();
				
			?>
		<table id="myTable">  
	        <thead>  
	          <tr>  
	            <th>Name</th>  
	            <th>Status</th> 
	            <th></th>  
	          </tr>  
	        </thead>  
	        <tbody>  

	        <?php 
				foreach($results as $res){
				 if($res->branch_menu_type_company == $_SESSION['company_id']){

			 	//get branch name by id 
			 	//$branch_detail = $branch->get_branches($res->branch_menu_type_branch);
				
				echo '<tr>';
				echo '<td>'. $res->branch_menu_type_name .'</td>';
				echo '<td>'. $res->branch_menu_type_status .'</td>';
				echo '<td><a class="edit_btn" href="add_branch_menu_type.php?id='.$res->branch_menu_type_id.'"><i class="fa fa-pencil edit-icon"></i>';
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