<?php
require_once '../services/connection.php';
require_once '../models/Musicien.php';

class MusicienService extends Connection {
  public function getAllMusiciens() {
    $requete = $this->bdd->query(
      "SELECT 
      lm.id_musicien as id, lm.nom_musicien as nom,lm.prenom_musicien as prenom, lg.nom_groupe as groupeCible,lglm.created as dateCreation, r.nom_role as role
      FROM 
          liste_musiciens lm 
      INNER JOIN
          liste_groupes_avec_liste_musiciens lglm 
      ON 
          lm.id_musicien = lglm.musicien_id
      INNER JOIN
          liste_groupes lg 
      ON 
          lg.id_groupe = lglm.groupe_id
      INNER JOIN
      	  liste_roles r
      ON
      	  r.id_role = lglm.role_id
      WHERE 
          lglm.del = 0
      "
    );
    if ($requete->rowCount() > 0) {
      while ($donnees = $requete->fetch()) {
        $listeMusiciens[] = new Musicien($donnees);
      }
      return $listeMusiciens;
    } else {
      return []; // Probleme requete
    }
  }

  public function getListeMusiciensGroupe(Groupe $groupe) {
    $id = $groupe->getId_groupe();
    if ($id > 0) {
      $requete = $this->bdd->prepare(
        "SELECT 
        lm.id_musicien as id, lm.nom_musicien as nom,lm.prenom_musicien as prenom, lg.nom_groupe as groupeCible,lglm.created as dateCreation, r.nom_role as role
        FROM 
            liste_musiciens lm 
        INNER JOIN
            liste_groupes_avec_liste_musiciens lglm 
        ON 
            lm.id_musicien = lglm.musicien_id
        INNER JOIN
            liste_groupes lg 
        ON 
            lg.id_groupe = lglm.groupe_id
        INNER JOIN
      	    liste_roles r
        ON
      	    r.id_role = lglm.role_id
        WHERE 
            lg.id_groupe = :id
        AND 
            lglm.del = 0
        "
      );
  
      $requete->execute([
        'id' => $id
      ]);
  
      if ($requete->rowCount() > 0) {
        while ($donnees = $requete->fetch()) {
          $tabMusiciens[] = new Musicien($donnees);
        }
        return $tabMusiciens;
      } else {
        return []; // Mauvais id
      }
    } else {
      return []; // Id inferieur à 0
    }
  }

  public function getMusicien(Musicien $musicien) {
    $id = $musicien->getId();
    if ($id > 0) {
      $requete = $this->bdd->prepare(
        "SELECT 
        lm.id_musicien as id, lm.nom_musicien as nom,lm.prenom_musicien as prenom, lg.nom_groupe as groupeCible,lglm.created as dateCreation, r.nom_role as role
        FROM 
            liste_musiciens lm 
        INNER JOIN
            liste_groupes_avec_liste_musiciens lglm 
        ON 
            lm.id_musicien = lglm.musicien_id
        INNER JOIN
            liste_groupes lg 
        ON 
            lg.id_groupe = lglm.groupe_id
        INNER JOIN
      	    liste_roles r
        ON
      	    r.id_role = lglm.role_id
        WHERE 
            lm.id_musicien = :id
        AND 
            lglm.del = 0
        ");
      $requete->execute([
        'id' => $id
      ]);
      if ($requete->rowCount() > 0) {
        return [new Musicien($requete->fetch())];
      } else {
        return []; // Mauvais id
      }
    } else {
      return []; // Id inférieur à 0
    }
  }

  public function createMusicien(Musicien $musicien) {
    if (!empty($musicien->getNom()) && !empty($musicien->getPrenom())) {
      $requete = $this->bdd->prepare('INSERT INTO liste_musiciens(nom_musicien, prenom_musicien) VALUES(:nom, :prenom)');
      $idNouveauMusicien = $requete->execute([
        'nom' => $musicien->getNom(),
        'prenom' => $musicien->getPrenom()
      ]);
      if ($idNouveauMusicien) {
        return $this->bdd->lastInsertId(); // id d'insertion
      } else {
        return 'Probleme lors de la creation du musicien';
      }
    } else {
      return 'Le nom ou prenom ne doit pas etre vide et ne pas contenir de numero';
    }
  }

  public function updateMusicien(Musicien $musicien) {
    $id = $musicien->getId();
    if (!empty($musicien->getNom()) && !empty($musicien->getPrenom()) && $id > 0) {
      $requete = $this->bdd->prepare('UPDATE liste_musiciens SET nom_musicien = :nom, prenom_musicien = :prenom WHERE id_musicien = :id');
      $requete->execute([
        'nom' => $musicien->getNom(),
        'prenom' => $musicien->getPrenom(),
        'id' => $id
      ]);
      if ($requete->rowCount() != 0) {
        return 'Le musicien à bien été modifier';
      } else {
        return 'Probleme lors de la modification dans la bdd';
      }
    } else {
      return 'Le nom ou prenom ne doit pas etre vide et ne pas contenir de numero et id > 0';
    }
  }

  public function deleteMusicien(Musicien $musicien) {
    $id = $musicien->getId();
    if ($id > 0) {
      $requete = $this->bdd->prepare('DELETE FROM liste_musiciens WHERE id_musicien = :id');
      $requete->execute([
        'id' => $id
      ]);
      if ($requete->rowCount() != 0) {
        return 'Le musicien à bien été supprimer';
      } else {
        return 'Probleme lors de la suppression du musicien';
      }
    } else {
      return 'Mauvais id';
    }
  }
}
?>