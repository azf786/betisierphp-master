<?php
class Fonction {
// Attributs
private $fon_num;
private $fon_libelle;

public function __construct($valeurs = array()){
	if (!empty($valeurs))
			//print_r ($valeurs);
			 $this->affecte($valeurs);
}
public function affecte($donnees){
			foreach ($donnees as $attribut => $valeur){
					switch ($attribut){
							case 'fon_num': $this->setFonNum($valeur); break;
							case 'fon_libelle': $this->setFonLibelle($valeur); break;
					}
			}
	}
public function getFonNum() {
        return $this->fon_num;
    }
public function setFonNum($id){
        $this->fon_num=$id;
    }

public function getFonLibelle(){
        return $this->fon_libelle;
    }
public function setFonLibelle($nom){
        $this->fon_libelle = $nom;
    }

}
