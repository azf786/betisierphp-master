
<div class="titre"><h2>Pour vous connecter</h2></div>
<?php if(empty($_POST["login"]) && empty($_POST["pwd"]) && empty($_POST["confirmation"])) {?>
  <form action ="#" method = "post" id = "formConst">
    <label for="login">Nom d'Utilisateur</label>
    <input type="text" name="login">
    <br />
    <label for="pwd">Mot de passe</label>
    <input type="password" name="pwd">
    <br />
    <?php
      $img1 = rand(1,9);
      $img2 = rand(1,9);
     ?>
    <label for="confirmation"><img src="<?php echo "image\\nb\\".$img1.".jpg"; ?>" height="42" width="42" > + <img src="<?php echo "image\\nb\\".$img2.".jpg"; ?>" height="42" width="42"></label>
    <input type="text" name="confirmation">
    <input type="hidden" name="somme" value=<?php echo $img1 + $img2; ?>>
    <br />
    <button type="submit" name="button">Valider</button>
  </form>
<?php }  ?>
<br />


<?php
if(!empty($_POST["login"]) && !empty($_POST["pwd"]) && !empty($_POST["confirmation"])) {?>
  <?php
  if($_POST["confirmation"] == $_POST["somme"]){
    $pdo=new Mypdo();
    $conConnexion = new ConnexionManager($pdo);
    $connexion=$conConnexion->getConnexion($_POST["login"], sha1(sha1($_POST["pwd"])."48@!alsd"));
    if($connexion==1){
        $_SESSION["connect"] = 1;
        echo $_SESSION["connect"];
        $_SESSION["login"] = $_POST["login"];
        $connexions = $conConnexion->getConnecter($_POST["login"], sha1(sha1($_POST["pwd"])."48@!alsd"));
        foreach ($connexions as $personne) {
          $_SESSION["admin"] = $personne->getPerAdmin();
          $_SESSION["pernum"] = $personne->getPerNum();
        }
        ?>
        <p><img src="image\valid.png" alt="tick" > Vous avez bien été connecté:</p>
        <p>Redirection automatique dans 2 secondes.</p>
        <?php
        header("refresh:2;http://localhost/betisierphp-master/index.php?page=0");
    }
    else {
      ?>
      <form action ="#" method = "post" id = "formConst">
        <label for="login">Nom d'Utilisateur</label>
        <input type="text" name="login">
        <br />
        <label for="pwd">Mot de passe</label>
        <input type="password" name="pwd">
        <br />
        <?php
          $img1 = rand(1,9);
          $img2 = rand(1,9);
         ?>
        <label for="confirmation"><img src="<?php echo "image\\nb\\".$img1.".jpg"; ?>" height="42" width="42" > + <img src="<?php echo "image\\nb\\".$img2.".jpg"; ?>" height="42" width="42"></label>
        <input type="text" name="confirmation">
        <input type="hidden" name="somme" value=<?php echo $img1 + $img2; ?>>
        <br />
        <button type="submit" name="button">Valider</button>
        <p style="color:#FF0000";>les identifiants sont incorrects, Veuillez reesseyez</p>
      </form>
      <?php
    }
  }
  else {
    ?>
    <form action ="#" method = "post" id = "formConst">
      <label for="login">Nom d'Utilisateur</label>
      <input type="text" name="login">
      <br />
      <label for="pwd">Mot de passe</label>
      <input type="password" name="pwd">
      <br />
      <?php
        $img1 = rand(1,9);
        $img2 = rand(1,9);
       ?>
      <label for="confirmation"><img src="<?php echo "image\\nb\\".$img1.".jpg"; ?>" height="42" width="42" > + <img src="<?php echo "image\\nb\\".$img2.".jpg"; ?>" height="42" width="42"></label>
      <input type="text" name="confirmation">
      <input type="hidden" name="somme" value=<?php echo $img1 + $img2; ?>>
      <br />
      <button type="submit" name="button">Valider</button>
      <p style="color:#FF0000";>Donner la somme des deux chiffres</p>
    </form>
    <?php
  }
}
