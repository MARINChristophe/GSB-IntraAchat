<?php 

$section = $_REQUEST['section'];
if(isset($_REQUEST['section'])){
	switch ($section) {
		case 'DEC': // Demande en cours
			$liste = $PdoSecretaire->findDEC();

			include("vues/admin/v_listeDemande.php");
			break;

		case 'DV': // Demande Validée
			$liste = $PdoSecretaire->findDV();

			include ("vues/admin/v_listeDemande.php");
			break;

		case 'DR': // Demande Refusée
			$liste = $PdoSecretaire->findDR();

			include ("vues/admin/v_listeDemande.php");
			break;

		case 'valider':
			$idAchat = $_GET['idachat'];
			$PdoSecretaire->valide($idAchat);

			header("Location:index.php?uc=gestionSecretaire&section=DV");
			break;

		case 'refuser':
			$idAchat = $_GET['idachat'];
			$PdoSecretaire->refuse($idAchat);

			header("Location:index.php?uc=gestionSecretaire&section=DR");
			break;

		default:
			include("vues/visiteurs/v_e404.php");
			break;
	}
}

?>