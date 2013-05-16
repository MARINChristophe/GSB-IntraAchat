<?php 

$section = $_REQUEST['section'];
if(isset($_REQUEST['section'])){
	switch ($section) {
		
		case 'creer':
			if(isset($_POST['creerSecretaire'])){
				// Récupération des variables du visiteur a créer
				$login = $_POST['login'];
				$pass = md5($_POST['pass']);

				// set des valeurs récupéré et insertion du visiteur dans la bdd avec le pdo
				$o = new Secretaire();
				$o->set_login($login);
				$o->set_pass($pass);
				$PdoSecretaire->create($o);

				header('Location:index.php');
			}

			include("vues/admin/v_creerSecretaire.php");
			break;

		default:
			include("vues/visiteurs/v_e404.php");
			break;
	}
}

?>