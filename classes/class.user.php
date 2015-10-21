<?php
/**
* Global User class
*/
class user extends database
{
	
	function __construct()
	{	
		parent::__construct();
	}

	public function do_login($login_name, $password)
	{
		// Filter password
		$password = md5($password);

		// Prepare where statement
		$this->where('user_login', $login_name);
		$this->where('user_password', $password);

		// From table
		$this->from('users');

		// If provided info is correct, login user
		if ($this->row_count() > 0) {
			
			$results = $this->result();

			$_SESSION['is_logged_in'] = true;

			$_SESSION['logged_id_data'] = $results;

			return true;
		}else{
			return false;
		}
	} // do_login()

	// Get login status
	public static function is_logged_in()
	{	
		if (isset($_SESSION['is_logged_in'])) {
			return true;
		}else{
			return false;
		}
	} // end of is_logged_in()


	public function session_destroy(){
		unset($_SESSION['is_logged_in']);
		session_destroy();
	}
}