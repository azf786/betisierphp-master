<?php

class EtudiantManager {
	private $dbo;

		public function __construct($db){
			$this->db = $db;
		}
		public function add($etudiant){
				$requete = $this->db->prepare(
				'INSERT INTO etudiant (per_num, dep_num, div_num)
				 VALUES (:num, :depNum, :divNum);');

				$requete->bindValue(':num',$etudiant->getPerNum());
				$requete->bindValue(':depNum',$etudiant->getDepNum());
				$requete->bindValue(':divNum',$etudiant->getDivNum());

				$retour=$requete->execute();
				return $retour;
		}
		public function supprimer($per_num){
				$requete = $this->db->prepare(
				'DELETE FROM etudiant WHERE per_num = '.$per_num.';');
				$retour=$requete->execute();
				return $retour;
		}


		public function getDetailEtudiant($per_num){
      $listeEtudiant = array();

      $sql = 'SELECT per_prenom, per_mail, per_tel, dep_nom, vil_nom, d.dep_num, div_num FROM personne p JOIN etudiant e ON e.per_num=p.per_num JOIN departement d ON d.dep_num= e.dep_num JOIN ville v ON v.vil_num=d.vil_num WHERE p.per_num='.$per_num;
      $requete = $this->db->prepare($sql);
      $requete->execute();

      while ($etudiant = $requete->fetch(PDO::FETCH_OBJ))
          $listeEtudiant[] = new Etudiant($etudiant);

      $requete->closeCursor();
      return $listeEtudiant;
	  }

}

?>
