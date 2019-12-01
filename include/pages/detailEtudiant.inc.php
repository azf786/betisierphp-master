<?php

$pdo=new Mypdo();
$etuManager = new EtudiantManager($pdo);
$etudiants=$etuManager->getDetailEtudiant($_GET["numC"]);
echo $_SESSION["name"];
?>
<div class="titre"><h2>Détail sur l'étudiant <?php echo $_GET["nomC"]; ?> </h2></div>

<table>
	<tr><th>Prénom</th><th>Mail</th><th>Tel</th><th>Departement</th><th>Ville</th></tr>
	<?php //$produits est un tableau d'objet produit
	foreach ($etudiants as $etudiant){ //$produit est un objet produit?>
			<td><?php echo $etudiant->getPerPrenom();?></td>
			<td><?php echo $etudiant->getPerMail();?></td>
			<td><?php echo $etudiant->getPerTel();?></td>
      <td><?php echo $etudiant->getDepNom();?></td>
      <td><?php echo $etudiant->getVilNom();?></td>
		</td></tr>
	<?php }?>
	</table>
	<br />
