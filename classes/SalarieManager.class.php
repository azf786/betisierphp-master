<?php

class SalarieManager {
	private $dbo;

		public function __construct($db){
			$this->db = $db;
		}
		public function add($salarie){
				$requete = $this->db->prepare(
				'INSERT INTO salarie (per_num, sal_telprof, fon_num)
				 VALUES (:num, :telFon, :fonNum);');

				$requete->bindValue(':num',$salarie->getPerNum());
				$requete->bindValue(':telFon',$salarie->getSalTel());
				$requete->bindValue(':fonNum',$salarie->getFonNum());

				$retour=$requete->execute();
						echo "<pre>";
						print_r($requete->debugDumpParams());
						echo "/<pre>";
						return $retour;
		}

		public function getDetailSalarie($per_num){
      $listeSalarie = array();

      $sql = 'SELECT per_prenom, per_mail, per_tel, sal_telprof, fon_libelle FROM personne p JOIN salarie s ON s.per_num=p.per_num JOIN fonction f ON f.fon_num=s.fon_num WHERE p.per_num='.$per_num;
      $requete = $this->db->prepare($sql);
      $requete->execute();

      while ($salarie = $requete->fetch(PDO::FETCH_OBJ))
          $listeSalarie[] = new Salarie($salarie);

      $requete->closeCursor();
      return $listeSalarie;
	  }

		public function getAllSalarie(){
      $listeSalarie = array();

      $sql = 'SELECT p.per_num, per_nom, per_prenom, per_mail, per_tel, sal_telprof, fon_libelle FROM personne p JOIN salarie s ON s.per_num=p.per_num JOIN fonction f ON f.fon_num=s.fon_num';
      $requete = $this->db->prepare($sql);
      $requete->execute();

      while ($salarie = $requete->fetch(PDO::FETCH_OBJ))
          $listeSalarie[] = new Salarie($salarie);

      $requete->closeCursor();
      return $listeSalarie;
	  }

}

?>
