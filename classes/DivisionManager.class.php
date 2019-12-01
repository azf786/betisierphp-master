<?php

class DivisionManager {
	private $dbo;

		public function __construct($db){
			$this->db = $db;
		}
		public function getAllDivision(){
            $listeDivisions = array();

            $sql = 'select div_num, div_nom FROM division';

            $requete = $this->db->prepare($sql);
            $requete->execute();

            while ($division = $requete->fetch(PDO::FETCH_OBJ))
                $listeDivisions[] = new Division($division);

            $requete->closeCursor();
            return $listeDivisions;
		}
}

?>
