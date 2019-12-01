<?php

class DepartementManager {
	private $dbo;

		public function __construct($db){
			$this->db = $db;
		}
		public function getAllDepartement(){
            $listeDepartements = array();

            $sql = 'select dep_num, dep_nom FROM departement';

            $requete = $this->db->prepare($sql);
            $requete->execute();

            while ($departement = $requete->fetch(PDO::FETCH_OBJ))
                $listeDepartements[] = new Departement($departement);

            $requete->closeCursor();
            return $listeDepartements;
		}
}

?>
