<?php

class PersonneManager {
	private $dbo;

		public function __construct($db){
			$this->db = $db;
		}
		public function add($personne){
				$requete = $this->db->prepare(
				'INSERT INTO personne (per_nom,per_prenom,per_tel,per_mail,per_admin,per_login,per_pwd)
				 VALUES (:nom, :prenom, :tel, :mail, :admin, :login, :pwd);');

				$requete->bindValue(':nom',$personne->getNomPers());
				$requete->bindValue(':prenom',$personne->getPrenomPers());
				$requete->bindValue(':tel',$personne->getTelPers());
				$requete->bindValue(':mail',$personne->getMailPers());
				$requete->bindValue(':admin',$personne->getAdminPers());
				$requete->bindValue(':login',$personne->getLoginPers());
				$requete->bindValue(':pwd',$personne->getPwdPers());

				$retour=$requete->execute();
				return $this->db->lastInsertId();
		}
		public function updatePersonneAvecPwd($personne){
				$requete = $this->db->prepare(
				'UPDATE personne
				SET
					per_nom = \''.$personne->getNomPers().'\',
    			per_prenom = \''.$personne->getPrenomPers().'\',
    			per_tel = \''.$personne->getTelPers().'\',
    			per_mail = \''.$personne->getMailPers().'\',
    			per_admin = '.$personne->getAdminPers().',
    			per_login = \''.$personne->getLoginPers().'\',
    			per_pwd = \''.$personne->getPwdPers().'\'
				WHERE
					per_num = '.$personne->getNumPers().';');

				$retour=$requete->execute();
				return $this->db->lastInsertId();
		}

		public function updatePersonneSansPwd($personne){
				$requete = $this->db->prepare(
				'UPDATE personne
				SET
					per_nom = \''.$personne->getNomPers().'\',
					per_prenom = \''.$personne->getPrenomPers().'\',
					per_tel = \''.$personne->getTelPers().'\',
					per_mail = \''.$personne->getMailPers().'\',
					per_admin = '.$personne->getAdminPers().',
					per_login = \''.$personne->getLoginPers().'\'
				WHERE
					per_num = '.$personne->getNumPers().';');

				$retour=$requete->execute();
				return $this->db->lastInsertId();
		}

		public function getAllPersonne(){
            $listePersonnes = array();

            $sql = 'SELECT per_num, per_nom, per_prenom FROM personne';

            $requete = $this->db->prepare($sql);
            $requete->execute();

            while ($personne = $requete->fetch(PDO::FETCH_OBJ))
                $listePersonnes[] = new Personne($personne);

            $requete->closeCursor();
            return $listePersonnes;
		}
		public function getPersonne($pernum){
						$listePersonnes = array();

						$sql = 'SELECT per_nom, per_prenom, per_tel, per_mail, per_login, per_pwd, per_admin FROM personne WHERE per_num = '.$pernum;

						$requete = $this->db->prepare($sql);
						$requete->execute();

						while ($personne = $requete->fetch(PDO::FETCH_OBJ))
								$listePersonnes[] = new Personne($personne);

						$requete->closeCursor();
						return $listePersonnes;
		}
		public function estEtudiant($per_num){
			$pdo=new Mypdo();
			$etuManager = new EtudiantManager($pdo);
			$etudiants=$etuManager->getDetailEtudiant($per_num);
			return count($etudiants);
   }
	 public function supprimerPersonne($pernum){
			 $requete = $this->db->prepare(
			 'DELETE FROM personne WHERE per_num = '.$pernum.';');
			 $retour=$requete->execute();
			 return $retour;
	 }
}

?>
