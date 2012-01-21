<?php defined('SYSPATH') or die('No direct script access.');
/**
 * The welcome controller, just home page and crap
 *
 * @package    3DMMonopoly
 * @category   Controllers
 * @author     Lowgain
 */
class Controller_Welcome extends Controller_Base {
	
	protected $_view_names = array(
		'index'    => 'home',
	);
	
	public function action_index()
	{
		// Since nothing dynamic is happening right now, this is left as is
	}

} // End Welcome
