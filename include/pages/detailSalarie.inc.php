<?php
$pdo=new Mypdo();
$salManager = new SalarieManager($pdo);
$salaries=$salManager->getDetailSalarie($_GET["numC"]);
?>
<div class="titre"><h2>Détail sur le salarie <?php echo $_GET["nomC"]; ?> </h2></div>

<table>
	<tr><th>Prénom</th><th>Mail</th><th>Tel</th><th>Tel pro</th><th>Fonction</th></tr>
	<?php //$produits est un tableau d'objet produit
	foreach ($salaries as $salarie){ //$produit est un objet produit?>
			<td><?php echo $salarie->getPerPrenom();?></td>
			<td><?php echo $salarie->getPerMail();?></td>
			<td><?php echo $salarie->getPerTel();?></td>
      <td><?php echo $salarie->getSalTel();?></td>
      <td><?php echo $salarie->getFonLibelle();?></td>
		</td></tr>
	<?php }?>
	</table>
	<br />
