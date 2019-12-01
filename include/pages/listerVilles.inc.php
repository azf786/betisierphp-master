
<?php
$pdo=new Mypdo();
$vilManager = new VilleManager($pdo);
$villes=$vilManager->getAllVille();
?>
<div class="sstitre"><h2>Liste des villes</h2></div>

<?php echo "<p> Actuellement ".$vilManager->getNbreVilles()." viles sont enregistrés"; ?>

<table>
	<tr><th>Numéro</th><th>Nom</th></tr>
	<?php //$produits est un tableau d'objet produit
	foreach ($villes as $ville){ //$produit est un objet produit?>
			<td><?php echo $ville->getVilNum();?></td>
			<td><?php echo $ville->getVilNom();?></td>
		</td></tr>
	<?php }?>
	</table>
	<br />
