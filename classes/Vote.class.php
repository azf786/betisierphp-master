<?php
class Vote{

private $cit_num;
private $per_num;
private $vot_valeur;

public function __construct($valeurs = array()){
	if (!empty($valeurs))
			//print_r ($valeurs);
			 $this->affecte($valeurs);
}
public function affecte($donnees){
			foreach ($donnees as $attribut => $valeur){
					switch ($attribut){
              case 'cit_num': $this->setCitNum($valeur); break;
							case 'per_num': $this->setPerNum($valeur); break;
							case 'vot_valeur': $this->setVotValeur($valeur); break;
					}
			}
	}

  public function getCitNum(){
  	return $this->cit_num;
  }
  public function setCitNum($citNum){
  	$this->cit_num = $citNum;
  }

public function getPerNum(){
	return $this->per_num;
}
public function setPerNum($id){
	$this->per_num = $id;
}

public function getVotValeur(){
	return $this->vot_valeur;
}
public function setVotValeur($vote){
	$this->vot_valeur = $vote;
}


}
