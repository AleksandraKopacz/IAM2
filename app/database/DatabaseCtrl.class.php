<?php
require_once $conf->root_path.'/lib/medoo.min.php';

use Medoo\Medoo;

class DatabaseCtrl{
	private $db;		
	public function __construct(){
				
	$this->db = new Medoo([
		'type' => 'mysql',
		'host' => 'localhost',
		'database' => 'framework',
		'username' => 'root',
		'password' => '',
	]);
		
	}	
	public function connector(){
		return $this->db;
	}
	//var_dump($this->db->error());		
}
