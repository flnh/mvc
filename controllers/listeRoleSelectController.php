<?php
require_once '../services/RoleService.php';
require_once '../views/listeRoles.php';

$listeRoles = (new RoleService)->getAllRoles();
afficherListeRolesSelect($listeRoles);
?>