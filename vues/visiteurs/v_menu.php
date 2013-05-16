<?php 

if(isset($_SESSION['visiteur'])){ ?>

	<ul>
		<li><a href="index.php?uc=gestionVisiteur&section=info">Votre compte</a></li>
		
		<li><a href="index.php?uc=gestionVisiteur&section=liste">Vos achats</a></li>
		
		<li><a href="index.php?uc=gestionVisiteur&section=demande">Nouvelle demande</a></li>
		
		<li><a href="index.php?uc=visiteur&section=deconnexion">Deconnexion</a></li>
	</ul>

<?php

}

if(isset($_SESSION['secretaire'])){ ?>

	<ul>
		<li><a href="index.php?uc=gestionSecretaire&section=DEC">Demande en cours</a></li>
		
		<li><a href="index.php?uc=gestionSecretaire&section=DV">Demande validée</a></li>
		
		<li><a href="index.php?uc=gestionSecretaire&section=DR">Demande refusée</a></li>
		
		<li><a href="index.php?uc=visiteur&section=deconnexion">Deconnexion</a></li>
	</ul>

<?php

}

if(!isset($_SESSION['visiteur']) && !isset($_SESSION['secretaire'])){ ?>

	<ul>
		<li><a href="index.php">Accueil</a></li>
		
		<li><a href="index.php?uc=visiteur&section=compte">Création compte</a></li>
		
		<li><a href=""></a></li>
		
		<li><a href="index.php?uc=visiteur&section=connexion">Connexion</a></li>
	</ul>

<?php

}

?>





