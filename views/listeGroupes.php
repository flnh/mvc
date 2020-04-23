<?php
function afficherListeGroupesSelect(array $listeGroupes) {
  ?>
  <select name="liste_groupe" id="liste_groupe">
  <option value="">Sélectionnez un groupe</option>
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
  <?php
}
?>