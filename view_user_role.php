<?php include 'includes/header.php'; ?>



<div class="container-fluide">
<?php if(!isset($_SESSION['company_id'])){	?>
	<ul class="breadcrumb">
	    <li><a href="#">Home</a></li>
	    <li><a class="active" href="#">User Roles</a></li>
	</ul>

<div class="page-heading">
	<h1>View User Roles</h1>
</div>

	<div class="table-responsive custom-table">
		<?php 
				
				$user_role = new user_role();
				$results = $user_role->get_user_role();
				
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
				
			 	echo '<tr>';
				echo '<td>'. $res->user_role_name .'</td>';
				echo '<td>'. $res->user_role_status .'</td>';
				echo '<td><a class="edit_btn" href="add_user_role.php?id='.$res->user_role_id.'"><i class="fa fa-pencil edit-icon"></i>';
	            echo '<i class="fa fa-ban hold-icon"></i>';
	            echo '<i class="fa fa-trash-o delete-icon"></i>';
	            echo '</td>';
				echo '</tr>';
						
					
				}
				
				?>
	          

	        </tbody>  
      </table>  
      <?php }?>
	</div>

</div>

<?php include 'includes/footer.php'; ?>