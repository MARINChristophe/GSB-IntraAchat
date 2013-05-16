<?php

abstract class PdoGSB implements IDAO {
	
	private static $serveur='mysql:host=localhost';
	private static $bdd='dbname=gsb_intrachat';
	private static $user='root' ;
	private static $mdp='1234' ;
	protected static $monPdo;
	
	public function __construct(){
		PdoGSB::$monPdo = new PDO(PdoGSB::$serveur.';'.PdoGSB::$bdd, PdoGSB::$user, PdoGSB::$mdp);
		PdoGSB::$monPdo->query("SET CHARACTER SET utf8");
	}
	
	public function create($o){}
	
	public function update($o){}
	
	public function delete($o){}
	
	public function findById($id){}
	
	public  function findAll(){}
	
}
?>