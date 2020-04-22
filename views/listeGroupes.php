<?php
function afficherListeGroupesSelect(array $listeGroupes) {
  ?>
  <label for="liste_groupe">Liste des groupes</label>
  <select name="liste_groupe" id="liste_groupe">
  <?php
  for ($i=0; $i < count($listeGroupes); $i++) {
    $selected = "";
    if (isset($_GET['liste_groupe']) && $_GET['liste_groupe'] == $listeGroupes[$i]->getId_groupe()) {
      $selected = "selected";
    }
    ?>
    <option value="<?=$listeGroupes[$i]->getId_groupe()?>" <?=$selected?>><?=$listeGroupes[$i]->getNom_groupe()?></option>
    <?php
  }
  ?>
  </select>
  <button type="submit">Voir</button>
  <?php
}
?>