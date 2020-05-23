<?php
require_once '../models/Utilisateur.php';
require_once '../services/UtilisateurService.php';

session_start();

if (isset($_POST['login'], $_POST['password'])) {

  $utilisateur = new Utilisateur([
    'login_utilisateur' => htmlspecialchars($_POST['login']),
    'password_utilisateur' => htmlspecialchars($_POST['password'])
  ]);

  $utilisateur->hashPassword();

  $result = (new UtilisateurService())->connectUtilisateur($utilisateur);

  if ($result != 0) {
    $_SESSION['logged'] = true;
    $_SESSION['id'] = (int)$result;
  }

}

header('location: ../views/login.php');
?>