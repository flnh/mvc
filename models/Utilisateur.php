<?php
class Utilisateur {
  private $_id_utilisateur;
  private $_login_utilisateur;
  private $_password_utilisateur;

  public function __construct(array $donnees)
  {
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

  public function getId_utilisateur()
  {
    return $this->_id_utilisateur;
  }

  public function setId_utilisateur($_id_utilisateur)
  {
    $this->_id_utilisateur = $_id_utilisateur;

    return $this;
  }

  public function getLogin_utilisateur()
  {
    return $this->_login_utilisateur;
  }

  public function setLogin_utilisateur($_login_utilisateur)
  {
    $this->_login_utilisateur = $_login_utilisateur;

    return $this;
  }

  public function getPassword_utilisateur()
  {
    return $this->_password_utilisateur;
  }

  public function setPassword_utilisateur($_password_utilisateur)
  {
    $this->_password_utilisateur = $_password_utilisateur;

    return $this;
  }

  public function hashPassword() {
    $this->_password_utilisateur = hash('md5', $this->_password_utilisateur);
  }
}
?>