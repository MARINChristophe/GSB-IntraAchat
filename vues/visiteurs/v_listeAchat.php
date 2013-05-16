<article>
	<h2>Vos achats</h2>


	<table cellspacing="10" align="center">
		<thead>
			<tr>
				<td>#</td>
				<td>Type</td>
				<td>Prix</td>
				<td>Raison</td>
				<td>Preuve</td>
				<td>Status</td>
			</tr>
		</thead>

	<?php

	for ($i=0;$i<count($liste);$i++) { 
		$idAchat = $liste[$i]['ID'];
		$type = $liste[$i]['Type'];
		$prix = $liste[$i]['Prix'];
		$raison = $liste[$i]['Raison'];
		$preuve = $liste[$i]['Preuve'];
		$status = $liste[$i]['Status']; ?>

		<tr>
			<td><?php echo $idAchat; ?></td>
			<td><?php echo $type; ?></td>
			<td><?php echo $prix; ?></td>
			<td><?php echo $raison; ?></td>
			<td><div class="preuve"><a href="#" onClick="window.open('upload/popup.php?preuve=<?php echo $preuve; ?>', 'Preuve achat', 'scrollbars=yes,width=400,height=500')"><?php echo $preuve; ?></a></div></td>
			<td><?php echo $status; ?></td>
		</tr>

	<?php
	}
	?>

	</table>
</article>