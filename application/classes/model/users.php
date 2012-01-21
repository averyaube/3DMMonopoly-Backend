<?php defined('SYSPATH') or die('No direct script access.');
/**
 * The users model. Handles registration, login, other stuff abt users.
 *
 * @package    3DMMonopoly
 * @category   Models
 * @author     Lowgain
 */
class Model_Users extends Model_Database {
	
	protected $_table_name = 'users';
	
	/**
	 * Register as a new user!
	 * 
	 * @param array $reg_info New user's details
	 * @return Database_Result
	 * @throws Validation_Exception
	 */
	public function register($reg_info)
	{
		// Validate the incoming data
		$validation = Validation::factory($reg_info)
			->rule('email', 'not_empty')
			->rule('email', 'email')
			->rule('email', array($this, 'unique_email'))
			->rule('username', 'not_empty')
			->rule('username', array($this, 'unique_username'))
			->rule('password', 'not_empty')
			->rule('password', 'min_length', array(':value', 8))
			->rule('confirm', 'matches', array(':validation', 'confirm', 'password'));
		
		// Throw an exception if data is invalid
		if ( ! $validation->check())
			throw new Validation_Exception($validation);
		
		// Password confirmation isn't a real field
		unset($reg_info['confirm'], $reg_info['yeaa']);
		
		$reg_info['password'] = Bonafide::instance()->hash($reg_info['password']);
		
		// If not, let's keep going!
		return DB::insert($this->_table_name, array_keys($reg_info))
			->values($reg_info)
			->execute($this->_db);
	}
	
	/**
	 * Register as a new user!
	 * 
	 * @param array $login_info Login credentials
	 * @return array List of user info
	 * @throws Validation_Exception
	 */
	public function login($login_info)
	{
		// Make sure fields are there
		$validation = Validation::factory($login_info)
			->rule('username', 'not_empty')
			->rule('password', 'not_empty');
		
		// Throw exception if not
		if ( ! $validation->check())
			throw new Validation_Exception($validation);
		
		// Select user based on username
		$res = DB::select('*')
			->from($this->_table_name)
			->where('username', '=', $login_info['username'])
			->execute();
		
		// If there's no user, add the error and throw exception
		if ($res->count() === 0)
		{
			$validation->error('username', 'exists');
			throw new Validation_Exception($validation);
		}
		
		// But if not, get the user and check the password
		$user = $res->current();
		
		if ( ! Bonafide::instance()->check($login_info['password'], $user['password']))
		{
			$validation->error('password', 'correct');
			throw new Validation_Exception($validation);
		}
		
		return $user;
	}
	
	/**
	 * Check whether or not an email is unique
	 *
	 * @param string $email Email address to check
	 * @return bool Whether or not it is unique
	 */ 
	public function unique_email($email)
	{
		return (DB::select(DB::expr('COUNT(*) as `c`'))
			->from($this->_table_name)
			->where('email', '=', $email)
			->execute()
			->get('c') === '0');
	}
	
	/**
	 * Check whether or not a username is unique
	 *
	 * @param string $username Username to check
	 * @return bool Whether or not it is unique
	 */ 
	public function unique_username($username)
	{
		return (DB::select(DB::expr('COUNT(*) as `c`'))
			->from($this->_table_name)
			->where('username', '=', $username)
			->execute()
			->get('c') === '0');
	}
	
}