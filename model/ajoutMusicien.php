<?php
class Musicien {
  private $_nom;
  private $_prenom;
  private $_groupeCible;
  private $_dateCreation;

  public function __construct($nom, $prenom, $groupeCible) {
    $this->setNom($nom);
    $this->setPrenom($prenom);
    $this->setGroupeCible($groupeCible);
    $this->setDateCreation();
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
$test = new Musicien('testi', 'testa', '18');
var_dump($test);
?>