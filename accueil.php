<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Chez Paulette</h1>
    <div class= "row">
        <div class="col">
            <form action="accueil.php" method="GET">
                <?php  
                require './controllers/listeGroupeSelectController.php';
                ?>
            </form>
        </div>
        <div class="col">
            <?php 
            if(isset($_GET['liste_groupe'])){
              require './controllers/listeMusiciensController.php';
            }
            ?>
        </div>
    </div>
    <?php
        if (isset($_GET['ajouter'])) {
            require './views/formAjoutUtilisateur.php';
        } else {
            ?>
            <div class="row">
                <div class="col">
                    <p><a href="?ajouter=true">Ajouter un Musicien</a></p>
                </div>
            </div>
            <?php
        }
    ?>
</body>
</html>