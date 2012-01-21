<?php defined('SYSPATH') or die('No direct script access.');

return array(
	'username' => array(
		'not_empty' => 'Hey dummy, enter a username!',
		'exists' => 'That is not a real user you liar',
	),
	'password' => array(
		'not_empty' => 'Some idiot forgot to enter a password',
		'correct' => 'You don\'t even know the password what a moron',
	),
);