<?php
if(!empty($_POST["login"])) { ?>
  <?php
  if($_POST["confirmation"] == $_SESSION["sum"]){
    $pdo=new Mypdo();
    $conConnexion = new ConnexionManager($pdo);
    $connexion=$conConnexion->getConnexion($_POST["login"], sha1(sha1($_POST["pwd"])."48@!alsd"));
    echo $connexion;
    if($connexion==1){
        $_SESSION["connect"] = 1;
        echo $_SESSION["connect"];
        $_SESSION["login"] = $_POST["login"];
        $connexions = $conConnexion->getConnecter($_POST["login"], sha1(sha1($_POST["pwd"])."48@!alsd"));
        foreach ($connexions as $personne) {
          $_SESSION["admin"] = $personne->getPerAdmin();
          $_SESSION["pernum"] = $personne->getPerNum();
  }
}
}
}


if(!empty($_SESSION["connect"])){
  ?>
  <p><img src="image\valid.png" alt="tick" > Vous avez bien été connecté:</p>
  <p>Redirection automatique dans 2 secondes.</p>
  <?php
  header("refresh:2;http://localhost/betisierphp-master/index.php?page=0");
  //exit();
}

if (empty($_SESSION["connect"])) {
  ?>
  <form action =# method = "post" id = "formConst">
    <label for="login">Nom d'Utilisateur</label>
    <input type="text" name="login">
    <br />
    <label for="pwd">Mot de passe</label>
    <input type="password" name="pwd">
    <br />
    <label for="confirmation"><img src="C:\wamp64\www\betisierphp-master\image\nb\8.jpg" height="42" width="42" > + <img src="C:\wamp64\www\betisierphp-master\image\nb\5.jpg" height="42" width="42"></label>
    <input type="text" name="confirmation">
    <br />
    <button type="submit" name="button">Valider</button>
  </form>
  <?php
  echo "Votre identifiant ou mot de passe est incorrecte";
}

 ?>
