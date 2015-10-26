<?php 
/**
* INVENTORY MAIN CLASS
*/
class branch_menu_type extends database
{
	private $table_name;

	function __construct()
	{
		parent::__construct();
		$this->table_name = 'branch_menu_types';
		$this->table_branch = 'branches';
		
	}

	public function insert_branch_menu_type($form)
	{
		$data = array();

		$data['branch_menu_type_name']	        = $form['branch_menu_type_name'];
		$data['branch_menu_type_company'] 		= $form['branch_menu_type_company'];
		$data['branch_menu_type_status'] 		= $form['branch_menu_type_status'];
		

		
		
			
		$this->insert($this->table_name, $data);

		return $this->row_count();

	} // end of insert

	public function update_branch_menu_type($form, $id)
	{
		
		
		$data = array();

		
		$data['branch_menu_type_name']	        = $form['branch_menu_type_name'];
		$data['branch_menu_type_company'] 		= $form['branch_menu_type_company'];
		$data['branch_menu_type_status'] 		= $form['branch_menu_type_status'];

		

		$this->where('branch_menu_type_id', $id);
		$this->update($this->table_name, $data);

		if (!$this->row_count()) {
			return false;
		}
		
		

		return $this->row_count();

	} // end of update

	


	public function get_branch_menu_type($ID = NULL)
	{
		if (isset($ID)) {
			$this->where('branch_menu_type_id',$ID);
			$this->from($this->table_name);
			return $this->result();
		}
		else {
			$this->from($this->table_name);
			return $this->all_results();
		}
	} // end of get


	public function delete_branch_menu_type($ID)
	{
		

		$this->where('branch_menu_type_id', $ID);
		$this->delete($this->table_name, $num_rows = NULL);
		return true;

	}


	





} // end of class


 ?>