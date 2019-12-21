<?php

class CitationManager {
	private $dbo;

		public function __construct($db){
			$this->db = $db;
		}

		public function add($citation){
				$requete = $this->db->prepare(
				'INSERT INTO citation (per_num, per_num_etu, cit_libelle, cit_date, cit_date_depo)
				VALUES (:perNum, :perNumEtu, :libelle, :dateCit, :dateDepo);');

				$requete->bindValue(':perNum',$citation->getPerNum());
				$requete->bindValue(':perNumEtu',$citation->getPerNumEtu());
				$requete->bindValue(':libelle',$citation->getLibelle());
				$requete->bindValue(':dateCit',$citation->getCitDate());
				$requete->bindValue(':dateDepo',$citation->getCitDateDepo());

				$retour=$requete->execute();
				return $retour;
		}


		public function getAllCitation(){
						$listeCitation = array();

						$sql = 'SELECT c.cit_num, CONCAT_WS(\' \',per_prenom,per_nom) as nom_enseignant, cit_libelle as libelle, cit_date ,ifnull(AVG(vot_valeur), 0) as moyenne from personne p JOIN citation c ON p.per_num=c.per_num  LEFT JOIN vote v on v.cit_num = c.cit_num  GROUP by c.cit_num';

						$requete = $this->db->prepare($sql);
						$requete->execute();

						while ($citation = $requete->fetch(PDO::FETCH_OBJ))
								$listeCitation[] = new Citation($citation);

						$requete->closeCursor();
						return $listeCitation;
		}
		public function getAllCitationValide(){
            $listeCitation = array();

            $sql = 'SELECT c.cit_num, CONCAT_WS(\' \',per_prenom,per_nom) as nom_enseignant, cit_libelle as libelle, cit_date ,ifnull(AVG(vot_valeur), 0) as moyenne from personne p JOIN citation c ON p.per_num=c.per_num  LEFT JOIN vote v on v.cit_num = c.cit_num WHERE cit_valide = 1 and cit_date_valide is not null GROUP by c.cit_num';

            $requete = $this->db->prepare($sql);
            $requete->execute();

            while ($citation = $requete->fetch(PDO::FETCH_OBJ))
                $listeCitation[] = new Citation($citation);

            $requete->closeCursor();
            return $listeCitation;
			}
			public function getCitationNonValide(){
							$listeCitation = array();

							$sql = 'SELECT c.cit_num, CONCAT_WS(\' \',per_prenom,per_nom) as nom_enseignant, cit_libelle as libelle, cit_date  from personne p JOIN citation c ON p.per_num=c.per_num  WHERE cit_valide = 0 and cit_date_valide is null GROUP by c.cit_num';

							$requete = $this->db->prepare($sql);
							$requete->execute();

							while ($citation = $requete->fetch(PDO::FETCH_OBJ))
									$listeCitation[] = new Citation($citation);

									$requete->closeCursor();
									return $listeCitation;
				}
		public function getCitations($nom,$date){
			$listeCitation = array();

			$sql = 'SELECT cit_num, nom_enseignant, libelle, cit_date, moyenne FROM (SELECT c.cit_num, CONCAT_WS(\' \',per_prenom,per_nom) as nom_enseignant, cit_libelle as libelle, cit_date ,ifnull(AVG(vot_valeur), 0) as moyenne from personne p JOIN citation c ON p.per_num=c.per_num LEFT JOIN vote v on v.cit_num = c.cit_num WHERE cit_valide = 1 and cit_date_valide is not null GROUP by c.cit_num)h WHERE cit_date LIKE \''.$date.'\' and nom_enseignant LIKE \''.$nom.'\'';

			$requete = $this->db->prepare($sql);
			$requete->execute();

			while ($citation = $requete->fetch(PDO::FETCH_OBJ))
				$listeCitation[] = new Citation($citation);

			$requete->closeCursor();
			return $listeCitation;
		}
		public function getCitation($pernum){
			$listeCitation = array();

			$sql = 'SELECT c.cit_num, CONCAT_WS(\' \',per_prenom,per_nom) as nom_enseignant, cit_libelle as libelle, cit_date  from personne p JOIN citation c ON p.per_num=c.per_num
			WHERE cit_valide = 0 and cit_date_valide is null and cit_num = '.$pernum.'
			GROUP by c.cit_num';

			$requete = $this->db->prepare($sql);
			$requete->execute();

			while ($citation = $requete->fetch(PDO::FETCH_OBJ))
				$listeCitation[] = new Citation($citation);

			$requete->closeCursor();
			return $listeCitation;
		}
		public function getCitationsNotes($nom, $date, $note){
			$listeCitation = array();

			$sql = 'SELECT cit_num, nom_enseignant, libelle, cit_date, moyenne FROM
							(SELECT c.cit_num, CONCAT_WS(\' \',per_prenom,per_nom) as nom_enseignant, cit_libelle as libelle, cit_date ,ifnull(AVG(vot_valeur), 0) as moyenne from personne p JOIN citation c ON p.per_num=c.per_num LEFT JOIN vote v on v.cit_num = c.cit_num
							WHERE cit_valide = 1 and cit_date_valide is not null
							GROUP by c.cit_num)h
							WHERE moyenne = '.$note.' and cit_date LIKE \''.$date.'\' and nom_enseignant LIKE \''.$nom.'\'';

			$requete = $this->db->prepare($sql);
			$requete->execute();

			while ($citation = $requete->fetch(PDO::FETCH_OBJ))
				$listeCitation[] = new Citation($citation);

			$requete->closeCursor();
			return $listeCitation;
		}
		public function valider($citnum, $date){
				$requete = $this->db->prepare(
				'UPDATE citation
				SET
					cit_valide = 1,
					cit_date_valide = \''.$date.'\'
				WHERE
					cit_num = '.$citnum.';');

				$retour=$requete->execute();

				return $this->db->lastInsertId();
		}
		public function supprimer($citnum){
				$requete = $this->db->prepare(
				'DELETE FROM citation WHERE cit_num = '.$citnum.';');
				$retour=$requete->execute();
				return $retour;
		}
		public function supprimerCitationParPersonne($pernum){
				$requete = $this->db->prepare(
				'DELETE FROM citation WHERE per_num = '.$pernum.';');
				$retour=$requete->execute();
				return $retour;
		}
}

?>
