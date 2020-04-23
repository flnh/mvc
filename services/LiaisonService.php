<?php
require_once '../services/Connection.php';
require_once '../models/Liaison.php';

class LiaisonService extends Connection {
  public function getAllLiaison() {
    $requete = $this->bdd->query('SELECT * FROM liste_groupes_avec_liste_musiciens WHERE del = 0');
    if ($requete->rowCount() > 0) {
      while ($donnees = $requete->fetch()) {
        $listeLiaisons[] = new Liaison($donnees);
      }
      return $listeLiaisons;
    } else {
      return []; // Aucune liaison
    }
  }

  public function getLiaison($id) {
    $id = (int)$id;
    if ($id > 0) {
      $requete = $this->bdd->prepare('SELECT * FROM liste_groupes_avec_liste_musiciens WHERE id_jointure = :id AND del = 0');
      $requete->execute([
        'id' => $id
      ]);
      if ($requete->rowCount() > 0) {
        return [new Liaison($requete->fetch())];
      } else {
        return 'Aucune liaison correspondante';
      }
    } else {
      return 'id doit etre superieur a 0';
    }
  }

  public function createLiaison($musicienId, $groupeId) {
    $musicienId = (int)$musicienId;
    $groupeId = (int)$groupeId;
    if ($musicienId > 0 && $groupeId > 0) {
      $requete = $this->bdd->prepare('INSERT INTO liste_groupes_avec_liste_musiciens(musicien_id, groupe_id, created) VALUES(:musicienId, :groupeId, :created)');
      $liaisonReussie = $requete->execute([
        'musicienId' => $musicienId,
        'groupeId' => $groupeId,
        'created' => date('Y-m-d h:i:s')
      ]);
      if ($liaisonReussie) {
        return $this->bdd->lastInsertId();
      } else {
        return 'Probleme lors de la creation de la liaison';
      }
    } else {
      return 'les id doivent etre superieur à 0';
    }
  }

  public function updateLiaison($id, $musicienId, $groupeId) {
    $id = (int)$id;
    $musicienId = (int)$musicienId;
    $groupeId = (int)$groupeId;
    if ($id > 0 && $musicienId > 0 && $groupeId > 0) {
      $requete = $this->bdd->prepare('UPDATE liste_groupes_avec_liste_musiciens SET musicien_id = :musicienId, groupe_id = :groupeId, updated = :updated WHERE id_jointure = :id');
      $requete->execute([
        'musicienId' => $musicienId,
        'groupeId' => $groupeId,
        'updated' => date('Y-m-d h:i:s'),
        'id' => $id
      ]);
      if ($requete->rowCount() > 0) {
        return 'La liaison a bien été modifiée';
      } else {
        return 'Probleme lors de la modification de la liaison'; // Mauvais id
      }
    } else {
      return 'Les id doivent etre superieur à 0';
    }
  }

  public function deleteLiaison($id) {
    $id = (int)$id;
    if ($id > 0) {
      $requete = $this->bdd->prepare('UPDATE liste_groupes_avec_liste_musiciens SET del = 1 WHERE id_jointure = :id');
      $requete->execute([
        'id' => $id
      ]);
      if ($requete->rowCount() > 0) {
        return 'La suppression logique a bien été éxécutée';
      } else {
        return 'Probleme lors de la suppression logique';
      }
    } else {
      return 'id doit etre superieur à 0';
    }
  }

  public function achtungTrueDeleteLiaison($id) {
    $id = (int)$id;
    if ($id > 0) {
      $requete = $this->bdd->prepare('DELETE FROM liste_groupes_avec_liste_musiciens WHERE id_jointure = :id');
      $requete->execute([
        'id' => $id
      ]);
      if ($requete->rowCount() > 0) {
        return 'Vraie supression éfféctuée';
      } else {
        return 'Probleme lors de la vraie suppression';
      }
    } else {
      return 'id doit etre superieur à 0';
    }
  }
}
?>