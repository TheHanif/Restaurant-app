<?php include 'includes/header.php'; ?>



<div class="container-fluide">
<?php if(isset($_SESSION['company_id'])){	?>
	<ul class="breadcrumb">
	    <li><a href="#">Home</a></li>
	    <li><a class="active" href="#">Branch User Roles</a></li>
	</ul>

<div class="page-heading">
	<h1>View Categories</h1>
</div>

	<div class="table-responsive custom-table">
		<?php 
				$branch = new branch();
				$branch_user_role = new branch_user_role();

				$results = $branch_user_role->get_branch_user_role();
				
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
				 if($res->branch_user_role_company == $_SESSION['company_id']){

			 	
				
				echo '<tr>';
				echo '<td>'. $res->branch_user_role_name .'</td>';
				echo '<td>'. $res->branch_user_role_status .'</td>';
				echo '<td><a class="edit_btn" href="add_branch_user_role.php?id='.$res->branch_user_role_id.'"><i class="fa fa-pencil edit-icon"></i>';
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