<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Auth class, handles logging in and out, and checking logins.
 * Not to be confused with Kohana's Auth module
 *
 * @package    3DMMonopoly
 * @category   Authentication
 * @author     Lowgain
 */
class Auth {
	
	/**
	 * @var Session The session instance used
	 */
	protected static $session;
	
	/**
	 * Set the current session to be logged in as a specific user.
	 *
	 * @param int $user_id The ID of the user to login
	 * @return void
	 */
	public static function set_user($user_id)
	{
		if ( ! self::$session)
		{
			self::$session = Session::instance();
		}
		
		self::$session->set('user_id', $user_id);
	}
	
	/**
	 * Checks whether or not you are logged in.
	 *
	 * @return bool Whether or not you are logged in
	 */
	public static function logged_in()
	{
		if ( ! self::$session)
		{
			self::$session = Session::instance();
		}
		
		return (bool) self::$session->get('user_id');
	}
	
	/**
	 * Logs you out which essentially just clears the session.
	 *
	 * @return void
	 */
	public static function logout()
	{
		if ( ! self::$session)
		{
			self::$session = Session::instance();
		}
		
		self::$session->destroy();
	}
	
}