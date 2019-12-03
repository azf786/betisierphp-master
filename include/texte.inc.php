<div id="texte">
<?php
if (!empty($_GET["page"])){
	$page=$_GET["page"];}
	else
	{$page=0;
	}
switch ($page) {
//
// Personnes
//

case 0:
	// inclure ici la page accueil photo
	include_once('pages/accueil.inc.php');
	break;
case 1:
	// inclure ici la page insertion nouvelle personne
	if (!empty($_SESSION["connect"])) {
		include("pages/ajouterPersonne.inc.php");
	}else {
		include_once('pages/accueil.inc.php');
	}
  break;

case 2:
	// inclure ici la page liste des personnes
		include_once('pages/listerPersonnes.inc.php');
    break;
case 3:
	// inclure ici la page modification des personnes
	if (!empty($_SESSION["connect"]) && $_SESSION["admin"] == 1) {
		include("pages/ModifierPersonne.inc.php");
	}else {
		include_once('pages/accueil.inc.php');
	}
    break;
case 4:
	if (!empty($_SESSION["connect"]) && $_SESSION["admin"] == 1) {
		include_once('pages/supprimerPersonne.inc.php');
	}else {
		include_once('pages/accueil.inc.php');
	}
  break;
//
// Citations
//
case 5:
	if (!empty($_SESSION["connect"]) && $_SESSION["admin"] == 0) {
		include("pages/ajouterCitation.inc.php");
	}else {
		include_once('pages/accueil.inc.php');
	}
  break;

case 6:
	// inclure ici la page liste des citations
	include("pages/listerCitation.inc.php");
    break;
//
// Villes
//

case 7:
	// inclure ici la page ajouter ville
	if (!empty($_SESSION["connect"])) {
		include_once('pages/ajouterVille.inc.php');
	}else {
		include_once('pages/accueil.inc.php');
	}
    break;

case 8:
// inclure ici la page lister  ville
	include("pages/listerVilles.inc.php");
    break;

//

//
case 9:
		include("pages/detailEtudiant.inc.php");
    break;
case 10:
		include("pages/detailSalarie.inc.php");
    break;

case 11:
	if (!empty($_SESSION["connect"]) && $_SESSION["admin"] == 1) {
		include("pages/validerCitation.inc.php");
	}else {
		include_once('pages/accueil.inc.php');
	}
  break;

case 12:
		include_once('pages/accueil1.inc.php');
    break;
case 13:
	include("pages/connexion.inc.php");
	break;
	case 14:
		include("pages/connexion1.inc.php");
		break;
	case 15:
		if (!empty($_SESSION["connect"])) {
			include("pages/ajouterEtudiant.inc.php");
		}else {
			include_once('pages/accueil.inc.php');
		}
		break;
	case 16:
		if (!empty($_SESSION["connect"])) {
			include("pages/ajouterSalarie.inc.php");
		}else {
			include_once('pages/accueil.inc.php');
		}
		break;
	case 17:
		if (!empty($_SESSION["connect"]) && $_SESSION["admin"] == 0) {
			include("pages/ajouterVote.inc.php");
		}else {
			include_once('pages/accueil.inc.php');
		}
		break;
	case 18:
		if (!empty($_SESSION["connect"])) {
			include("pages/rechercherCitation.inc.php");
		}else {
			include_once('pages/accueil.inc.php');
		}
		break;
	case 19:
		if (!empty($_SESSION["connect"]) && $_SESSION["admin"] == 1) {
			include("pages/modifierPersonne.inc.php");
		}else {
			include_once('pages/accueil.inc.php');
		}
		break;
	case 20:
		if (!empty($_SESSION["connect"]) && $_SESSION["admin"] == 1) {
			include("pages/modifierEtudiant.inc.php");
		}else {
			include_once('pages/accueil.inc.php');
		}

		break;
	case 21:
		if (!empty($_SESSION["connect"]) && $_SESSION["admin"] == 1) {
			include("pages/modifierSalarie.inc.php");
		}else {
			include_once('pages/accueil.inc.php');
		}

		break;
	case 22:
		if (!empty($_SESSION["connect"]) && $_SESSION["admin"] == 1) {
			include("pages/validerCitation1.inc.php");
		}else {
			include_once('pages/accueil.inc.php');
		}
		break;
	case 23:
		if (!empty($_SESSION["connect"]) && $_SESSION["admin"] == 1) {
			include("pages/supprimerCitation.inc.php");
		}else {
			include_once('pages/accueil.inc.php');
		}
		break;
	case 24:
		if (!empty($_SESSION["connect"]) && $_SESSION["admin"] == 1) {
			include("pages/supprimerPersonne1.inc.php");
		}else {
			include_once('pages/accueil.inc.php');
		}
		break;
	case 25:
		if (!empty($_SESSION["connect"]) && $_SESSION["admin"] == 1) {
			include("pages/supprimerCitation1.inc.php");
		}else {
			include_once('pages/accueil.inc.php');
		}
		break;
default : 	include_once('pages/accueil.inc.php');
}

?>
</div>
