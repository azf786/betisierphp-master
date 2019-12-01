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
								echo "<pre>";
								print_r($requete->debugDumpParams());
								echo "/<pre>";
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
					public function getNbreVilles(){
			            $nbreVilles = 0;
									$db = mysqli_connect ('localhost', 'root' , '') or die("Veuillez nous excuser : erreur système");
           				mysqli_select_db($db,'betisier') or die("Veuillez nous excuser : erreur système");

			            $sql = 'select count(*) as nbre FROM ville';

									$resul=mysqli_query($db,$sql);
									while($ligne=mysqli_fetch_array($resul))   {
    										$nbreVilles=$ligne["nbre"];
    							}


			            return $nbreVilles;
								}
}

?>
