<?php
/**
 * Performs install/uninstall methods for the School Sync plugin
 *
 * PHP version 5
 * LICENSE: This source file is subject to LGPL license 
 * that is available through the world-wide-web at the following URI:
 * http://www.gnu.org/copyleft/lesser.html
 * @author	   Brenda Wallace <shiny@cpan.org>
 * @package    http://eq.org.nz
 * @module	   School Sync - keeps our incident reports in sync of MinEdu school spreadsheets
 * @copyright  Ushahidi - http://www.ushahidi.com
 * @license    http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License (LGPL) 
 */

class Schoolsync_Install {

	/**
	 * Constructor to load the shared database library
	 */
	public function __construct()
	{
		$this->db = Database::instance();
	}

	/**
	 * Creates the required database tables for the smssync plugin
	 */
	public function run_install()
	{
		// Create the database tables.
		// Also include table_prefix in name
		$this->db->query("
			CREATE TABLE IF NOT EXISTS `".Kohana::config('database.default.table_prefix')."mapsync` (
			objectid int NOT NULL,
			feed_name varchar(255) not null,
			asset_name text not null,
			incident_id int unique,
			primary key(objectid, feed_name)
			
		      );");
	}

	/**
	 * Deletes the database tables for the actionable module
	 */
	public function uninstall()
	{
// 		$this->db->query('DROP TABLE `'.Kohana::config('database.default.table_prefix').'mapsync`');
	}
}