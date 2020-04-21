<?php
function afficherListeGroupes(array $listeGroupes) {
  for ($i=0; $i < count($listeGroupes); $i++) {
    // echo '<option value="'. $donnees["$nom_index"]. '">' . $donnees["$content"] .' </option>';
    ?>
    <option value="<?=$listeGroupes[$i]->getId_groupe()?>"><?=$listeGroupes[$i]->getNom_groupe()?></option>
    <?php
  }
}
?>