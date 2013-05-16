<?php
class Visiteur{
	private $_idVisiteur;
	private $_nomVisiteur;
	private $_prenomVisiteur;
	private $_login;
	private $_pass;
        private $_credit;
        private $_depense;

	function __construct(){

	}
        
        public function get_idVisiteur() { return $this->_idVisiteur; } 
        public function get_nomVisiteur() { return $this->_nomVisiteur; } 
        public function get_prenomVisiteur() { return $this->_prenomVisiteur; } 
        public function get_login() { return $this->_login; } 
        public function get_pass() { return $this->_pass; } 
        public function get_credit() { return $this->_credit; }
        public function get_depense() { return $this->_depense; }
        
        public function set_idVisiteur($x) { $this->_idVisiteur = $x; } 
        public function set_nomVisiteur($x) { $this->_nomVisiteur = $x; } 
        public function set_prenomVisiteur($x) { $this->_prenomVisiteur = $x; } 
        public function set_login($x) { $this->_login = $x; } 
        public function set_pass($x) { $this->_pass = $x; } 
        public function set_credit($x) { $this->_credit = $x; }
        public function set_depense($x) { $this->_depense = $x; }
}
?>
