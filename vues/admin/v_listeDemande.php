<article>
	<?php 
	if($_GET['section'] == "DEC"){
		echo "<h2>Demande en cours</h2>";
	}

	if($_GET['section'] == "DV"){
		echo "<h2>Demande validée</h2>";
	}

	if($_GET['section'] == "DR"){
		echo "<h2>Demande refusée</h2>";
	}
	?>


	<table cellspacing="10" align="center">
		<thead>
			<tr>
				<td>#</td>
				<td>idVisiteur</td>
				<td>Type</td>
				<td>Prix</td>
				<td>Raison</td>
				<td>Preuve</td>
				<td>Status</td>
<?php if($_GET['section'] == "DEC"){ echo "<td>Valider</td>"; echo "<td>Refuser</td>"; } ?>
			</tr>
		</thead>

	<?php

	for ($i=0;$i<count($liste);$i++) { 
		$idAchat = $liste[$i]['ID'];
		$idVisiteur = $liste[$i]['IdVisiteur'];
		$type = $liste[$i]['Type'];
		$prix = $liste[$i]['Prix'];
		$raison = $liste[$i]['Raison'];
		$preuve = $liste[$i]['Preuve'];
		$status = $liste[$i]['Status']; ?>

		<tr>
			<td><?php echo $idAchat; ?></td>
			<td><?php echo $idVisiteur; ?></td>
			<td><?php echo $type; ?></td>
			<td><?php echo $prix; ?></td>
			<td><?php echo $raison; ?></td>
			<td><div class="preuve"><a href="#" onClick="window.open('upload/popup.php?preuve=<?php echo $preuve; ?>', 'Preuve achat', 'scrollbars=yes,width=400,height=500')"><?php echo $preuve; ?></a></div></td>
			<td><?php echo $status; ?></td>

	<?php if($_GET['section'] == "DEC"){ ?>
			<td><a href="index.php?uc=gestionSecretaire&section=valider&idachat=<?php echo $idAchat; ?>" onClick="return(confirm('Etes-vous sur de vouloir valider cette demande ?'));"><img src="images/valide.png"></a></td>
			<td><a href="index.php?uc=gestionSecretaire&section=refuser&idachat=<?php echo $idAchat; ?>" onClick="return(confirm('Etes-vous sur de vouloir refuser cette demande ?'));"><img src="images/refuse.png"></td>
	<?php } ?>

		</tr>

	<?php
	}
	?>

	</table>
</article>