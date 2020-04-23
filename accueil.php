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
                <label for="liste_groupe">Liste des groupes</label>
                <?php  
                require './controllers/listeGroupeSelectController.php';
                ?>
                <button type="submit">Voir</button>
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
                    <p><a href="<?=(!empty($_SERVER['QUERY_STRING']))?'?'.$_SERVER['QUERY_STRING'].'&':'?'?>ajouter=true">Ajouter un Musicien</a></p>
                </div>
            </div>
            <?php
        }
    ?>
    <?php
        if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['liste_groupe'])) {
            require './controllers/ajoutUtilisateurController.php';
        }
    ?>
</body>
</html>