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
			try
			{
				// Register a User
				$model = new Model_Users;
				$model->register($post);
				
				// Login User
				
				// Redirect to another page
			}
			catch(Validation_Exception $e)
			{
				// Display the errors
				$this->_view->errors = array_values($e->array->errors('register'));
			}
		}
	}

} // End Account
