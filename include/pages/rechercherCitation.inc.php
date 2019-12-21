<?php
$pdo=new Mypdo();
$citManager = new CitationManager($pdo);
$votManager = new VoteManager($pdo);
$perManager = new PersonneManager($pdo);
$salManager = new SalarieManager($pdo);
$salaries = $salManager->getAllSalarie();
$etudiant = $perManager->estEtudiant($_SESSION["pernum"]);
 ?>
<div class="sstitre"><h2>Rechercher une citation</h2></div>
<form class="" action="#" method="post">
  <label for="nom">Nom de l'enseignant</label>
  <select class="" name="nom">
    <option value=""></option>
    <?php
    foreach ($salaries as $salarie) {
      ?>
      <option value="<?php echo $salarie->getPerPrenom(). " ". $salarie->getPerNom(); ?>"><?php echo $salarie->getPerPrenom(). " ". $salarie->getPerNom(); ?></option>
      <?php
    }
     ?>
  </select>
  <label for="date">Date</label>
  <input type="date" name="date" value="">
  <label for="note">Note</label>
  <input type="number" name="note" value="">
  <button type="submit" name="rechercher">Rechercher</button>
</form>
<?php
  if(empty($_POST["nom"]) && empty($_POST["date"]) && empty($_POST["note"])) {
    $citations=$citManager->getAllCitationValide();
    ?>
    <br />
    <br />
    <br />
    <table>
    	<tr><th>Nom</th><th>Libelle</th><th>Date</th><th>Moyenne des notes</th></tr>

    	<?php
    	foreach ($citations as $citation){?>
      <tr>
    			<td><?php echo $citation->getNomEnseignant();?></td>
    			<td><?php echo $citation->getLibelle();?></td>
    			<?php $date = new DateTime($citation->getCitDate()); ?>
    			<td><?php echo $date->format('d/m/Y');?></td>
    			<td><?php echo $citation->getMoyenne();?></td>
      </tr>
    	<?php }?>
    	</table>
    <?php
  } else {
    if (empty($_POST["nom"])) {
      $nom = "%";
    }else {
      $nom = $_POST["nom"];
    }
    if (empty($_POST["date"])) {
      $date = "%";
    }else {
      $date = $_POST["date"];
    }

    if (empty($_POST["note"])) {
      $citations=$citManager->getCitations($nom, $date);
      ?>
      <br />
      <br />
      <br />
      <table>
        <tr><th>Nom</th><th>Libelle</th><th>Date</th><th>Moyenne des notes</th></tr>
        <?php
        foreach ($citations as $citation){?>
            <td><?php echo $citation->getNomEnseignant();?></td>
            <td><?php echo $citation->getLibelle();?></td>
            <?php $date = new DateTime($citation->getCitDate()); ?>
            <td><?php echo $date->format('d/m/Y');?></td>
            <td><?php echo $citation->getMoyenne();?></td>
        <?php }?>
        </table>
      <?php
    }else {
      $note = $_POST["note"];
      $citations=$citManager->getCitationsNotes($nom, $date,$note);
      ?>
      <br />
      <br />
      <br />
      <table>
        <tr><th>Nom</th><th>Libelle</th><th>Date</th><th>Moyenne des notes</th></tr>
        <?php
        foreach ($citations as $citation){?>
            <td><?php echo $citation->getNomEnseignant();?></td>
            <td><?php echo $citation->getLibelle();?></td>
            <?php $date = new DateTime($citation->getCitDate()); ?>
            <td><?php echo $date->format('d/m/Y');?></td>
            <td><?php echo $citation->getMoyenne();?></td>
        <?php }?>
        </table>
      <?php
    }

  }
 ?>
