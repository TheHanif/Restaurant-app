<?php 
/**
* INVENTORY MAIN CLASS
*/
class user_role extends database
{
	private $table_name;

	function __construct()
	{
		parent::__construct();
		$this->table_name = 'user_roles';
		$this->table_branch = 'branches';
		
	}

	public function insert_user_role($form)
	{
		$data = array();

		$data['user_role_name']	        = $form['user_role_name'];
	    $data['user_role_status']	    = $form['user_role_status'];
		

		
		//print_f($data);
		//die();
			
		$this->insert($this->table_name, $data);

		return $this->row_count();

	} // end of insert

	public function update_user_role($form, $id)
	{
		
		
		$data = array();

		
		$data['user_role_name']	        = $form['user_role_name'];
	    $data['user_role_status']	    = $form['user_role_status'];
		
		
		$this->where('user_role_id', $id);
		$this->update($this->table_name, $data);

		if (!$this->row_count()) {
			return false;
		}
		
		

		return $this->row_count();

	} // end of update

	


	public function get_user_role($ID = NULL)
	{
		if (isset($ID)) {
			$this->where('user_role_id',$ID);
			$this->from($this->table_name);
			return $this->result();
		}
		else {
			$this->from($this->table_name);
			return $this->all_results();
		}
	} // end of get


	public function delete_user_role($ID)
	{
		

		$this->where('user_role_id', $ID);
		$this->delete($this->table_name, $num_rows = NULL);
		return true;

	}


	





} // end of class


 ?>