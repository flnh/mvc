<?php
class Musicien {
  private $_id;
  private $_nom;
  private $_prenom;
  private $_groupeCible;
  private $_dateCreation;
  private $_role;

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

  public function getId() {
    return $this->_id;
  }
  public function setId($id) {
    $id = (int)$id;
    if ($id > 0) {
      $this->_id = $id;
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
    $this->_groupeCible = $groupeCible;
  }

  public function getDateCreation() {
    return $this->_dateCreation;
  }
  public function setDateCreation($value) {
    $this->_dateCreation = $value;
  }

  public function getRole() {
    return $this->_role;
  }
  public function setRole($role) {
    $this->_role = $role;
  }
}
?>