<?php

class VilleManager {
	private $dbo;

		public function __construct($db){
			$this->db = $db;
		}
        public function add($ville){
            $requete = $this->db->prepare(
						'INSERT INTO ville (vil_nom) VALUES (:nom);');

            $requete->bindValue(':nom',$ville->getVilNom());

						$retour=$requete->execute();
						return $retour;
        }

		public function getAllVille(){
      	$listeVilles = array();

        $sql = 'select vil_num, vil_nom FROM ville';

        $requete = $this->db->prepare($sql);
        $requete->execute();

        while ($ville = $requete->fetch(PDO::FETCH_OBJ))
            $listeVilles[] = new Ville($ville);

        $requete->closeCursor();
        return $listeVilles;
		}

		public function getVilleSupprimable()
		{
			$listeVilles = array();

			$sql = 'SELECT vil_num, vil_nom FROM ville WHERE vil_num NOT IN (SELECT vil_num FROM departement)';

			$requete = $this->db->prepare($sql);
			$requete->execute();

			while ($ville = $requete->fetch(PDO::FETCH_OBJ))
					$listeVilles[] = new Ville($ville);

			$requete->closeCursor();
			return $listeVilles;
		}
	  public function supprimer($villenum)
	  {
			$requete = $this->db->prepare(
			'DELETE FROM ville WHERE vil_num = '.$villenum.';');
			$retour=$requete->execute();
			return $retour;
	  }

}

?>
