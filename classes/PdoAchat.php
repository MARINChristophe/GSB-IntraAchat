<?php
class PdoAchat extends PdoGSB{
                
    public function __construct(){
        parent::__construct();
    }
    
    public function _destruct(){
        $pdoAchat = null;
    }
    
    public function create($o){
        $req = "INSERT INTO achat 
        (Type, Prix, Raison, Preuve, Status, IdVisiteur) 
        VALUES 
        ('".$o->get_type()."', '".$o->get_prix()."', '".$o->get_raison()."', '".$o->get_preuve()."', 'en cours','".$o->get_idVisiteur()."')";
        PdoGSB::$monPdo->query($req);
    }

    /*public function update($o){
        $req = "update secretaire set
            login=('".$o->get_login()."'), 
            pass=('".$o->get_pass()."')
            where idSecretaire=('".$o->get_idSecretaire()."')";
        PdoGSB::$monPdo->query($req);
    }

    public function delete($o){
        $req = "delete from secretaire
            where idSecretaire=('".$o->get_idSecretaire()."')";
        PdoGSB::$monPdo->query($req);
    }*/

    public function findById($id){
                $req = "SELECT * FROM achat WHERE IdVisiteur='".$id."'";
            if($rs = PdoGSB::$monPdo->query($req)){
                $ligne = $rs->fetchAll();
                return $ligne;
            }else{
                return false;
            }
    }

    public function findAll(){
        $req = "SELECT * FROM achat";
        if($rs = PdoGSB::$monPdo->query($req)){
                $ligne = $rs->fetchAll();
                return $ligne;
            }else{
                return false;
            }
    }
}
?>