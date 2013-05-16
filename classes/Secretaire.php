<?php
class Secretaire{
	private $_idSecretaire;
	private $_login;
	private $_pass;

	function __construct(){

	}
        
        public function get_idSecretaire() { return $this->_idSecretaire; } 
        public function get_login() { return $this->_login; } 
        public function get_pass() { return $this->_pass; } 
        
        public function set_idSecretaire($x) { $this->_idSecretaire = $x; } 
        public function set_login($x) { $this->_login = $x; } 
        public function set_pass($x) { $this->_pass = $x; } 
}
?>
