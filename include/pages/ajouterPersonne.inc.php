<?php
$pdo=new Mypdo();
$perManager = new PersonneManager($pdo);
?>
<div class="sstitre"><h2>Ajouter une personne</h2></div>
<?php
  if (empty($_POST["nom"])) {
    ?>
    <form class="" action="#" method="post">
      <label for="nom">Nom: </label>
      <input type="text" name="nom" value=""> <br>
			<label for="prenom">Prénom: </label>
      <input type="text" name="prenom" value=""> <br>
			<label for="tel">Téléphone: </label>
      <input type="text" name="tel" value=""> <br>
			<label for="email">Email: </label>
      <input type="email" name="email" value=""> <br>
      <label for="login">Login: </label>
      <input type="text" name="login" value=""> <br>
			<label for="mdp">Mot de passe: </label>
      <input type="password" name="mdp" value=""> <br>
			<label for="categorie">Catégorie</label>
			<input type="radio" name="categorie" value="Etudiant">Etudiant
			<input type="radio" name="categorie" value="Personnel">Personnel <br>
      <button type="submit" name="button">Valider</button>
    </form>
    <?php
  }

  if (!empty($_POST["nom"])) {
    $admin = 0;
    if($_POST["categorie"] == "Personnel"){
      $admin = 1;
    }
    echo $admin;
    $personne = new Personne(array('per_nom'=>$_POST["nom"],
                                  'per_prenom'=>$_POST["prenom"],
                                  'per_tel'=>$_POST["tel"],
                                  'per_mail'=>$_POST["email"],
                                  'per_admin'=>$admin,
                                  'per_login'=>$_POST["login"],
                                  'per_pwd'=>sha1(sha1($_POST["mdp"])."48@!alsd"),));

    $num = $perManager->add($personne);

    if($_POST["categorie"] == "Etudiant"){
      header("Location: index.php?page=15&num=".$num);
    }

    if($_POST["categorie"] == "Personnel"){
      header("Location: index.php?page=16&num=".$num);
    }

  }



 ?>
