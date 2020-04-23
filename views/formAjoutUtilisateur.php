<div class="row">
  <div class="col">
    <h2>Ajout d'un musicien</h2>
    <form action="" method="post">
      <label for="nom">Nom</label>
      <input type="text" id="nom" name="nom">
      <label for="prenom">Prenom</label>
      <input type="text" id="prenom" name="prenom">
      <br>
      <label for="liste_groupe">Ajouter au groupe: </label>
      <?php
      require './controllers/listeGroupeSelectController.php';
      ?>
      <button type="submit">Ajouter</button>
    </form>
    <p><a href="./accueil.php<?=(isset($_GET['liste_groupe']))?'?liste_groupe='.$_GET['liste_groupe']:''?>">Fermer</a></p>
  </div>
</div>