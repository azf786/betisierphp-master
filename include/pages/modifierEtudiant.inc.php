<?php
$pdo=new Mypdo();
$divManager = new DivisionManager($pdo);
$divisions=$divManager->getAllDivision();
$depManager = new DepartementManager($pdo);
$departements=$depManager->getAllDepartement();
$etuManager = new EtudiantManager($pdo);
$etudiants = $etuManager->getDetailEtudiant($_GET["num"]);
?>
<div class="sstitre"><h2>Ajouter un étudiant</h2></div>
<?php
foreach ($etudiants as $etudiant) {
  $etu = $etudiant;
  echo $etu->getDivNum();
}
 ?>
    <form class="" action="#" method="post">
      <label for="div">Année: </label>
      <select class="" name="div">
        <?php
        foreach ($divisions as $division){
           if ($division->getDivNum() == $etu->getDivNum()) {
             ?><option value=<?php echo $division->getDivNum(); ?> selected><?php echo $division->getDivNom(); ?></option><?php
           }else {
             ?>
             <option value=<?php echo $division->getDivNum(); ?>><?php echo $division->getDivNom(); ?></option>
             <?php
           }
        }
        ?>
      </select>
      <br>
      <label for="dep">Année: </label>
      <select class="" name="dep">
        <?php
        foreach ($departements as $departement){
          if ($departement->getDepNum() == $etu->getDepNum()) {
            ?><option value=<?php echo $departement->getDepNum(); ?> selected><?php echo $departement->getDepNom(); ?></option><?php
          }else {
            ?>
            <option value=<?php echo $departement->getDepNum(); ?>><?php echo $departement->getDepNom(); ?></option>
            <?php
          }
        }
        ?>
      </select>
      <br>
      <button type="submit" name="button">Valider</button>
    </form>
