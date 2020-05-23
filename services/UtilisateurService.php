<?php
require_once '../services/Connection.php';

class UtilisateurService extends Connection {

  public function connectUtilisateur(Utilisateur $utilisateur) {

    $login = $utilisateur->getLogin_utilisateur();
    $password = $utilisateur->getPassword_utilisateur();

    if (!empty($login) && !empty($password)) {
      $requete = $this->bdd->prepare('SELECT id_utilisateur FROM liste_utilisateurs WHERE login_utilisateur = :login AND password_utilisateur = :password');
      $requete->execute([
        'login' => $login,
        'password' => $password
      ]);

      if ($requete->rowCount() !== 0) {
        return ($requete->fetch(PDO::FETCH_ASSOC))['id_utilisateur'];
      } else {
        return 0;
      }
      
    } else {
      return 0;
    }
  }

}
?>