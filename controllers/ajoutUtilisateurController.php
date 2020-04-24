<?php
require_once '../services/MusicienService.php';
require_once '../services/LiaisonService.php';
require_once '../views/message.php';

if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['liste_groupe']) && !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['liste_groupe'])) {
  $nom = htmlspecialchars($_POST['nom']);
  $prenom = htmlspecialchars($_POST['prenom']);
  $idGroupe = (int)$_POST['liste_groupe'];

  $idNouveauMusicien = (new MusicienService())->createMusicien($nom, $prenom);
  if (is_numeric($idNouveauMusicien)) {
    $idNouvelleLiaison = (new LiaisonService())->createLiaison($idNouveauMusicien, $idGroupe);
    if (is_numeric($idNouvelleLiaison)) {
      afficherMessage('Le musicien a bien été ajouté');
    } else {
      afficherMessage($idNouvelleLiaison);
    }
  } else {
    afficherMessage($idNouveauMusicien);
  }
}
?>