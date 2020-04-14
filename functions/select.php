<?php
function select_item(string $nom_de_la_table, string $nom_index, string $content ){
  // Connexion à la base de données
  require_once 'connection.php';
  $req = $bdd->query("SELECT * FROM $nom_de_la_table");

  // Parcours les résultats de la requete enregistré dans la variable information et crée un choix de select pour chaque entrée
  while ($donnees = $req->fetch()){
    echo 'aaa';
    echo '<option value="'. $donnees["$nom_index"]. '">' . $donnees["$content"] .' </option>';
}};

?>