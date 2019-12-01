<?php
class Citation {
// Attributs
private $cit_num;
private $pre_num;
private $libelle;
private $cit_date;
private $moyenne;
private $per_num_etu;
private $cit_valide;
private $cit_date_depo;

public function __construct($valeurs = array()){
	if (!empty($valeurs))
			//print_r ($valeurs);
			 $this->affecte($valeurs);
}
public function affecte($donnees){
			foreach ($donnees as $attribut => $valeur){
					switch ($attribut){
							case 'cit_num': $this->setCitNum($valeur); break;
							case 'nom_enseignant': $this->setNomEnseignant($valeur); break;
							case 'per_num': $this->setPerNum($valeur); break;
							case 'libelle': $this->setLibelle($valeur); break;
              case 'cit_date': $this->setCitDate($valeur); break;
              case 'moyenne': $this->setMoyenne($valeur); break;
							case 'per_num_etu': $this->setPerNumEtu($valeur); break;
							case 'cit_valide': $this->setCitValide($valeur); break;
							case 'cit_date_depo': $this->setCitDateDepo($valeur); break;
					}
			}
	}

	public function getCitNum(){
		return $this->cit_num;
	}
	public function setCitNum($id){
		$this->cit_num = $id;
	}
public function getNomEnseignant() {
        return $this->nom_enseignant;
    }
public function setNomEnseignant($nom){
        $this->nom_enseignant=$nom;
    }

public function getLibelle(){
        return $this->libelle;
    }
public function setLibelle($libelle){
        $this->libelle = $libelle;
    }
public function getCitDate(){
        return $this->cit_date;
    }
public function setCitDate($date){
        $this->cit_date = $date;
    }
public function getMoyenne(){
        return $this->moyenne;
    }
public function setMoyenne($moyenne){
        $this->moyenne = $moyenne;
    }
public function getPerNum(){
	return $this->per_num;
}
public function setPerNum($id){
	$this->per_num = $id;
}
public function getPerNumEtu(){
	return $this->per_num_etu;
}
public function setPerNumEtu($id){
	$this->per_num_etu = $id;
}
public function getCitValide(){
	return $this->cit_valide;
}
public function setCitValide($valide){
	$this->cit_valide = $valide;
}
public function getCitDateDepo(){
	return $this->cit_date_depo;
}
public function setCitDateDepo($date){
	$this->cit_date_depo = $date;
}



}
