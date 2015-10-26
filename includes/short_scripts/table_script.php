<script>
        function addRow() {
		var div = document.createElement('div');
		div.className = 'row';
		div.innerHTML = '<div class="col-md-12 row-el">\
							<div class="col-sm-5">\
								<div class="form-group">\
									<label for="branch_table_name" class="col-sm-4 control-label">Name</label>\
									<div class="col-sm-8">\
										 <input type="text" class="form-control" name="branch_table_name[]" id="branch_table_name" value="" placeholder="Name" required>\
									</div>\
								</div>\
							</div>\
							<div class="col-sm-5">\
							    <div class="form-group">\
								 <label for="branch_table_chairs" class="col-sm-4 control-label">Chairs Qty</label>\
									<div class="col-sm-8">\
										<input type="number" min="0" class="form-control" name="branch_table_chairs[]" id="branch_table_chairs" value="" placeholder="Chairs qty" required>\
									</div>\
							    </div>\
							</div>\
							<div class="col-sm-2">\
								<div class="form-group">\
									<div class="col-sm-8">\
										<button type="button" class="btn submitBtn minus-btn" value="" >Remove</button>\
									</div>\
								</div>\
							</div>\
							</div>\
							</div>';
		 document.getElementById('content').appendChild(div);
		}
		
		
		// Minus Button function for Offer Page
			$("#content").on('click', '.minus-btn', function() {
				$(this).parents('.row-el').parent('.row').remove();
			});
</script>	