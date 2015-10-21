<?php 
/**
* INVENTORY MAIN CLASS
*/
class branch_user extends database
{
	private $table_name;

	function __construct()
	{
		parent::__construct();
		$this->table_name = 'branches_users';
		$this->table_branch = 'branches';
		
	}

	public function insert_branch_user($form)
	{
		$data = array();

		$data['branch_user_company_id']	        = $form['branch_user_company_id'];
		$data['branch_user_branch_id']	        = $form['branch_user_branch_id'];
		$data['branch_user_name'] 				= $form['branch_user_name'];
		$data['branch_user_email'] 				= $form['branch_user_email'];
		$data['branch_user_phone'] 				= $form['branch_user_phone'];
		$data['branch_user_address'] 			= $form['branch_user_address'];
		$data['branch_user_capabilities'] 		= json_encode($form['branch_user_capabilities']);
		$data['branch_user_status'] 			= $form['branch_user_status'];

		
		//print_f($data);
		//die();
			
		$this->insert($this->table_name, $data);

		return $this->row_count();

	} // end of insert

	public function update_branch_user($form, $id)
	{
		
		
		$data = array();

		
		$data['branch_user_company_id']	        = $form['branch_user_company_id'];
		$data['branch_user_branch_id']	        = $form['branch_user_branch_id'];
		$data['branch_user_name'] 				= $form['branch_user_name'];
		$data['branch_user_email'] 				= $form['branch_user_email'];
		$data['branch_user_phone'] 				= $form['branch_user_phone'];
		$data['branch_user_address'] 			= $form['branch_user_address'];
		$data['branch_user_capabilities'] 		= json_encode($form['branch_user_capabilities']);
		$data['branch_user_status'] 			= $form['branch_user_status'];

		

		$this->where('branch_user_id', $id);
		$this->update($this->table_name, $data);

		if (!$this->row_count()) {
			return false;
		}
		
		

		return $this->row_count();

	} // end of update

	


	public function get_branch_user($ID = NULL)
	{
		if (isset($ID)) {
			$this->where('branch_user_id',$ID);
			$this->from($this->table_name);
			return $this->result();
		}
		else {
			$this->from($this->table_name);
			return $this->all_results();
		}
	} // end of get


	public function delete_branch_user($ID)
	{
		

		$this->where('branch_user_id', $ID);
		$this->delete($this->table_name, $num_rows = NULL);
		return true;

	}


	public function get_branches_of_company($company_id)
	{
		
			$this->where('branch_company_id',$company_id);
			$this->from($this->table_branch);
			return $this->result();
		
	} // end of get





} // end of class


 ?>