<?php
$idGroupe = ['idGroupe' => $_GET['groupe']];
$listeMembres = $bdd->prepare(
  'SELECT membres.nom, membres.prenom, membres.date_creation FROM `j_membres_groupes`
  JOIN groupes
  ON j_membres_groupes.id_groupe = groupes.id
  JOIN membres
  ON j_membres_groupes.id_membre = membres.id
  WHERE groupes.id = :idGroupe AND membres.del=0');
$listeMembres->execute($idGroupe);

$nomGroupe = $bdd->prepare(
  'SELECT nom_groupe FROM groupes
  WHERE id = :idGroupe'
);
$nomGroupe->execute($idGroupe);
$nomGroupe = $nomGroupe->fetch();
?>
<table>
  <thead>
    <tr>
      <th colspan="3"><?=$nomGroupe['nom_groupe']?></th>
    </tr>
    <tr>
      <th>Nom</th>
      <th>Prenom</th>
      <th>Date de creation</th>
    </tr>
  </thead>
  <tbody>
    <?php
    while ($membre = $listeMembres->fetch()) {
      ?>
      <tr>
        <td><?=$membre['nom']?></td>
        <td><?=$membre['prenom']?></td>
        <td><?=$membre['date_creation']?></td>
      </tr>
      <?php
    }
    ?>
  </tbody>
</table>