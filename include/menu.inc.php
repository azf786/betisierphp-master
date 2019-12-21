<div id="menu">
	<div id="menuInt">
		<p><a href="index.php?page=0"><img class = "icone" src="image/accueil.gif"  alt="Accueil"/>Accueil</a></p>
		<p><img class = "icone" src="image/personne.png" alt="Personne"/>Personne</p>
		<ul>
			<li><a href="index.php?page=2">Lister</a></li>
			<?php if (!empty($_SESSION["connect"])) {
				?><li><a href="index.php?page=1">Ajouter</a></li><?php
			} ?>
			<?php if (!empty($_SESSION["connect"]) && $_SESSION["admin"] == 1) {
				?><li><a href="index.php?page=4">Supprimer</a></li><?php
			} ?>

		</ul>
		<p><img class="icone" src="image/citation.gif"  alt="Citation"/>Citations</p>
		<ul>
			<?php if (!empty($_SESSION["connect"]) && $_SESSION["admin"] == 0) {
				?><li><a href="index.php?page=5">Ajouter</a></li><?php
			} ?>
			<li><a href="index.php?page=6">Lister</a></li>
			<?php if (!empty($_SESSION["connect"])) {
				?><li><a href="index.php?page=18">Rechercher</a></li><?php
			} ?>
			<?php if (!empty($_SESSION["connect"]) && $_SESSION["admin"] == 1) {
				?><li><a href="index.php?page=11">Valider</a></li><?php
			} ?>
			<?php if (!empty($_SESSION["connect"]) && $_SESSION["admin"] == 1) {
				?><li><a href="index.php?page=23">Supprimer</a></li><?php
			} ?>
		</ul>
		<p><img class = "icone" src="image/ville.png" alt="Ville"/>Ville</p>
		<ul>
			<li><a href="index.php?page=8">Lister</a></li>
			<?php if (!empty($_SESSION["connect"])) {
				?><li><a href="index.php?page=7">Ajouter</a></li><?php
			} ?>
			<?php if (!empty($_SESSION["connect"])) {
				?><li><a href="index.php?page=11">Modifier</a></li><?php
			} ?>
			<?php if (!empty($_SESSION["connect"]) && $_SESSION["admin"] == 1) {
				?><li><a href="index.php?page=26">Supprimer</a></li><?php
			} ?>

		</ul>
	</div>
</div>
