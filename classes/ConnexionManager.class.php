<?php

class ConnexionManager {
	private $dbo;

		public function __construct($db){
			$this->db = $db;
		}

    public function getConnecter($per_login,$per_pwd){
      $listePersonnes= array();

      $sql = 'SELECT * from personne WHERE per_login=\''.$per_login.'\' AND per_pwd=\''.$per_pwd.'\'';
      $requete = $this->db->prepare($sql);
      $requete->execute();

      while ($personne = $requete->fetch(PDO::FETCH_OBJ))
          $listePersonnes[] = new Connexion($personne);

      $requete->closeCursor();
      return $listePersonnes;
	  }

		public function getConnexion($per_login,$per_pwd){
      $listePersonnes= array();

      $sql = 'SELECT * from personne WHERE per_login=\''.$per_login.'\' AND per_pwd=\''.$per_pwd.'\'';
      $requete = $this->db->prepare($sql);
      $requete->execute();

      while ($personne = $requete->fetch(PDO::FETCH_OBJ))
          $listePersonnes[] = new Connexion($personne);

      $requete->closeCursor();
      return count($listePersonnes);
	  }

}

?>
