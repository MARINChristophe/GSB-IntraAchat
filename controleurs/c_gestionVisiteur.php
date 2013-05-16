<?php 

$section = $_REQUEST['section'];
if(isset($_REQUEST['section'])){
	switch ($section) {
		case 'info':
			$id = $_SESSION['visiteur'];
			$infoVisiteur = $PdoVisiteur->findById($id);

			$login = $infoVisiteur['Login'];
			$nom = $infoVisiteur['Nom'];
			$prenom = $infoVisiteur['Prenom'];
			$credit = $infoVisiteur['Credit'];
			$depense = $infoVisiteur['Depense'];

			include("vues/visiteurs/v_infoVisiteur.php");
			break;

		case 'liste':
			$id = $_SESSION['visiteur'];
			$liste = $PdoAchat->findById($id);

			include ("vues/visiteurs/v_listeAchat.php");
			break;
		
		case 'demande':
			if(isset($_POST['creerDemande'])){
				$type = $_POST['type'];
				$prix = $_POST['prix'];
				$raison = $_POST['raison'];
				$idVisiteur = $_SESSION['visiteur'];


				/* 
					Code pour l'upload du fichier 
					http://antoine-herault.developpez.com/tutoriels/php/upload/
				*/

				$dossier = 'upload/';
				$preuve = basename($_FILES['preuve']['name']);
				$taille_maxi = 100000;
				$taille = filesize($_FILES['preuve']['tmp_name']);
				$extensions = array('.png', '.gif', '.jpg', '.jpeg', '.pdf');
				$extension = strrchr($_FILES['preuve']['name'], '.'); 
				//Début des vérifications de sécurité...
				if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
				{
				    $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc...';
				}
				if($taille>$taille_maxi)
				{
				    $erreur = 'Le fichier est trop gros...';
				}
				if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
				{
				    //On formate le nom du fichier ici...
				    $preuve = strtr($preuve, 
				         'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
				         'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
				    $preuve = preg_replace('/([^.a-z0-9]+)/i', '-', $preuve);
				    if(move_uploaded_file($_FILES['preuve']['tmp_name'], $dossier . $preuve)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
				    {
				        echo 'Upload effectué avec succès !';

				        // Récupération des valeurs pour pouvoir update le compte
				        $infoVisiteur = $PdoVisiteur->findById($idVisiteur);
				        $credit = $infoVisiteur['Credit'];
				        $credit = $credit - $prix;
				        $depense = $infoVisiteur['Depense'];
				        $depense = $depense + $prix;

				        $v = new Visiteur();
				        $v->set_credit($credit);
				        $v->set_depense($depense);
				        $v->set_idVisiteur($idVisiteur);
				        $PdoVisiteur->update($v);

				        // Insertion des données dans la table achat
				        $o = new Achat();
						$o->set_type($type);
						$o->set_prix($prix);
						$o->set_raison($raison);
						$o->set_preuve($preuve);
						$o->set_idVisiteur($idVisiteur);
						$PdoAchat->create($o);
		
						header("Location:index.php?uc=gestionVisiteur&section=demande");
				    }
				    else //Sinon (la fonction renvoie FALSE).
				    {
				        echo 'Echec de l\'upload !';
				    }
				}
				else
				{
				    echo $erreur;
				}
			}

			include("vues/visiteurs/v_demande.php");
			break;

		default:
			include("vues/visiteurs/v_e404.php");
			break;
	}
}

?>