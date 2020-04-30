<?php
class Role {
  private $_id;
  private $_role;

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

  public function getId_role() {
    return $this->_id;
  }

  public function setId_role($id) {
    $id = (int)$id;
    if ($id > 0) {
      $this->_id = $id;
    }
  }

  public function getNom_role() {
    return $this->_role;
  }

  public function setNom_role($role) {
    if (!empty($role)) {
      $this->_role = $role;
    }
  }
}
?>