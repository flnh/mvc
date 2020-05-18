<?php
require_once '../services/Connection.php';
require_once '../models/Role.php';

class RoleService extends Connection {
  public function getAllRoles() {
    $requete = $this->bdd->query('SELECT * FROM liste_roles');
    if ($requete->rowCount() > 0) {
      while ($donnees = $requete->fetch()) {
        $tabRoles[] = new Role($donnees);
      }
      return $tabRoles;
    } else {
      return [];
    }
  }

  public function getRole(Role $role) {
    $id = $role->getId_role();
    if ($id > 0) {
      $requete = $this->bdd->prepare('SELECT * FROM liste_roles WHERE id_role = :id');
      $requete->execute(['id' => $id]);
      if ($requete->rowCount() > 0) {
        while ($donnees = $requete->fetch()) {
          $tabRoles[] = new Role($donnees);
        }
        return $tabRoles;
      } else {
        return [];
      }
    } else {
      return 'id doit etre superieur à 0';
    }
  }

  public function createRole(Role $role) {
    if (!empty($role->getNom_role())) {
      // $tabRequete = ['nomRole' => ucfirst(strtolower(htmlspecialchars($role)))]; // Formatage juste la premiere lettre majuscule
      $tabRequete = ['nomRole' => $role->getNom_role()];
      $requete = $this->bdd->prepare('SELECT * FROM liste_roles WHERE nom_role = :nomRole');
      $requete->execute($tabRequete);
      if ($requete->rowCount() == 0) {
        $requete = $this->bdd->prepare('INSERT INTO liste_roles(nom_role) VALUES (:nomRole)');
        $requete->execute($tabRequete);
        if ($requete->rowCount() > 0) {
          return 'Le role à bien été ajouté';
        } else {
          return 'Probleme lors de l\'ajout du role';
        }
      } else {
        return 'Le role existe déjà';
      }
    } else {
      return 'Le role ne dois pas etre vide';
    }
  }

  public function updateRole(Role $role) {
    $id = $role->getId_role();
    if ($id > 0 && !empty($role->getNom_role())) {
      $requete = $this->bdd->prepare('UPDATE liste_roles SET nom_role = :nomRole WHERE id_role = :id');
      $requete->execute([
        'nomRole' => $role->getNom_role(),
        'id' => $id
      ]);
      if ($requete->rowCount() > 0) {
        return 'Le role à ete mis a jour';
      } else {
        return 'Probleme lors de la mise a jour'; // Mauvais id ou nom n'a pas changé
      }
    } else {
      return 'id doit etre superieur à 0 et nom ne doit pas etre vide';
    }
  }

  public function deleteRole(Role $role) {
    $id = $role->getId_role();
    if ($id > 0) {
      $requete = $this->bdd->prepare('DELETE FROM liste_roles WHERE id_role = :id');
      $requete->execute([
        'id' => $id
      ]);
      if ($requete->rowCount() > 0) {
        return 'Le role à bien été supprimé';
      } else {
        return 'Probleme lors de la suppression'; // Mauvais id
      }
    } else {
      return 'id doit etre superieur à 0';
    }
  }
}
?>