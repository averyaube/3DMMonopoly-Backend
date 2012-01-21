<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Base view class. Sets the defaults for the majority of views in 3DMMonopoly.
 *
 * @package    3DMMonopoly
 * @category   Views
 * @author     Lowgain
 */
class View_Base extends Kostache_Layout {
	
	/**
	 * @var string The site's name
	 */
	public $site_name = '3DMMonopoly';
	
	// Cool let's set some default partials
	protected $_partials = array(
		'errors' => 'partials/errors',
	);
	
}