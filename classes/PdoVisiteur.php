<?php
class PdoVisiteur extends PdoGSB{
                
    public function __construct(){
        parent::__construct();
    }
    
    public function _destruct(){
        $pdoVisiteur = null;
    }
    
    public function create($o){
        $req = "INSERT INTO visiteur 
        (nom, prenom, login, pass, credit) 
        VALUES 
        ('".$o->get_nomVisiteur()."', '".$o->get_prenomVisiteur()."', '".$o->get_login()."', 
        '".$o->get_pass()."', '".$o->get_credit()."')";
        PdoGSB::$monPdo->query($req);
    }

    public function update($o){
        $req = "UPDATE visiteur SET credit=('".$o->get_credit()."'),
            depense=('".$o->get_depense()."')
            where ID=('".$o->get_idVisiteur()."')";
        PdoGSB::$monPdo->query($req);
    }
    
    public function delete($o){
        $req = "delete from visiteur
            where ID=('".$o->get_idVisiteur()."')";
        PdoGSB::$monPdo->query($req);
    }

    public function findById($id){
                $req = "select *
            from visiteur
            where ID=".$id."";
            if($rs = PdoGSB::$monPdo->query($req)){
                $ligne = $rs->fetch();
                return $ligne;
            }else{
                return false;
            }
    }

    public function findAll(){
        $req = "select *
            from visiteur";
        if($rs = PdoGSB::$monPdo->query($req)){
                $ligne = $rs->fetchAll();
                return $ligne;
            }else{
                return false;
            }
    }

    public function connexion($login, $pass){
        $req = "select *
        from visiteur where login='".$login."' and pass='".$pass."'";
        if($rs = pdoGSB::$monPdo->query($req)){
            $ligne = $rs->fetch();
            return $ligne;
        }else{
            return false;
        }
    }
}
?>