<?php
class Connexion {
// Attributs
private $per_login;
private $per_pwd;
private $per_admin;
private $per_num;

public function __construct($valeurs = array()){
	if (!empty($valeurs))
			//print_r ($valeurs);
			 $this->affecte($valeurs);
}
public function affecte($donnees){
			foreach ($donnees as $attribut => $valeur){
					switch ($attribut){
							case 'per_login': $this->setPerLogin($valeur); break;
							case 'per_pwd': $this->setPerPwd($valeur); break;
              case 'per_admin': $this->setPerAdmin($valeur); break;
							case 'per_num': $this->setPerNum($valeur);break;
					}
			}
	}
public function getPerLogin() {
        return $this->per_login;
    }
public function setPerLogin($login){
        $this->per_login=$login;
    }

public function getPerPwd(){
        return $this->per_pwd;
    }
public function setPerPwd($pwd){
        $this->per_pwd=$pwd;
    }
public function getPerAdmin(){
        return $this->per_admin;
    }
public function setPerAdmin($admin){
        $this->per_admin = $admin;
    }
		public function getPerNum(){
			return $this->per_num;
		}
		public function setPerNum($id){
			$this->per_num = $id;
		}
}
