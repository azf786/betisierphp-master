
	<?php
	$pdo=new Mypdo();
	$perManager = new PersonneManager($pdo);
	$personnes=$perManager->getAllPersonne();
	$page=10;
	?>
	<div class="sstitre"><h2>Supprimer des personnes enregistrées</h2></div>

	<table>
		<tr><th>Numéro</th><th>Nom</th><th>Prenom</th><th>Supprimer</th></tr>
		<?php //$produits est un tableau d'objet produit
		foreach ($personnes as $personne){ //$produit est un objet produit
			if ($perManager->estEtudiant($personne->getNumPers()) == 1)
				$page=9;
				?>
				<td><a href="index.php?page=<?php echo $page; ?>&numC=<?php echo $personne->getNumPers(); ?>&nomC=<?php echo $personne->getNomPers(); ?>"><?php echo $personne->getNumPers();?></a></td>
				<td><?php echo $personne->getNomPers();?></td>
				<td><?php echo $personne->getPrenomPers();?></td>
				<td><a href="http://localhost/betisierphp-master/index.php?page=24&pernum=<?php echo $personne->getNumPers(); ?>"><img src="image\erreur.png" alt="tick" alt=""></a></td>
			</td></tr>
		<?php
	}?>
		</table>
		<br />
