<?php

ob_start();
session_start();

// Include des différentes classes et pdo
require_once("classes/IDAO.php");
require_once("classes/PdoGSB.php");

require_once("classes/Visiteur.php");
require_once("classes/PdoVisiteur.php");

require_once("classes/Secretaire.php");
require_once("classes/PdoSecretaire.php");

require_once("classes/Achat.php");
require_once("classes/PdoAchat.php");

// Instanciation des Pdo
$PdoVisiteur = new PdoVisiteur();
$PdoSecretaire = new PdoSecretaire();
$PdoAchat = new PdoAchat();


// Include du header
include("vues/visiteurs/v_header.php");

if(isset($_REQUEST['uc'])){
	$uc = $_REQUEST['uc'];

	switch ($uc) {
		case 'visiteur':
			include("controleurs/c_visiteur.php");
			break;

		case 'secretaire':
			include("controleurs/c_secretaire.php");
			break;

		case 'gestionVisiteur':
			include("controleurs/c_gestionVisiteur.php");
			break;

		case 'gestionSecretaire':
			include("controleurs/c_gestionSecretaire.php");
			break;
		
		default:
			include("vues/visiteurs/v_e404.php");
			break;
	}
} else {
	include("vues/visiteurs/v_accueil.php");
}

// Include du footer
include("vues/visiteurs/v_footer.php");

ob_end_flush();

?>