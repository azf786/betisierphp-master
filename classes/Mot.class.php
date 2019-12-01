<?php
class Mot {
// Attributs
private $mot_id;
private $mot_interdit;

public function __construct($valeurs = array()){
	if (!empty($valeurs))
			//print_r ($valeurs);
			 $this->affecte($valeurs);
}
public function affecte($donnees){
			foreach ($donnees as $attribut => $valeur){
					switch ($attribut){
							case 'mot_id': $this->setMotId($valeur); break;
							case 'mot_interdit': $this->setMotInterdit($valeur); break;
					}
			}
	}
public function getMotId() {
        return $this->mot_id;
    }
public function setMotId($id){
        $this->mot_id=$id;
    }

public function getMotInterdit(){
        return $this->mot_interdit;
    }
public function setMotInterdit($mot){
        $this->mot_interdit = $mot;
    }

}
