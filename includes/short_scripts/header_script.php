	
<script>
  
$(document).ready(function(){

	$(".cd-main-header").on('click', '.selected_company', function() {
		    
		    var this_company = $(this).attr('id');
		    $.post('ajax.php', {'seleted_company': this_company, 'action': 'get_company_detail'}, function(data) {
		   		
		        console.log(data);
		      
		   });
   		});//end 

	// set super admin session on selection
		$(".cd-main-header").on('click', '#admin_selected', function() {
		    
		  $.post('ajax.php', {'action': 'set_admin_session'}, function(data) {
		   		
		        console.log(data);
		      
		   });
   		});//end 

 });
</script>	