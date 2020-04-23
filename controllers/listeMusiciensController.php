<?php

if (isset($_GET['liste_groupe'])) {
  require_once './services/MusicienService.php';
  require_once './views/listeMusiciens.php';

  $listeMusiciens = (new MusicienService)->getListeMusiciensGroupe($_GET['liste_groupe']);
  if (!empty($listeMusiciens)) {
    afficherListeMusiciens($listeMusiciens);
  }
}
?>