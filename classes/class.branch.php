<?php 
/**
* INVENTORY MAIN CLASS
*/
class branch extends database
{
	private $table_name;

	function __construct()
	{
		parent::__construct();
		$this->table_name = 'branches';
		
	}

	public function insert_branch($form)
	{
		$data = array();

		
		$data['branch_company_id']	        = $form['branch_company_id'];
		$data['branch_code'] 				= $form['branch_code'];
		$data['branch_name'] 				= $form['branch_name'];
		$data['branch_location'] 			= $form['branch_location'];
		$data['branch_detail'] 				= $form['branch_detail'];
		$data['branch_status'] 				= $form['branch_status'];

		
		//print_f($data);
		//die();
			
		$this->insert($this->table_name, $data);

		return $this->row_count();

	} // end of insert

	public function update_branch($form, $id)
	{
		
		
		$data = array();

		
		$data['branch_company_id']	        = $form['branch_company_id'];
		$data['branch_code'] 				= $form['branch_code'];
		$data['branch_name'] 				= $form['branch_name'];
		$data['branch_location'] 			= $form['branch_location'];
		$data['branch_detail'] 				= $form['branch_detail'];
		$data['branch_status'] 				= $form['branch_status'];

		

		$this->where('branch_id', $id);
		$this->update($this->table_name, $data);

		if (!$this->row_count()) {
			return false;
		}
		
		

		return $this->row_count();

	} // end of update

	


	public function get_branches($ID = NULL)
	{
		if (isset($ID)) {
			$this->where('branch_id',$ID);
			$this->from($this->table_name);
			return $this->result();
		}
		else {
			$this->from($this->table_name);
			return $this->all_results();
		}
	} // end of get


	public function delete_branches($ID)
	{
		

		$this->where('branch_id', $ID);
		$this->delete($this->table_name, $num_rows = NULL);
		return true;

	}





} // end of class


 ?>