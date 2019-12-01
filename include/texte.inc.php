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
	if (!empty($_SESSION["connect"])) {
		include_once('pages/listerPersonnes.inc.php');
	}else {
		include_once('pages/accueil.inc.php');
	}
    break;
case 3:
	// inclure ici la page modification des personnes
	if (!empty($_SESSION["connect"])) {
		include("pages/ModifierPersonne.inc.php");
	}else {
		include_once('pages/accueil.inc.php');
	}
    break;
case 4:
	// inclure ici la page suppression personnes
	include_once('pages/supprimerPersonne.inc.php');
    break;
//
// Citations
//
case 5:
	// inclure ici la page ajouter citations
    include("pages/ajouterCitation.inc.php");
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
	// inclure ici la page...
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
		include("pages/ajouterEtudiant.inc.php");
		break;
	case 16:
		include("pages/ajouterSalarie.inc.php");
		break;
	case 17:
		include("pages/ajouterVote.inc.php");
		break;
	case 18:
		include("pages/rechercherCitation.inc.php");
		break;
	case 19:
		include("pages/modifierPersonne.inc.php");
		break;
	case 20:
		include("pages/modifierEtudiant.inc.php");
		break;
default : 	include_once('pages/accueil.inc.php');
}

?>
</div>
