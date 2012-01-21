<?php defined('SYSPATH') or die('No direct script access.');

return array(
	'username' => array(
		'not_empty' => 'Hey dummy, enter a username!',
		'unique_username' => 'Stop trying to steal other people\'s usernames',
	),
	'email' => array(
		'not_empty' => 'What kind of moron forgets their email?',
		'email' => 'Hey asshole, learn how emails work',
		'unique_email' => 'Ha! Someone already used that email',
	),
	'password' => array(
		'not_empty' => 'Some idiot forgot to enter a password',
		'min_length' => 'Make the password at least 8 chars to not get hacked',
	),
	'confirm' => array(
		'matches' => 'Learn to type the same password twice'
	),
);