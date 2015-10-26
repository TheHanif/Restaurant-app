<?php 
/**
* INVENTORY MAIN CLASS
*/
class branch_table extends database
{
	private $table_name;

	function __construct()
	{
		parent::__construct();
		$this->table_name = 'branch_tables';
		$this->table_branch = 'branches';
		
	}

	public function insert_branch_table($form)
	{
		$data = array();

		
		$data['branch_table_branch'] 		= $form['branch_table_branch'];
		$data['branch_table_company'] 		= $form['branch_table_company'];
		$data['branch_table_status'] 		= $form['branch_table_status'];

		if(isset($form['branch_table_name'])){
		$data['branch_table_name']	= json_encode($form['branch_table_name']) ;
		$data['branch_table_chairs'] = json_encode($form['branch_table_chairs']);}
		
		
		
		//print_f($data);
		//die();
			
		$this->insert($this->table_name, $data);

		return $this->row_count();

	} // end of insert

	public function update_branch_table($form, $id)
	{
		
		
		$data = array();

		
		
		$data['branch_table_branch'] 		= $form['branch_table_branch'];
		$data['branch_table_company'] 		= $form['branch_table_company'];
		$data['branch_table_status'] 		= $form['branch_table_status'];

		if(isset($form['branch_table_name'])){
		$data['branch_table_name']	= json_encode($form['branch_table_name']) ;
		$data['branch_table_chairs'] = json_encode($form['branch_table_chairs']);}
		
		

		$this->where('branch_table_id', $id);
		$this->update($this->table_name, $data);

		if (!$this->row_count()) {
			return false;
		}
		
		

		return $this->row_count();

	} // end of update

	


	public function get_branch_table($ID = NULL)
	{
		if (isset($ID)) {
			$this->where('branch_table_id',$ID);
			$this->from($this->table_name);
			return $this->result();
		}
		else {
			$this->from($this->table_name);
			return $this->all_results();
		}
	} // end of get


	public function delete_branch_table($ID)
	{
		

		$this->where('branch_table_id', $ID);
		$this->delete($this->table_name, $num_rows = NULL);
		return true;

	}


	





} // end of class


 ?>