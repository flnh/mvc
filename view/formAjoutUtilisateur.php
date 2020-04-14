<?php
require '../functions/select.php';
?>
<form action="" method="post">
  <select name="liste_groupe" id="liste_groupe">
    <?php  
        select_item('liste_groupes', 'id_groupe', 'nom_groupe');
    ?>
  </select>
  <label for="nom">Nom</label>
  <input type="text" id="nom" name="nom">
  <label for="prenom">Prenom</label>
  <input type="text" id="prenom" name="prenom">
  <button type="submit">Envoyer</button>
</form>