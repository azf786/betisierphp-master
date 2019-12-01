<?php
$pdo=new Mypdo();
$vilManager = new VilleManager($pdo);
?>
<div class="sstitre"><h2>Ajouter une ville</h2></div>
<?php
  if (empty($_POST["nom"])) {
    echo (rand(10, 30) . "<br>");
    ?>
    <form class="" action="#" method="post">
      <label for="nom">Nom: </label>
      <input type="text" name="nom" value="">
      <button type="submit" name="button">Valider</button>
    </form>
    <?php
  }else {
    $ville = new Ville(array('vil_nom'=>$_POST["nom"]));
    $vilManager->add($ville);
    echo "la ville ".$ville->getVilNom()." à été ajouter";
  }

 ?>
