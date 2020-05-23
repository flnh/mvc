<?php
require_once '../controllers/controlConnectionController.php';
require_once '../services/RoleService.php';
require_once '../views/message.php';

if (isset($_POST['role'])) {
  $role = new Role(['nom_role' => ucfirst(strtolower(htmlspecialchars($_POST['role'])))]);
  $message = (new RoleService())->createRole($role);
  afficherMessage($message);
}
?>