<?php
class Departement {
// Attributs
private $dep_num;
private $dep_nom;

public function __construct($valeurs = array()){
	if (!empty($valeurs))
			//print_r ($valeurs);
			 $this->affecte($valeurs);
}
public function affecte($donnees){
			foreach ($donnees as $attribut => $valeur){
					switch ($attribut){
							case 'dep_num': $this->setDepNum($valeur); break;
							case 'dep_nom': $this->setDepNom($valeur); break;
					}
			}
	}
public function getDepNum() {
        return $this->dep_num;
    }
public function setDepNum($id){
        $this->dep_num=$id;
    }

public function getDepNom(){
        return $this->dep_nom;
    }
public function setDepNom($nom){
        $this->dep_nom = $nom;
    }

}
