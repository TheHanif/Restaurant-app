<?php include 'includes/header.php'; ?>



<div class="container-fluide">
<?php if(!isset($_SESSION['company_id'])){	?>
	<ul class="breadcrumb">
	    <li><a href="#">Home</a></li>
	    <li><a class="active" href="#">Branches Users</a></li>
	</ul>

<div class="page-heading">
	<h1>View Users</h1>
</div>

	<div class="table-responsive custom-table">
		<?php 
				
				$user = new user();
				$results = $user->get_user();
				if ($results) {}
			?>
		<table id="myTable">  
	        <thead>  
	          <tr>  
	            <th>First Name</th>  
	            <th>Email</th>  
	            <th>Login Name</th> 
	            <th>Status</th> 
	            <th></th>  
	          </tr>  
	        </thead>  
	        <tbody>  

	        <?php 
				foreach($results as $res){
				 
				echo '<tr>';
				echo '<td>'. $res->user_first_name .'</td>';
				echo '<td>'. $res->user_email .'</td>';
				echo '<td>'. $res->user_login .'</td>';
				echo '<td>'. $res->user_status .'</td>';
				echo '<td><a class="edit_btn" href="add_user.php?id='.$res->user_id.'"><i class="fa fa-pencil edit-icon"></i>';
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