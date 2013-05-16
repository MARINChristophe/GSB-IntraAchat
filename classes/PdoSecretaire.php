<?php
class PdoSecretaire extends PdoGSB{
                
    public function __construct(){
        parent::__construct();
    }
    
    public function _destruct(){
        $pdoSecretaire = null;
    }
    
    public function create($o){
        $req = "INSERT INTO secretaire 
        (login, pass) 
        VALUES 
        ('".$o->get_login()."', '".$o->get_pass()."')";
        PdoGSB::$monPdo->query($req);
    }

    public function update($o){
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
    }

    public function findById($id){
                $req = "select *
            from secretaire
            where idSecretaire='".$id."'";
            if($rs = PdoGSB::$monPdo->query($req)){
                $ligne = $rs->fetch();
                return $ligne;
            }else{
                return false;
            }
    }

    public function findAll(){
        $req = "select *
            from secretaire";
        if($rs = PdoGSB::$monPdo->query($req)){
                $ligne = $rs->fetchAll();
                return $ligne;
            }else{
                return false;
            }
    }

    public function findDEC(){
        $req = "SELECT * FROM achat WHERE status = 'en cours'";
        if($rs = PdoGSB::$monPdo->query($req)){
                $ligne = $rs->fetchAll();
                return $ligne;
            }else{
                return false;
            }
    }

    public function findDV(){
        $req = "SELECT * FROM achat WHERE status = 'Valide'";
        if($rs = PdoGSB::$monPdo->query($req)){
                $ligne = $rs->fetchAll();
                return $ligne;
            }else{
                return false;
            }
    }

    public function findDR(){
        $req = "SELECT * FROM achat WHERE status = 'Refuse'";
        if($rs = PdoGSB::$monPdo->query($req)){
                $ligne = $rs->fetchAll();
                return $ligne;
            }else{
                return false;
            }
    }

    public function valide($id){
        $req = "UPDATE achat SET status = 'Valide' WHERE id = '".$id."'";
        PdoGSB::$monPdo->query($req);
    }

    public function refuse($id){
        $req = "UPDATE achat SET status = 'Refuse' WHERE id = '".$id."'";
        PdoGSB::$monPdo->query($req);
    }

    public function connexion($login, $pass){
        $req = "select *
        from secretaire where login='".$login."' and pass='".$pass."'";
        if($rs = pdoGSB::$monPdo->query($req)){
            $ligne = $rs->fetch();
            return $ligne;
        }else{
            return false;
        }
    }
}
?>