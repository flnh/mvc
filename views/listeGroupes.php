<?php
function afficherListeGroupes(array $listeGroupes) {
  for ($i=0; $i < count($listeGroupes); $i++) {
    $selected = "";
    if (isset($_GET['liste_groupe']) && $_GET['liste_groupe'] == $i + 1) {
      $selected = "selected";
    }
    ?>
    <option value="<?=$listeGroupes[$i]->getId_groupe()?>" <?=$selected?>><?=$listeGroupes[$i]->getNom_groupe()?></option>
    <?php
  }
}
?>