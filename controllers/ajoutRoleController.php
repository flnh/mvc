<?php
require_once '../services/RoleService.php';
require_once '../views/message.php';

if (isset($_POST['role'])) {
  $message = (new RoleService())->createRole($_POST['role']);
  afficherMessage($message);
}
?>