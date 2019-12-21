<?php
$pdo=new Mypdo();
$divManager = new DivisionManager($pdo);
$divisions=$divManager->getAllDivision();
$depManager = new DepartementManager($pdo);
$departements=$depManager->getAllDepartement();
$etuManager = new EtudiantManager($pdo);
$perManager = new PersonneManager($pdo);
$personne = unserialize($_SESSION["personne"]);
?>
<div class="sstitre"><h2>Ajouter un étudiant</h2></div>
<?php
  if (empty($_POST["div"])) {
    ?>
    <form class="" action="#" method="post">
      <label for="div">Année: </label>
      <select class="" name="div">
        <?php
        foreach ($divisions as $division){ //$produit est un objet produit
          ?>
          <option value=<?php echo $division->getDivNum(); ?>><?php echo $division->getDivNom(); ?></option>
          <?php
        }
        ?>
      </select>
      <br>
      <label for="dep">Année: </label>
      <select class="" name="dep">
        <?php
        foreach ($departements as $departement){ //$produit est un objet produit
          ?>
          <option value=<?php echo $departement->getDepNum(); ?>><?php echo $departement->getDepNom(); ?></option>
          <?php
        }
        ?>
      </select>
      <br>
      <button type="submit" name="button">Valider</button>
    </form>
    <?php
  }

  if (!empty($_POST["div"])) {

    $num = $perManager->add($personne);
    unset ($_SESSION["personne"]);
    $etudiant = new Etudiant(array('per_num'=>$num,
                                  'dep_num'=>$_POST["dep"],
                                  'div_num'=>$_POST["div"],));
    $etuManager->add($etudiant);
    ?>
      <p><img src="image\valid.png" alt="tick" > L'etudiant à été ajouté</p>
    <?php

  }



 ?>
