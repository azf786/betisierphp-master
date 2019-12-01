<?php

class CitationManager {
	private $dbo;

		public function __construct($db){
			$this->db = $db;
		}

		public function add($citation){
				$requete = $this->db->prepare(
				'INSERT INTO citation (per_num, per_num_etu, cit_libelle, cit_date, cit_valide, cit_date_depo)
				VALUES (:perNum, :perNumEtu, :libelle, :dateCit, 0, :dateDepo);');

				$requete->bindValue(':perNum',$citation->getPerNum());
				$requete->bindValue(':perNumEtu',$citation->getPerNumEtu());
				$requete->bindValue(':libelle',$citation->getLibelle());
				$requete->bindValue(':dateCit',$citation->getCitDate());
				$requete->bindValue(':dateDepo',$citation->getCitDateDepo());

				$retour=$requete->execute();
						echo "<pre>";
						print_r($requete->debugDumpParams());
						echo "/<pre>";

				return $retour;
		}


		public function getAllCitation(){
            $listeCitation = array();

            $sql = 'SELECT c.cit_num, CONCAT_WS(\' \',per_prenom,per_nom) as nom_enseignant, cit_libelle as libelle, cit_date ,AVG(vot_valeur) as moyenne from personne p JOIN citation c ON p.per_num=c.per_num JOIN vote v on v.cit_num = c.cit_num WHERE cit_valide = 1 and cit_date_valide is not null GROUP by c.cit_num';

            $requete = $this->db->prepare($sql);
            $requete->execute();

            while ($citation = $requete->fetch(PDO::FETCH_OBJ))
                $listeCitation[] = new Citation($citation);

            $requete->closeCursor();
            return $listeCitation;
					}
		public function getCitations($nom,$date){
			$listeCitation = array();

			$sql = 'SELECT cit_num, nom_enseignant, libelle, cit_date, moyenne FROM
							(SELECT c.cit_num, CONCAT_WS(\' \',per_prenom,per_nom) as nom_enseignant, cit_libelle as libelle, cit_date ,AVG(vot_valeur) as moyenne from personne p JOIN citation c ON p.per_num=c.per_num JOIN vote v on v.cit_num = c.cit_num
							WHERE cit_valide = 1 and cit_date_valide is not null
							GROUP by c.cit_num)h
							WHERE cit_date LIKE \''.$date.'\' and nom_enseignant LIKE \''.$nom.'\'';

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
							(SELECT c.cit_num, CONCAT_WS(\' \',per_prenom,per_nom) as nom_enseignant, cit_libelle as libelle, cit_date ,AVG(vot_valeur) as moyenne from personne p JOIN citation c ON p.per_num=c.per_num JOIN vote v on v.cit_num = c.cit_num
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
}

?>
