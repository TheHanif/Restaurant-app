<?php
/**
* Global User class
*/
class user extends database
{
	private $table_name;

	function __construct()
	{	
		parent::__construct();

		$this->table_name = 'users';
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
			print_f('frgiojio');
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


public function insert_user($form)
	{
		$data = array();

		$password 	= md5($form['user_password']);
		$data['user_first_name'] = $form['user_first_name'];
		$data['user_last_name'] = $form['user_last_name'];
		$data['user_display_name'] = $form['user_display_name'];
		$data['user_email'] = $form['user_email'];
		$data['user_login'] = $form['user_login'];
		$data['user_role'] = json_encode($form['user_role']);
		$data['user_status'] = $form['user_status'];
		$data['user_password'] = $password;

		if (!empty($_FILES['user_img']['tmp_name'])){

			$uploaddir = ABSPATH.'/assets/images/uploads/';
			$uploadfilename =rand(1,99999) .basename($_FILES['user_img']['name']);
			$uploadfile = $uploaddir . $uploadfilename ;
			if (move_uploaded_file($_FILES['user_img']['tmp_name'], $uploadfile)) {
				$data['user_img'] = $uploadfilename;
			}
		
		}  
		//print_f($data);
		//die();
			
		$this->insert($this->table_name, $data);

		return $this->row_count();

	} // end of insert

	public function update_user($form, $id)
	{
		
		
		$data = array();

		
		$password 	= md5($form['user_password']);
		$data['user_first_name'] = $form['user_first_name'];
		$data['user_last_name'] = $form['user_last_name'];
		$data['user_display_name'] = $form['user_display_name'];
		$data['user_email'] = $form['user_email'];
		$data['user_login'] = $form['user_login'];
		$data['user_role'] = json_encode($form['user_role']);
		$data['user_status'] = $form['user_status'];
		$data['user_password'] = $password;

		if (!empty($_FILES['user_img']['tmp_name'])){
		$uploaddir = ABSPATH.'/assets/images/uploads/';
		$uploadfilename =rand(1,99999) .basename($_FILES['user_img']['name']);
		$uploadfile = $uploaddir . $uploadfilename ;
		if (move_uploaded_file($_FILES['user_img']['tmp_name'], $uploadfile)) {
			$data['user_img'] = $uploadfilename;
		} }
		else {
          $data['user_img'] = $form['user_img1'];
        }


		$this->where('user_id', $id);
		$this->update($this->table_name, $data);

		if (!$this->row_count()) {
			return false;
		}
		
		

		return $this->row_count();

	} // end of update


	public function get_user($ID = NULL)
	{
		if (isset($ID)) {
			$this->where('user_id',$ID);
			$this->from($this->table_name);
			return $this->result();
		}
		else {
			$this->from($this->table_name);
			return $this->all_results();
		}
	} // end of get

	public function delete_user($selectid)
	{
		

		$this->where('user_id', $selectid);
		if($this->delete($this->table_name, $num_rows = NULL)){
			return true;
		}else{
			return false;
		}
		
	}


}//end class