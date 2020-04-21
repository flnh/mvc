<?php
require_once './services/GroupeService.php';
require_once './views/listeGroupes.php';

afficherListeGroupes((new GroupeService)->getListeGroupes());
?>