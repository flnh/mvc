<?php
require_once './services/connection.php';
require_once './models/Musicien.php';

class MusicienService extends Connection {
  public function getListeMusiciensGroupe($id) {
    $id = (int)$id;
    if ($id > 0) {
      $requete = $this->bdd->prepare(
        "SELECT 
        lm.id_musicien as id, lm.nom_musicien as nom,lm.prenom_musicien as prenom, lg.nom_groupe as groupeCible,lglm.created as dateCreation
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

  public function getMusicien($id) {
    $id = (int)$id;
    if ($id > 0) {
      $requete = $this->bdd->prepare(
        "SELECT 
        lm.id_musicien as id, lm.nom_musicien as nom,lm.prenom_musicien as prenom, lg.nom_groupe as groupeCible,lglm.created as dateCreation
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
}
?>