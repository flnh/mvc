<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
        require "functions/membre_du_groupe.php";
    ?>
    <h1>Chez Paulette</h1>
    <div class= "row">
        <div class="col">
            <form action="accueil.php" method="GET">
                <label for="liste_groupe">Liste des groupes</label>
                <select name="liste_groupe" id="liste_groupe">
                <?php  
                require './controllers/listeGroupeController.php';
                ?>
                </select>
                <button type="submit">Voir</button>
            </form>
        </div>
        <div class="col">
            <?php 
            if(isset($_GET['liste_groupe'])){
                membre_Groupe($_GET['liste_groupe']);
            }
            ?>
        </div>
    </div>
</body>
</html>