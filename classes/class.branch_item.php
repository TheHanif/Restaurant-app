<?php 
/**
* INVENTORY MAIN CLASS
*/
class branch_item extends database
{
	private $table_name;

	function __construct()
	{
		parent::__construct();
		$this->table_name = 'branches_items';
		$this->table_branch = 'branches';
		
	}

	public function insert_branch_item($form)
	{
		$data = array();

		$data['branch_item_branch']	        = $form['branch_item_branch'];
		$data['branch_item_company']	    = $form['branch_item_company'];
		$data['branch_item_name'] 			= $form['branch_item_name'];
		$data['branch_item_small_decs'] 	= $form['branch_item_small_decs'];
		$data['branch_item_measuring_unit'] = $form['branch_item_measuring_unit'];
		$data['branch_item_category'] 		= $form['branch_item_category'];
		$data['branch_item_sale_price'] 	= $form['branch_item_sale_price'];
		$data['branch_item_cost_price'] 	= $form['branch_item_cost_price'];
		$data['branch_item_spice'] 			= json_encode($form['branch_item_spice']);
		$data['branch_item_display_order'] 	= $form['branch_item_display_order'];
		$data['item_status'] 	            = $form['item_status'];
		


		if (!empty($_FILES['branch_item_img']['tmp_name'])){

			$uploaddir = ABSPATH.'/assets/images/uploads/';
			$uploadfilename =rand(1,99999) .basename($_FILES['branch_item_img']['name']);
			$uploadfile = $uploaddir . $uploadfilename ;
			if (move_uploaded_file($_FILES['branch_item_img']['tmp_name'], $uploadfile)) {
				$data['branch_item_img'] = $uploadfilename;
			}
		
		}  
		
			
		$this->insert($this->table_name, $data);

		return $this->row_count();

	} // end of insert

	public function update_branch_item($form, $id)
	{
		
		
		$data = array();

		
		$data['branch_item_branch']	        = $form['branch_item_branch'];
		$data['branch_item_company']	    = $form['branch_item_company'];
		$data['branch_item_name'] 			= $form['branch_item_name'];
		$data['branch_item_small_decs'] 	= $form['branch_item_small_decs'];
		$data['branch_item_measuring_unit'] = $form['branch_item_measuring_unit'];
		$data['branch_item_category'] 		= $form['branch_item_category'];
		$data['branch_item_sale_price'] 	= $form['branch_item_sale_price'];
		$data['branch_item_cost_price'] 	= $form['branch_item_cost_price'];
		$data['branch_item_display_order'] 	= $form['branch_item_display_order'];
		$data['branch_item_spice'] 			= json_encode($form['branch_item_spice']);
		$data['item_status'] 	            = $form['item_status'];

		if (!empty($_FILES['branch_item_img']['tmp_name'])){
		$uploaddir = ABSPATH.'/assets/images/uploads/';
		$uploadfilename =rand(1,99999) .basename($_FILES['branch_item_img']['name']);
		$uploadfile = $uploaddir . $uploadfilename ;
		if (move_uploaded_file($_FILES['branch_item_img']['tmp_name'], $uploadfile)) {
			$data['branch_item_img'] = $uploadfilename;
		} }
		else {
         echo $data['branch_item_img'] = $data['branch_item_img1'];
        }

		$this->where('branch_item_id', $id);
		$this->update($this->table_name, $data);

		if (!$this->row_count()) {
			return false;
		}
		
		

		return $this->row_count();

	} // end of update

	


	public function get_branch_item($ID = NULL)
	{
		if (isset($ID)) {
			$this->where('branch_item_id',$ID);
			$this->from($this->table_name);
			return $this->result();
		}
		else {
			$this->from($this->table_name);
			return $this->all_results();
		}
	} // end of get


	public function delete_branch_item($ID)
	{
		

		$this->where('branch_item_id', $ID);
		$this->delete($this->table_name, $num_rows = NULL);
		return true;

	}


	





} // end of class


 ?>