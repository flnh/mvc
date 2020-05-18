<?php
require_once '../services/MusicienService.php';
require_once '../services/LiaisonService.php';
require_once '../views/message.php';

if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['liste_groupe']) && isset($_POST['role']) && !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['liste_groupe']) && !empty($_POST['role'])) {
  $nom = htmlspecialchars($_POST['nom']);
  $prenom = htmlspecialchars($_POST['prenom']);
  $idGroupe = (int)$_POST['liste_groupe'];
  $role = (int)$_POST['role'];

  $musicien = new Musicien([
    'nom' => $nom,
    'prenom' => $prenom,
    'groupeCible' => $idGroupe,
    'role' => $role
  ]);

  $idNouveauMusicien = (new MusicienService())->createMusicien($musicien);
  if (is_numeric($idNouveauMusicien)) {
    $liaison = new Liaison([
      'musicien_id' => $idNouveauMusicien,
      'groupe_id' => $musicien->getGroupeCible(),
      'role_id' => $musicien->getRole()
    ]);
    $idNouvelleLiaison = (new LiaisonService())->createLiaison($liaison);
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