<?php

/**
 * database.php
 *
 * application database configuration
 *
 * @package		TinyMVC
 * @author		Monte Ohrt
 */

$config['default']['plugin'] = 'TinyMVC_PDO'; // plugin for db access
$config['default']['type'] = 'mysql';      // connection type
$config['default']['host'] = 'localhost';  // db hostname
$config['default']['name'] = 'demo';     // db name
$config['default']['user'] = 'root';     // db username
$config['default']['pass'] = '';     // db password
$config['default']['persistent'] = false;  // db connection persistence?

	/*class Member_Model extends TinyMVC_Model{
		function get_members(){
			$this->db->query("SELECT * FROM Users");
			while($row = $this->db->next())
		    $results[] = $row;
		    return $results;
		}
		function get_member($id){
		    return $this->db->query_one("SELECT * FROM Users where id=?",array($id));
		}

	}*/

?>