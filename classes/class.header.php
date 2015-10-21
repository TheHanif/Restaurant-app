<?php 
/**
* INVENTORY MAIN CLASS
*/
class header extends database
{
	private $table_name;

	function __construct()
	{
		parent::__construct();
		$this->table_company = 'companies';
		
	}

	


	public function get_companies($ID)
	{
		
		$this->where('company_id',$ID);
		$this->from($this->table_company);
		return $this->result();
		
	} // end of get


	public function create_company_session($comapny_id)
	{
		if(isset($_SESSION['super_admin'])){

			unset($_SESSION['super_admin']);
		}
		
		if(isset($_SESSION['company_id'])){

			unset($_SESSION['company_id']);
		}

		$_SESSION['company_id'] = $comapny_id;
		
		return $_SESSION['company_id'];
	} // end 


	public function create_admin_session()
	{
		if(isset($_SESSION['company_id'])){
			
			unset($_SESSION['company_id']);
		}

		$_SESSION['super_admin'] = 'yes';
		
		return $_SESSION['super_admin'];
	} // end 
	

} // end of class


 ?>