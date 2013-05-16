<?php
class Achat{
	private $_idAchat;
	private $_type;
        private $_prix;
	private $_raison;
	private $_preuve;
        private $_status;
	private $_idVisiteur;

	function __construct(){

	}
        
        public function get_idAchat() { return $this->_idAchat; } 
        public function get_type() { return $this->_type; } 
        public function get_prix() { return $this->_prix; }
        public function get_raison() { return $this->_raison; } 
        public function get_preuve() { return $this->_preuve; }
        public function get_status() { return $this->_status; }
        public function get_idVisiteur() { return $this->_idVisiteur; } 
        
        public function set_idAchat($x) { $this->_idAchat = $x; } 
        public function set_type($x) { $this->_type = $x; } 
        public function set_prix($x) { $this->_prix = $x; }
        public function set_raison($x) { $this->_raison = $x; } 
        public function set_preuve($x) { $this->_preuve = $x; }
        public function set_status($x) { $this->_status = $x; }
        public function set_idVisiteur($x) { $this->_idVisiteur = $x; }
}
?>
