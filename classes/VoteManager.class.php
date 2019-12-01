<?php

class VoteManager {
	private $dbo;

		public function __construct($db){
			$this->db = $db;
		}
		public function add($vote){
				$requete = $this->db->prepare(
				'INSERT INTO vote (cit_num, per_num, vot_valeur)
				 VALUES (:citnum, :pernum, :votvaleur);');

				$requete->bindValue(':citnum',$vote->getCitNum());
				$requete->bindValue(':pernum',$vote->getPerNum());
				$requete->bindValue(':votvaleur',$vote->getVotValeur());

				$retour=$requete->execute();
						echo "<pre>";
						print_r($requete->debugDumpParams());
						echo "/<pre>";
						return $retour;
		}

		public function getVoteEtudiant($per_num, $cit_num){
      $listeVote = array();

      $sql = 'SELECT cit_num, per_num, vot_valeur FROM vote WHERE cit_num ='.$cit_num.' AND per_num ='.$per_num ;
      $requete = $this->db->prepare($sql);
      $requete->execute();

      while ($vote = $requete->fetch(PDO::FETCH_OBJ))
          $listeVote[] = new Vote($vote);

      $requete->closeCursor();
      return $listeVote;
	  }

}

?>
