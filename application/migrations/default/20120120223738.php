<?php defined('SYSPATH') or die('No direct script access.');

class Migration_Default_20120120223738 extends Minion_Migration_Base {

	/**
	 * Run queries needed to apply this migration
	 *
	 * @param Kohana_Database Database connection
	 */
	public function up(Kohana_Database $db)
	{
		// Create the users table
		$db->query(NULL, 'CREATE TABLE `users` 
			(`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
			`username` VARCHAR(32) NOT NULL,
			`password` CHAR(60) NOT NULL,
			`email` VARCHAR(128) NOT NULL,
			`name` VARCHAR(128) NOT NULL,
			UNIQUE (`username`, `email`))
			ENGINE = InnoDB;');
	}

	/**
	 * Run queries needed to remove this migration
	 *
	 * @param Kohana_Database Database connection
	 */
	public function down(Kohana_Database $db)
	{
		// Remove the users table
		$db->query(NULL, 'DROP TABLE users');
	}
}