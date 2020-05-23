<?php
require_once '../controllers/controlConnectionController.php';

if (isset($_GET['liste_groupe'])) {
  require_once '../services/MusicienService.php';
  require_once './listeMusiciens.php';

  $groupe = new Groupe([
    'id_groupe' => $_GET['liste_groupe']
  ]);

  $listeMusiciens = (new MusicienService)->getListeMusiciensGroupe($groupe);
  if (!empty($listeMusiciens)) {
    afficherListeMusiciens($listeMusiciens);
  }
}
?>