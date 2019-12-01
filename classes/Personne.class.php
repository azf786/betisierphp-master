<?php
class Personne {
// Attributs
private $per_num;
private $per_nom;
private $per_prenom;
private $per_tel;
private $per_mail;
private $per_admin;
private $per_login;
private $per_pwd;

public function __construct($valeurs = array()){
	if (!empty($valeurs))
			 $this->affecte($valeurs);
}
public function affecte($donnees){
			foreach ($donnees as $attribut => $valeur){
					switch ($attribut){
							case 'per_num': $this->setNumPers($valeur); break;
							case 'per_nom': $this->setNomPers($valeur); break;
              case 'per_prenom': $this->setPrenomPers($valeur); break;
							case 'per_tel': $this->setTelPers($valeur); break;
							case 'per_mail': $this->setMailPers($valeur); break;
							case 'per_admin': $this->setAdminPers($valeur); break;
							case 'per_login': $this->setLoginPers($valeur); break;
							case 'per_pwd': $this->setPwdPers($valeur); break;
					}
			}
	}
public function getNumPers() {
        return $this->per_num;
    }
public function setNumPers($id){
        $this->per_num=$id;
    }
public function getNomPers() {
        return $this->per_nom;
    }
public function setNomPers($nom){
        $this->per_nom=$nom;
      }
public function getPrenomPers() {
          return $this->per_prenom;
      }
public function setPrenomPers($prenom){
          $this->per_prenom=$prenom;
      }


public function getTelPers() {
			    return $this->per_tel;
		 }
public function setTelPers($tel){
		 			$this->per_tel=$tel;
		}
public function getMailPers(){
	return $this->per_mail;
}
public function setMailPers($mail){
	$this->per_mail = $mail;
}
public function getAdminPers(){
	return $this->per_admin;
}
public function setAdminPers($admin){
	$this->per_admin = $admin;
}
public function getLoginPers(){
	return $this->per_login;
}
public function setLoginPers($login){
	$this->per_login = $login;
}
public function getPwdPers(){
	return $this->per_pwd;
}
public function setPwdPers($pwd){
	$this->per_pwd = $pwd;
}


}
