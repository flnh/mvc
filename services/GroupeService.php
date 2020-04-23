<?php
require_once '../services/Connection.php';
require_once '../models/Groupe.php';

class GroupeService extends Connection {
  public function getListeGroupes() {
    $requete = $this->bdd->query('SELECT * FROM liste_groupes');

    while ($donnees = $requete->fetch()) {
      $tabGroupes[] = new Groupe($donnees);
    }

    return $tabGroupes;
  }

  public function getGroupe($id) {
    $id = (int)$id;
    if ($id > 0) {
      $requete = $this->bdd->prepare('SELECT * FROM liste_groupes WHERE id_groupe = :id');
      $requete->execute([
        'id' => $id
      ]);
      
      if ($requete->rowCount() > 0) {
        return new Groupe($requete->fetch());
      } else {
        return 'Mauvais id';
      }
    } else {
      return 'Mauvais id';
    }
  }

  public function createGroupe($nomGroupe) {
    if (!empty($nomGroupe)) {
      $requete = $this->bdd->prepare('INSERT INTO liste_groupes(nom_groupe) VALUES(:nomGroupe)');
      $resultat = $requete->execute([
        'nomGroupe' => htmlspecialchars($nomGroupe)
      ]);
      if ($resultat) {
        return 'ok';
      } else {
        return 'Probleme';
      }
    } else {
      return 'Nom de groupe vide';
    }
  }

  public function updateGroupe($id, $nomGroupe) {
    $id = (int)$id;
    if (!empty($nomGroupe) && $id > 0) {
      $requete = $this->bdd->prepare('UPDATE liste_groupes SET nom_groupe = :nomGroupe WHERE id_groupe = :id');
      $requete->execute([
        'nomGroupe' => $nomGroupe,
        'id' => $id
      ]);
      if ($requete->rowCount() != 0) {
        return 'Le groupe a bien ete mis a jour';
      } else {
        return 'Probleme de mise a jour';
      }
    } else {
      return 'Mauvais id ou nom de groupe vide';
    }
  }

  public function deleteGroupe($id) {
    $id = (int)$id;
    if ($id > 0) {
      $requete = $this->bdd->prepare('DELETE FROM liste_groupes WHERE id_groupe = :id');
      $requete->execute([
        'id' => $id
      ]);
      if ($requete->rowCount() > 0) {
        return 'Suppression effectuée';
      } else {
        return 'Mauvais id suppression non effectuée';
      }
    } else {
      return 'Mauvais id';
    }
  }
}
?>