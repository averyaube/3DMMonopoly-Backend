<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Base controller class. Can autorender views, instantiate a few things
 *
 * @package    3DMMonopoly
 * @category   Controllers
 * @author     Lowgain
 */
abstract class Controller_Base extends Controller {

	/**
	 * @var array List of ViewModel names for different actions
	 */
	protected $_view_names = array();

	/**
	 * @var Kostache The page's ViewModel
	 */
	protected $_view;
	
	/**
	 * @var Session The page's session instance
	 */
	protected $_session;
	
	/**
	 * @var bool Whether or not to automatically render a view
	 */
	protected $_auto_render = TRUE;
	
	public function before()
	{
		// Initialize viewmodel, if exists
		if (($view_name = Arr::get($this->_view_names, $this->request->action(), FALSE)) !== FALSE)
		{
			$view_class = "View_{$view_name}";
			$this->_view = new $view_class;
		}
		
		// Get session instance
		$this->_session = Session::instance();
	}
	
	public function after()
	{
		// If set, automatically render the view
		if ($this->_auto_render AND $this->_view !== NULL)
		{
			$this->response->body($this->_view);
		}
	}
	
	/**
	 * Determine whether or not a user is logged in
	 * 
	 * @return bool Is user logged in?
	 */
	protected function logged_in()
	{
		return (bool) $this->_session->get('user_id');
	}

} // End Base
