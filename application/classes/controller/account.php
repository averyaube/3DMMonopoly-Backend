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
		'logout' => FALSE,
	);
	
	/**
	 * Handles the submission of login credentials.
	 * If successful, will log you in and redirect to home.
	 * If not, will output relevant errors.
	 *
	 * @return void
	 */
	public function action_login()
	{
		// If login credentials have been POSTed, try logging in
		if (($post = $this->request->post('login')) !== NULL)
		{
			// Let's try logging in
			try
			{
				$model = new Model_Users;
				$user = $model->login($post);
				
				// Login User
				Auth::set_user($user['id']);
				
				// Redirect to another page
				$this->request->redirect('/');
			}
			catch (Validation_Exception $e)
			{
				// Display the errors
				$this->_view->errors = array_values($e->array->errors('login'));
			}
		}
	}
	
	/**
	 * Handles the submission of registration info.
	 * If successful, will create user, log you in and redirect to home.
	 * If not, will output relevant errors.
	 *
	 * @return void
	 */
	public function action_register()
	{
		// If registration info has been POSTed, try signing up
		if (($post = $this->request->post('register')) !== NULL)
		{
			try
			{
				// Register a User
				$model = new Model_Users;
				$res = $model->register($post);
				
				// Login User
				Auth::set_user($res[0]);
				
				// Redirect to another page
				$this->request->redirect('/');
			}
			catch (Validation_Exception $e)
			{
				// Display the errors
				$this->_view->errors = array_values($e->array->errors('register'));
			}
		}
	}
	
	/**
	 * Logs you out, simple as that
	 *
	 * @return void
	 */
	public function action_logout()
	{
		Auth::logout();
		$this->request->redirect('/');
	}

} // End Account
