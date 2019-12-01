<?php
$pdo=new Mypdo();
$salManager = new SalarieManager($pdo);
$salaries=$salManager->getAllSalarie();
$citManager = new CitationManager($pdo);
$motManager = new MotManager($pdo);
?>
<div class="sstitre"><h2>Ajouter une citation</h2></div>
<?php
  if (empty($_POST["cit"])) {
    ?>
    <form class="" action="#" method="post">
      <label for="prof">Enseignant</label>
      <select class="" name="prof">
        <?php
        foreach ($salaries as $salarie){
          ?>
          <option value=<?php echo $salarie->getPerNum(); ?>><?php echo $salarie->getPerPrenom(); ?></option>
          <?php
        }
        ?>
      </select>
      <br>
      <label for="date">Date Citation</label>
      <input type="date" name="date" value="">
      <br>
      <label for="cit">Citation</label>
      <textarea name="cit" rows="3" cols="30"></textarea>
      <br>
      <button type="submit" name="button">Valider</button>
    </form>
    <?php
  }

  if (!empty($_POST["cit"])) {
    $motInterdits = $motManager->getAllMotInterdit($_POST["cit"]);
    echo $_POST["date"];
    $res = $_POST["cit"];
    if(count($motInterdits) != 0){
      foreach ($motInterdits as $motInterdit) {
        echo "1";
        $res = str_replace($motInterdit->getMotInterdit(), '---', $res);
      }
      ?>
      <form class="" action="#" method="post">
        <label for="prof">Enseignant</label>
        <select class="" name="prof" value="<?php echo $_POST["prof"]; ?>">
          <?php
          foreach ($salaries as $salarie){
            if($salarie->getPerNum() == $_POST["prof"]){
              ?>
              <option selected value=<?php echo $salarie->getPerNum(); ?>><?php echo $salarie->getPerPrenom(); ?></option>
              <?php
            } else {
              ?>
              <option value=<?php echo $salarie->getPerNum(); ?>><?php echo $salarie->getPerPrenom(); ?></option>
              <?php
            }
          }
          ?>
        </select>
        <br>
        <label for="date">Date Citation</label>
        <input type="date" name="date" value="<?php echo $_POST["date"]; ?>">
        <br>
        <label for="cit">Citation</label>
        <textarea name="cit" rows="3" cols="30"><?php echo $res; ?></textarea>
        <br>
        <button type="submit" name="button">Valider</button>
      </form>
      <?php
      foreach ($motInterdits as $motInterdit) {
        ?><p><img src="image\erreur.png" alt="erreur" > le mot: <span style="color:red"><?php echo $motInterdit->getMotInterdit(); ?> </span> n'est pas athorisés</p><?php
      }
    }else {
      $date = new DateTime();
      date_default_timezone_set('Europe/Paris');
      $t=time();
      echo($t . "<br>");
      $now = date("Y-m-d H:i:s",$t);
      $citation = new Citation(array('per_num'=>$_POST["prof"],
                                    'per_num_etu'=>$_SESSION["pernum"],
                                    'libelle'=>$_POST["cit"],
                                    'cit_date'=>$_POST["date"],
                                    'cit_date_depo'=>$now,));
      $citManager->add($citation);
    }



  }




 ?>
