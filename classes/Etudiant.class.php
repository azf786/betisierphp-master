<?php
class Etudiant extends Personne{
// Attributs
private $per_num;
private $per_prenom;
private $per_mail;
private $per_tel;
private $dep_nom;
private $vil_nom;
private $dep_num;
private $div_num;

public function __construct($valeurs = array()){
	if (!empty($valeurs))
			//print_r ($valeurs);
			 $this->affecte($valeurs);
}
public function affecte($donnees){
			foreach ($donnees as $attribut => $valeur){
					switch ($attribut){
							case 'per_prenom': $this->setPerPrenom($valeur); break;
							case 'per_mail': $this->setPerMail($valeur); break;
              case 'per_tel': $this->setPerTel($valeur); break;
              case 'dep_nom': $this->setDepNom($valeur); break;
							case 'vil_nom': $this->setVilNom($valeur); break;
							case 'per_num': $this->setPerNum($valeur); break;
							case 'dep_num': $this->setDepNum($valeur); break;
							case 'div_num': $this->setDivNum($valeur); break;
					}
			}
	}
public function getPerPrenom() {
        return $this->per_prenom;
    }
public function setPerPrenom($prenom){
        $this->per_prenom=$prenom;
    }

public function getPerMail(){
        return $this->per_mail;
    }
public function setPerMail($mail){
        $this->per_mail=$mail;
    }
public function getPerTel(){
        return $this->per_tel;
    }
public function setPerTel($tel){
        $this->per_tel = $tel;
    }
public function getDepNom(){
        return $this->dep_nom;
    }
public function setDepNom($dep_nom){
        $this->dep_nom = $dep_nom;
    }
		public function getVilNom(){
		        return $this->vil_nom;
		    }
		public function setVilNom($vil_nom){
		        $this->vil_nom = $vil_nom;
		    }

public function getPerNum(){
	return $this->per_num;
}
public function setPerNum($id){
	$this->per_num = $id;
}

public function getDepNum(){
	return $this->dep_num;
}
public function setDepNum($depNum){
	$this->dep_num = $depNum;
}

public function getDivNum(){
	return $this->div_num;
}
public function setDivNum($divNum){
	$this->div_num = $divNum;
}






}
