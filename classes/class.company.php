<?php 
/**
* INVENTORY MAIN CLASS
*/
class company extends database
{
	private $table_name;

	function __construct()
	{
		parent::__construct();
		$this->table_name = 'companies';
		
	}

	public function insert_company($form)
	{
		$data = array();

		
		$data['company_name'] = $form['company_name'];
		$data['company_location'] = $form['company_location'];
		$data['company_detail'] = $form['company_detail'];
		$data['company_status'] = $form['company_status'];
		$data['company_branch_count'] = $form['company_branch_count'];

		
		//print_f($data);
		//die();
			
		$this->insert($this->table_name, $data);

		return $this->row_count();

	} // end of insert

	public function update_company($form, $id)
	{
		
		
		$data = array();

		
		$data['company_name'] = $form['company_name'];
		$data['company_location'] = $form['company_location'];
		$data['company_detail'] = $form['company_detail'];
		$data['company_status'] = $form['company_status'];
		$data['company_branch_count'] = $form['company_branch_count'];

		

		$this->where('company_id', $id);
		$this->update($this->table_name, $data);

		if (!$this->row_count()) {
			return false;
		}
		
		

		return $this->row_count();

	} // end of update

	


	public function get_companies($ID = NULL)
	{
		if (isset($ID)) {
			$this->where('company_id',$ID);
			$this->from($this->table_name);
			return $this->result();
		}
		else {
			$this->from($this->table_name);
			return $this->all_results();
		}
	} // end of get


	public function delete_companies($ID)
	{
		

		$this->where('company_id', $ID);
		$this->delete($this->table_name, $num_rows = NULL);
		return true;

	}





} // end of class


 ?>