<?php defined('SYSPATH') or die('No direct script access.');
return array(
	'default' => array(
		'mechanisms' => array(
			'crypt' => array('crypt', array(
				'type' => 'blowfish',
				'iterations' => 10,
			)),
		),
	),
);