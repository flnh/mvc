<?php
require_once '../services/LiaisonService.php';
require_once '../services/MusicienService.php';

if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['liste_groupe']) && isset($_POST['role']) && isset($_POST['id']) && !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['liste_groupe']) && !empty($_POST['role']) && !empty($_POST['id'])) {
  $nom = htmlspecialchars($_POST['nom']);
  $prenom = htmlspecialchars($_POST['prenom']);
  $idGroupe = (int)$_POST['liste_groupe'];
  $role = (int)$_POST['role'];

  $musicienService = new MusicienService();
  $liaisonService = new LiaisonService();

  // $idLiaison = $liaisonService->getIdLiaisonByIdMusicien($id);
  // $liaisonSupprime = $liaisonService->deleteLiaison($idLiaison);

  /**
   * Je n'ai pas le temps de finir
   * Je voudrait recuperer l'id de liaison (je n'ai pas encore ecrit la methode)
   * Faire une suppression logique sur cet id
   * ensuite modifier le musicien
   * enfin creer une nouvelle liaison
   */


  $musicienModifie = $ModifieService->updateModifie($id, $nom, $prenom);
  if ($musicienModifie = 'Le musicien à bien été modifier') {
    $idNouvelleLiaison = $liaisonService->createLiaison($id, $idGroupe, $role);
    if (is_numeric($idNouvelleLiaison)) {
      afficherMessage('Le musicien a bien été modifé');
    } else {
      afficherMessage($idNouvelleLiaison);
    }
  } else {
    afficherMessage($musicienModifie);
  }
}
?>