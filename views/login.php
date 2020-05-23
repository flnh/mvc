<?php
session_start();
if (isset($_SESSION['logged']) && $_SESSION['logged'] == 'true') {
  header('location: ./accueil.php');
} else {
  ?>
  <!DOCTYPE html>
  <html lang="fr">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Login</title>
      <link rel="stylesheet" href="../css/style.css">
  </head>
  <body>
    <h1>Login</h1>
    <form action="../controllers/loginController.php" method="post">
      <div class="row">
        <div class="col">
          <label for="login">Pseudo</label>
          <input type="text" id="login" name="login" required>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <label for="password">Mot de Passe</label>
          <input type="password" id="password" name="password" required>
          <button type="submit" style="margin-top: 10px">Connection</button>
        </div>
      </div>
    </form>
  </body>
  </html>
  <?php
}
?>