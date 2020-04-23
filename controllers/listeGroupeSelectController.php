<?php
require_once '../services/GroupeService.php';
require_once './listeGroupes.php';

afficherListeGroupesSelect((new GroupeService)->getListeGroupes());
?>