<?php

class MotManager {
	private $dbo;

		public function __construct($db){
			$this->db = $db;
		}
		public function getAllMotInterdit($citation){
            $listeMots = array();

            $sql = 'select mot_id, mot_interdit FROM mot  WHERE MATCH(mot_interdit) AGAINST(\''.$citation.'\')';

            $requete = $this->db->prepare($sql);
            $requete->execute();

            while ($mot = $requete->fetch(PDO::FETCH_OBJ))
                $listeMots[] = new Mot($mot);

            $requete->closeCursor();
            return $listeMots;
		}
}

?>
