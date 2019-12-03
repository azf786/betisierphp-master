<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <?php
		$title = "Bienvenue sur le site du bétisier de l'IUT.";?>
		<title>
      <img src="image/smile.jpg" alt="">
		<?php echo $title ?>
		</title>
		<link rel="stylesheet" type="text/css" href="css/stylesheet.css" />
    <?php
    session_start();
     ?>
</head>
	<body>
	<div id="header">
		<div id="connect">
      <?php
      if(empty($_SESSION["connect"])){?>
        <a href="http://localhost/betisierphp-master/index.php?page=13">Connexion</a>
        <?php
      } ?>
      <?php
      if(!empty($_SESSION["connect"])){
        ?>
        <a href="http://localhost/betisierphp-master/index.php?page=12">Utilisateur: <?php echo $_SESSION["login"]; ?> Deconnexion</a>
        <?php
      } ?>

		</div>
		<div id="entete">
			<div id="logo">

			</div>
			<div id="titre">
				Le bétisier de l'IUT,<br />Partagez les meilleures perles !!!
			</div>
		</div>
	</div>
