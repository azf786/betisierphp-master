<?php
$pdo=new Mypdo();
$fonManager = new FonctionManager($pdo);
$fonctions=$fonManager->getAllFonctions();

$salManager = new SalarieManager($pdo);
?>
<div class="sstitre"><h2>Ajouter un salarié</h2></div>
<?php
  if (empty($_POST["telFon"])) {
    ?>
    <form class="" action="#" method="post">
      <label for="telFon">Téléphone professionnel: </label>
      <input type="text" name="telFon" value="">
      <br>
      <label for="fon">Fonction: </label>
      <select class="" name="fon">
        <?php
        foreach ($fonctions as $fonction){ //$produit est un objet produit
          ?>
          <option value=<?php echo $fonction->getFonNum(); ?>><?php echo $fonction->getFonLibelle(); ?></option>
          <?php
        }
        ?>
      </select>
      <br>
      <button type="submit" name="button">Valider</button>
    </form>
    <?php
  }

  if(!empty($_POST["telFon"])) {

    $salarie = new Salarie(array('per_num'=>$_GET["num"],
                                  'sal_telprof'=>$_POST["telFon"],
                                  'fon_num'=>$_POST["fon"]));
    $salManager->add($salarie);
    ?>
      <p><img src="image\valid.png" alt="tick" > L'salarié à été ajouté</p>
    <?php

  }



 ?>
