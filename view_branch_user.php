<?php include 'includes/header.php'; ?>



<div class="container-fluide">
<?php if(isset($_SESSION['company_id'])){	?>
	<ul class="breadcrumb">
	    <li><a href="#">Home</a></li>
	    <li><a class="active" href="#">Branches Users</a></li>
	</ul>

<div class="page-heading">
	<h1>View Branches Users</h1>
</div>

	<div class="table-responsive custom-table">
		<?php 
				$branch = new branch();
				$branch_user = new branch_user();

				$results = $branch_user->get_branch_user();
				if ($results) {}
			?>
		<table id="myTable">  
	        <thead>  
	          <tr>  
	            <th>Name</th>  
	            <th>Branch</th>  
	            <th>Email</th>  
	            <th>Phone</th> 
	            <th>Status</th> 
	            <th></th>  
	          </tr>  
	        </thead>  
	        <tbody>  

	        <?php 
				foreach($results as $res){
				 if($res->branch_user_company_id == $_SESSION['company_id']){

			 	//get branch name by id 
			 	$branch_detail = $branch->get_branches($res->branch_user_branch_id);
				
				echo '<tr>';
				echo '<td>'. $res->branch_user_name .'</td>';
				echo '<td>'. $branch_detail->branch_name.'</td>';
				echo '<td>'. $res->branch_user_email .'</td>';
				echo '<td>'. $res->branch_user_phone .'</td>';
				echo '<td>'. $res->branch_user_status .'</td>';
				echo '<td><a class="edit_btn" href="add_branch_user.php?id='.$res->branch_user_id.'"><i class="fa fa-pencil edit-icon"></i>';
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