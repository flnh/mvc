<?php
function afficherListeMusiciens($listeMusiciens) {
    ?>
    <table>
      <thead>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Date de Creation</th>
        <th>Role</th>
      </thead>
      <tbody>
        <?php 
        for ($i=0; $i < count($listeMusiciens); $i++) {
          ?>
          <tr>
            <td><?=$listeMusiciens[$i]->getNom()?></td>
            <td><?=$listeMusiciens[$i]->getPrenom()?></td>
            <td><?=$listeMusiciens[$i]->getDateCreation()?></td>
            <td><?=$listeMusiciens[$i]->getRole()?></td>
          </tr>
          <?php
        }
        ?>
      </tbody>
    </table>
    <?php
}
?>