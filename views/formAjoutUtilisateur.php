<?php
require_once '../controllers/controlConnectionController.php';
?>
<div class="row">
  <div class="col">
    <h2>Ajout d'un musicien</h2>
    <form action="" method="post">
      <label for="nom">Nom</label>
      <input type="text" id="nom" name="nom">
      <br>
      <label for="prenom">Prenom</label>
      <input type="text" id="prenom" name="prenom">
      <br>
      <label for="liste_groupe">Ajouter au groupe: </label>
      <?php
      require '../controllers/listeGroupeSelectController.php';
      ?>
      <br>
      <label for="role">Son role: </label>
      <?php
      require '../controllers/listeRoleSelectController.php';
      ?>
      <br>
      <button type="submit">Ajouter</button>
    </form>
    <p><a href="./accueil.php<?=(isset($_GET['liste_groupe']))?'?liste_groupe='.$_GET['liste_groupe']:''?>">Fermer</a></p>
  </div>
</div>