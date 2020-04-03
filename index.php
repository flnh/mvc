<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/style.css">
  <title>Exercice MVC</title>
</head>
<body>
  <?php
  require('connection.php');
  ?>
  <form action="./index.php" method="get">
  <label for="groupe">Selectionnez un groupe:</label>
    <select name="groupe" id="groupe">
      <?php
      $listeGroupes = $bdd->query('SELECT id, nom_groupe FROM groupes WHERE del = 0');
      while ($groupe = $listeGroupes->fetch()) {
        ?>
        <option value="<?=$groupe['id']?>"><?=$groupe['nom_groupe']?></option>
        <?php
      }
      ?>
    </select>
    <button type="submit">Afficher les membres</button>
  </form>
  <?php
    if (isset($_GET['groupe'])) {
      require('affichage.php');
    }
  ?>
</body>
</html>