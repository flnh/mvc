<?php
require_once '../controllers/controlConnectionController.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style.css">
  <title>Ajout Role</title>
</head>
<body>
  <p><a href="./accueil.php">Retour à l'accueil</a></p>
  <div class="row">
    <div class="col">
      <form action="" method="post">
        <label for="role">Nom du role:</label>
        <input type="text" name="role" id="role">
        <button type="submit">Ajouter le role</button>
      </form>
    </div>
  </div>
  <?php
  if (isset($_POST['role'])) {
    require '../controllers/ajoutRoleController.php';
  }
  ?>
</body>
</html>