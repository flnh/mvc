<?php

function membre_Groupe( $id_groupe){

    try{

        // Connexion à la base de données
        require "functions/connection.php";

        echo "<table>";

        $req = $bdd->prepare("SELECT * FROM liste_groupes WHERE id_groupe=:id");
        $req->execute(array(
            'id' => $id_groupe
        ));
        while($resultat = $req->fetch()){
            echo "<caption><h2>".$resultat['nom_groupe']."</h2></caption>";
        }


        $sql = 
            "SELECT 
                lm.nom_musicien as nom,lm.prenom_musicien as prenom, lg.nom_groupe as groupe,lglm.created as created
            FROM 
                liste_musiciens lm 
            INNER JOIN
                liste_groupes_avec_liste_musiciens lglm 
            ON 
                lm.id_musicien = lglm.musicien_id
            INNER JOIN
                liste_groupes lg 
            ON 
                lg.id_groupe = lglm.groupe_id
            WHERE 
                lg.id_groupe = :id
            AND 
                lglm.del = :nombre
            ";
        
        $req = $bdd->prepare($sql);
        $req->execute(array(
            'id' => $id_groupe,
            'nombre' => 0
        ));
            
        echo "<th>Prénom</th><th>Nom</th><th>Created</th>";

        while($donnees = $req->fetch()){
            echo "<tr>
                        <td>".$donnees['prenom']."</td><td>".$donnees['nom']."</td><td>".$donnees['created']."</td>
                </tr>";
        }
        
        echo "</table>";    
    
    
    }catch(Exception $e){
        echo "Erreur : "." ".$e->getMessage();
    }
}

?>