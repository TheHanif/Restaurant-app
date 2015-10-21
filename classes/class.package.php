<?php 
/**
* INVENTORY MAIN CLASS
*/
class package extends database
{
	private $table_name;
	public $packages_status; // Status array

	function __construct()
	{
		parent::__construct();
		$this->table_name = 'packages';
		
		// Posible status for package
		$this->packages_status = array();
		$this->packages_status['active']	= 'Active';
		$this->packages_status['deactive'] 	= 'Deactive';
	}

	public function insert_package($form)
	{
		$data = array();

		$data['package_unique_id'] = $form['package_unique_id'];
		$data['package_name'] = $form['package_name'];
		$data['package_detail'] = $form['package_desc'];
		$data['package_features'] = json_encode($form['package_features']);
		$data['package_status'] = $form['package_status'];
		
		//print_f($data);
		//die();
			
		$this->insert($this->table_name, $data);

		return $this->row_count();

	} // end of insert

	public function update_package($form, $id)
	{
		
		
		$data = array();

		$data['package_unique_id'] = $form['package_unique_id'];
		$data['package_name'] = $form['package_name'];
		$data['package_detail'] = $form['package_desc'];
		$data['package_features'] = json_encode($form['package_features']);
		$data['package_status'] = $form['package_status'];

		$this->where('package_id', $id);
		$this->update($this->table_name, $data);

		if (!$this->row_count()) {
			return false;
		}
		
		

		return $this->row_count();

	} // end of update

	


	public function get_packages($ID = NULL)
	{
		if (isset($ID)) {
			$this->where('package_id',$ID);
			$this->from($this->table_name);
			return $this->result();
		}
		else {
			$this->from($this->table_name);
			return $this->all_results();
		}
	} // end of get


	public function delete_packages($ID)
	{
		

		$this->where('package_id', $ID);
		$this->delete($this->table_name, $num_rows = NULL);
		return true;

	}





} // end of class


 ?>