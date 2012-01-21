<?php defined('SYSPATH') or die('No direct script access.');
/**
 * The account controller, handles login, registration, etc.
 *
 * @package    3DMMonopoly
 * @category   Controllers
 * @author     Lowgain
 */
class Controller_Account extends Controller_Base {
	
	protected $_view_names = array(
		'login'    => 'login',
		'register' => 'register',
	);
	
	public function action_login()
	{
		// If login credentials have been POSTed, try logging in
		if (($post = $this->request->post('login')) !== NULL)
		{
			$this->_view->errors = array("Login not implemented yet");
		}
	}
	
	public function action_register()
	{
		// If registration info has been POSTed, try signing up
		if (($post = $this->request->post('register')) !== NULL)
		{
			$this->_view->errors = array("Registration not implemented yet");
		}
	}

} // End Account
