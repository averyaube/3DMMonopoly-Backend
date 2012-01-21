<?php defined('SYSPATH') or die('No direct script access.');
return array(
	'default' => array(
		'mechanisms' => array(
			'bcrypt' => array('bcrypt', array(
				'cost' => 6,
			)),
		),
	),
);