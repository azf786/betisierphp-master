<?php
$pdo=new Mypdo();
$perManager = new PersonneManager($pdo);
$personnes = $perManager->getPersonne($_GET["pernum"]);
?>
	<h1>Modifier une personne enregistrées</h1>
	<?php
	 	foreach ($personnes as $personne) {
	 		$per = $personne;
	 	}
		echo sha1(sha1($per->getPwdPers()."48@!alsd"));
	 ?>
	    <form class="" action="#" method="post">
	      <label for="nom">Nom: </label>
	      <input type="text" name="nom" value="<?php echo $per->getNomPers(); ?>"> <br>
				<label for="prenom">Prénom: </label>
	      <input type="text" name="prenom" value="<?php echo $per->getPrenomPers(); ?>"> <br>
				<label for="tel">Téléphone: </label>
	      <input type="text" name="tel" value="<?php echo $per->getTelPers(); ?>"> <br>
				<label for="email">Email: </label>
	      <input type="email" name="email" value="<?php echo $per->getMailPers(); ?>"> <br>
	      <label for="login">Login: </label>
	      <input type="text" name="login" value="<?php echo $per->getLoginPers(); ?>"> <br>
				<label for="mdp">Mot de passe: </label>
	      <input type="password" name="mdp" value="<?php echo $per->getPwdPers(); ?>"> <br>
				<label for="categorie">
				</label>
				<?php
				if ($per->getAdminPers() == 1) {
					?>
					<input type="radio" name="categorie" value="Etudiant" >Etudiant
					<input type="radio" name="categorie" value="Personnel" checked="checked">Personnel <br>
					<?php
				}else {
					?>
					<input type="radio" name="categorie" value= 0  checked="checked">Etudiant
					<input type="radio" name="categorie" value= 1 >Personnel <br>
					<?php
				}
				 ?>
	      <button type="submit" name="button">Valider</button>
	    </form>
<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		if($_POST["mdp"] != $per->getPwdPers()){
			$personne = new Personne(array('per_num'=>$_GET["pernum"],
																		'per_nom'=>$_POST["nom"],
	                                  'per_prenom'=>$_POST["prenom"],
	                                  'per_tel'=>$_POST["tel"],
	                                  'per_mail'=>$_POST["email"],
	                                  'per_admin'=>$_POST["categorie"],
	                                  'per_login'=>$_POST["login"],
	                                  'per_pwd'=>sha1(sha1($_POST["mdp"])."48@!alsd"),));
			print_r($personne);
	    $perManager->updatePersonneAvecPwd($personne);

			if($_POST["categorie"] == 0){
	      header("Location: index.php?page=20&num=".$_GET["pernum"]);
	    }

	    if($_POST["categorie"] == "Personnel"){
	      header("Location: index.php?page=16&num=".$_GET["pernum"]);
	    }
		}
	}
 ?>
