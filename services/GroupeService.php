<?php
require_once './services/Connection.php';
require_once './models/Groupe.php';

class GroupeService extends Connection {
  public function getListeGroupes() {
    $requete = $this->bdd->query('SELECT * FROM liste_groupes');

    while ($donnees = $requete->fetch()) {
      $tabGroupes[] = new Groupe($donnees);
    }

    return $tabGroupes;
  }
}
?>