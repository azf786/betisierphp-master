

<?php
$pdo=new Mypdo();
$citManager = new CitationManager($pdo);
$citations=$citManager->getAllCitation();
$votManager = new VoteManager($pdo);
$perManager = new PersonneManager($pdo);
$etudiant = 0;
if(!empty($_SESSION["connect"])){
	$etudiant = $perManager->estEtudiant($_SESSION["pernum"]);
}
?>
<div class="sstitre"><h2>Liste des citation déposées</h2></div>


<table>
	<tr><th>Nom</th><th>Libelle</th><th>Date</th><th>Moyenne des notes</th><?php if ($etudiant == 1) {echo "<th>Noter</th>";} ?></tr>
	<?php
	foreach ($citations as $citation){?>
		<tr>
			<td><?php echo $citation->getNomEnseignant();?></td>
			<td><?php echo $citation->getLibelle();?></td>
			<?php $date = new DateTime($citation->getCitDate()); ?>
			<td><?php echo $date->format('d/m/Y');?></td>
			<td><?php echo $citation->getMoyenne();?></td>
			<?php
			if ($etudiant == 1) {
				?>
					<?php
					if (count($votManager->getVoteEtudiant($_SESSION["pernum"], $citation->getCitNum())) == 0) {
						?>
						<td><a href="http://localhost/betisierphp-master/index.php?page=17&citnum=<?php echo $citation->getCitNum(); ?>"><img src="image\modifier.png" alt="tick" alt=""></a></td>
						<?php
					}else {
						?>
						<td><img src="image\erreur.png" alt="tick" alt=""></td>
						<?php
					}
					 ?>
				</tr>
				<?php
			}
			 ?>
	<?php }?>
	</table>
	<br />
