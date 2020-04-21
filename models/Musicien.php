<?php
class Musicien {
  private $_nom;
  private $_prenom;
  private $_groupeCible;
  private $_dateCreation;

  // public function __construct($nom, $prenom, $groupeCible) {
  //   $this->setNom($nom);
  //   $this->setPrenom($prenom);
  //   $this->setGroupeCible($groupeCible);
  //   $this->setDateCreation();
  // }

  public function __construct(array $donnees) {
    $this->hydrate($donnees);
  }

  public function hydrate(array $donnees) {
    foreach ($donnees as $key => $value) {
      $methode = 'set' . ucfirst($key);

      if (method_exists($this, $methode)) {
        $this->$methode($value);
      }
    }
  }

  public function getNom() {
    return $this->_nom;
  }
  public function setNom($nom) {
    if(!preg_match('~[0-9]~', $nom)){
      $this->_nom = $nom;
    }
  }

  public function getPrenom() {
    return $this->_prenom;
  }
  public function setPrenom($prenom) {
    if(!preg_match('~[0-9]~', $prenom)){
      $this->_prenom = $prenom;
    }
  }

  public function getGroupeCible() {
    return $this->_groupeCible;
  }
  public function setGroupeCible($groupeCible) {
    if (is_numeric($groupeCible)) {
      $this->_groupeCible = (int) $groupeCible;
    }
  }

  public function getDateCreation() {
    return $this->_dateCreation;
  }
  public function setDateCreation() {
    $this->_dateCreation = date('Y-m-d h:i');
  }
}
?>