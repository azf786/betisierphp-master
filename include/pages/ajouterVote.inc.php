<?php
$pdo=new Mypdo();
$votManager = new VoteManager($pdo);
?>
<div class="sstitre"><h2>Ajouter un étudiant</h2></div>
<?php
  if (empty($_POST["vote"])) {
    ?>
    <form class="" action="#" method="post">
      <label for="vote">Note: </label>
      <input type="number" name="vote" value="">
      <button type="submit" name="button">Valider</button>
    </form>
    <?php
  }

  if (!empty($_POST["vote"])) {
    if ($_POST["vote"]>=0 && $_POST["vote"]<=20) {
      $vote = new Vote(array('cit_num'=>$_GET["citnum"],
                            'per_num'=>$_SESSION["pernum"],
                            'vot_valeur'=>$_POST["vote"],));
      $votManager->add($vote);
      ?>

      <?php
      header("refresh:2;http://localhost/betisierphp-master/index.php?page=6");
    }


  }



 ?>
