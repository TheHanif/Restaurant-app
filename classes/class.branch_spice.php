<?php 
/**
* INVENTORY MAIN CLASS
*/
class branch_spice extends database
{
	private $table_name;

	function __construct()
	{
		parent::__construct();
		$this->table_name = 'branch_spices';
		$this->table_branch = 'branches';
		
	}

	public function insert_branch_spice($form)
	{
		$data = array();

		$data['branch_spice_name']	        = $form['branch_spice_name'];
		$data['branch_spice_branch']	    = $form['branch_spice_branch'];
		$data['branch_spice_company'] 		= $form['branch_spice_company'];
		$data['branch_spice_status'] 		= $form['branch_spice_status'];
		

		
		//print_f($data);
		//die();
			
		$this->insert($this->table_name, $data);

		return $this->row_count();

	} // end of insert

	public function update_branch_spice($form, $id)
	{
		
		
		$data = array();

		
		$data['branch_spice_name']	        = $form['branch_spice_name'];
		$data['branch_spice_branch']	    = $form['branch_spice_branch'];
		$data['branch_spice_company'] 		= $form['branch_spice_company'];
		$data['branch_spice_status'] 		= $form['branch_spice_status'];

		

		$this->where('branch_spice_id', $id);
		$this->update($this->table_name, $data);

		if (!$this->row_count()) {
			return false;
		}
		
		

		return $this->row_count();

	} // end of update

	


	public function get_branch_spice($ID = NULL)
	{
		if (isset($ID)) {
			$this->where('branch_spice_id',$ID);
			$this->from($this->table_name);
			return $this->result();
		}
		else {
			$this->from($this->table_name);
			return $this->all_results();
		}
	} // end of get


	public function delete_branch_spice($ID)
	{
		

		$this->where('branch_spice_id', $ID);
		$this->delete($this->table_name, $num_rows = NULL);
		return true;

	}


	





} // end of class


 ?>