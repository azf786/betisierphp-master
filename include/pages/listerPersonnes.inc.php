<?php
$pdo=new Mypdo();
$perManager = new PersonneManager($pdo);
$personnes=$perManager->getAllPersonne();
$page=10;
?>
<div class="sstitre"><h2>Liste des personne enregistré</h2></div>

<?php echo "<p> Actuellement ".$perManager->getNbrePersonne()." personne sont enregistrés";
echo sha1(sha1("BornToRun")."48@!alsd");
$_SESSION["name"]="gmail";
echo $_SESSION["name"];
?>


<table>
	<tr><th>Numéro</th><th>Nom</th><th>Prenom</th><th>Modifier</th></tr>
	<?php //$produits est un tableau d'objet produit
	foreach ($personnes as $personne){ //$produit est un objet produit
		if ($perManager->estEtudiant($personne->getNumPers()) == 1)
			$page=9;
			?>

			<td><a href="index.php?page=<?php echo $page; ?>&numC=<?php echo $personne->getNumPers(); ?>&nomC=<?php echo $personne->getNomPers(); ?>"><?php echo $personne->getNumPers();?></a></td>
			<td><?php echo $personne->getNomPers();?></td>
			<td><?php echo $personne->getPrenomPers();?></td>
			<td><a href="http://localhost/betisierphp-master/index.php?page=19&pernum=<?php echo $personne->getNumPers(); ?>"><img src="image\modifier.png" alt="tick" alt=""></a></td>
		</td></tr>
	<?php
}?>
	</table>
	<br />
