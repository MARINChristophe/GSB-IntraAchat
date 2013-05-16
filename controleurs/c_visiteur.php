<?php 

$section = $_REQUEST['section'];
if(isset($_REQUEST['section'])){
	switch ($section) {
		case 'connexion':
			if(isset($_POST['connexion'])){
				$login = $_POST['login'];
				$pass = md5($_POST['pass']);

				$visiteur = $PdoVisiteur->connexion($login, $pass);
				$secretaire = $PdoSecretaire->connexion($login, $pass);
			}

			if(isset($visiteur) && is_array($visiteur)){
				$idVisiteur = $visiteur['ID'];

				$infoVisiteur = $PdoVisiteur->findById($idVisiteur);

				$_SESSION['nom'] = $infoVisiteur['Nom'];
				$_SESSION['prenom'] = $infoVisiteur['Prenom'];
				$_SESSION['credit'] = $infoVisiteur['Credit'];
				$_SESSION['visiteur'] = $idVisiteur;

				header("Location:index.php");
			} else {
				if(isset($secretaire) && is_array($secretaire)){
					$idSecretaire = $secretaire['id'];

					$infoSecretaire = $PdoSecretaire->findById($idSecretaire);
	
					$_SESSION['secretaire'] = $login;

					header("Location:index.php?uc=gestionSecretaire&section=DEC");
				} else {
					include("vues/visiteurs/v_connexion.php");
				}
			}			
			break;

		case 'deconnexion':
			session_unset();
 			session_destroy();

 			header("Location:index.php");
 			break;

		case 'compte':
			include("vues/visiteurs/v_creerCompte.php");
			break;
		
		case 'creer':
			if(isset($_POST['creerVisiteur'])){
				// Récupération des variables du visiteur a créer
				$nom = $_POST['nom'];
				$prenom = $_POST['prenom'];
				$login = $_POST['login'];
				$pass = md5($_POST['pass']);
				$credit = $_POST['credit'];
	
				// set des valeurs récupéré et insertion du visiteur dans la bdd avec le pdo
				$o = new Visiteur();
				$o->set_nomVisiteur($nom);
				$o->set_prenomVisiteur($prenom);
				$o->set_login($login);
				$o->set_pass($pass);
				$o->set_credit($credit);
				$PdoVisiteur->create($o);

				header('Location:index.php');
			}

			include("vues/visiteurs/v_creerVisiteur.php");
			break;

		default:
			include("vues/visiteurs/v_e404.php");
			break;
	}
}

?>