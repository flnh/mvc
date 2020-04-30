<?php
function afficherListeRolesSelect(array $listeRoles) {
  ?>
  <select name="role" id="role">
  <option value="">Sélectionnez un role</option>
  <?php
  for ($i=0; $i < count($listeRoles); $i++) {
    ?>
    <option value="<?=$listeRoles[$i]->getId_role()?>"><?=$listeRoles[$i]->getNom_role()?></option>
    <?php
  }
  ?>
  </select>
  <?php
}
?>