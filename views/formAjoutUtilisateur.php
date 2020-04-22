<div class="row">
  <div class="col">
    <h2>Ajout d'un musicien</h2>
    <form action="" method="post">
      <label for="nom">Nom</label>
      <input type="text" id="nom" name="nom">
      <label for="prenom">Prenom</label>
      <input type="text" id="prenom" name="prenom">
      <br>
      <?php
      require './controllers/listeGroupeSelectController.php';
      ?>
      <button type="submit">Envoyer</button>
    </form>
    <p><a href="./accueil.php">Fermer</a></p>
  </div>
</div>