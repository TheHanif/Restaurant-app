<?php 
/**
* INVENTORY MAIN CLASS
*/
class branch_category extends database
{
	private $table_name;

	function __construct()
	{
		parent::__construct();
		$this->table_name = 'branch_category';
		$this->table_branch = 'branches';
		
	}

	public function insert_branch_category($form)
	{
		$data = array();

		$data['branch_category_name']	        = $form['branch_category_name'];
		$data['branch_category_branch']	        = $form['branch_category_branch'];
		$data['branch_category_company'] 		= $form['branch_category_company'];
		$data['branch_category_status'] 		= $form['branch_category_status'];
		

		
		//print_f($data);
		//die();
			
		$this->insert($this->table_name, $data);

		return $this->row_count();

	} // end of insert

	public function update_branch_category($form, $id)
	{
		
		
		$data = array();

		
		$data['branch_category_name']	        = $form['branch_category_name'];
		$data['branch_category_branch']	        = $form['branch_category_branch'];
		$data['branch_category_company'] 		= $form['branch_category_company'];
		$data['branch_category_status'] 		= $form['branch_category_status'];

		

		$this->where('branch_category_id', $id);
		$this->update($this->table_name, $data);

		if (!$this->row_count()) {
			return false;
		}
		
		

		return $this->row_count();

	} // end of update

	


	public function get_branch_category($ID = NULL)
	{
		if (isset($ID)) {
			$this->where('branch_category_id',$ID);
			$this->from($this->table_name);
			return $this->result();
		}
		else {
			$this->from($this->table_name);
			return $this->all_results();
		}
	} // end of get


	public function delete_branch_category($ID)
	{
		

		$this->where('branch_category_id', $ID);
		$this->delete($this->table_name, $num_rows = NULL);
		return true;

	}


	





} // end of class


 ?>