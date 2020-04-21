<?php
class Groupe {
  private $_idGroupe;
  private $_nomGroupe;

  public function __construct(array $donnees) {
    $this->hydrate($donnees);
  }

  public function hydrate(array $donnees) {
    foreach ($donnees as $key => $value) {
      $methode = 'set'.ucfirst($key);

      if (method_exists($this, $methode)) {
        $this->$methode($value);
      }
    }
  }

  public function getId_groupe() {
    return $this->_idGroupe;
  }
  public function setId_groupe($id) {
    $id = (int)$id;
    if ($id > 0) {
      $this->_idGroupe = $id;
    }
  }

  public function getNom_groupe() {
    return $this->_nomGroupe;
  }
  public function setNom_groupe($nom) {
    if(!preg_match('~[0-9]~', $nom)){
      $this->_nomGroupe = $nom;
    }
  }
}
?>