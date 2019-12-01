<?php
class Salarie {
// Attributs
private $per_prenom;
private $per_nom;
private $per_mail;
private $per_tel;
private $sal_telprof;
private $fon_libelle;
private $fon_num;
private $per_num;

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
              case 'sal_telprof': $this->setSalTel($valeur); break;
							case 'fon_libelle': $this->setFonLibelle($valeur); break;
							case 'fon_num': $this->setFonNum($valeur); break;
							case 'per_num': $this->setPerNum($valeur); break;
							case 'per_nom': $this->setPerNom($valeur); break;
					}
			}
	}
public function getPerPrenom() {
        return $this->per_prenom;
    }
public function setPerPrenom($prenom){
        $this->per_prenom=$prenom;
    }
		public function getPerNom() {
		        return $this->per_nom;
		    }
		public function setPerNom($nom){
		        $this->per_nom=$nom;
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
public function getSalTel(){
        return $this->sal_telprof;
    }
public function setSalTel($sal_telprof){
        $this->sal_telprof = $sal_telprof;
    }
		public function getFonLibelle(){
		        return $this->fon_libelle;
		    }
		public function setFonLibelle($libelle){
		        $this->fon_libelle = $libelle;
		    }
public function getFonNum(){
	return $this->fon_num;
}
public function setFonNum($fonNum){
	$this->fon_num = $fonNum;
}
public function getPerNum(){
	return $this->per_num;
}
public function setPerNum($id){
	$this->per_num = $id;
}


}
