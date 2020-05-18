<?php
class Liaison {
  private $_idJointure;
  private $_musicienId;
  private $_groupeId;
  private $_created;
  private $_updated;
  private $_del;
  private $_roleId;

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

  public function getIdJointure() {
    return $this->_idJointure;
  }
  public function setId_jointure($id) {
    $id = (int)$id;
    if ($id > 0) {
      $this->_idJointure = $id;
    }
  }

  public function getMusicienId() {
    return $this->_musicienId;
  }
  public function setMusicien_id($id) {
    $id = (int)$id;
    if ($id > 0) {
      $this->_musicienId = $id;
    }
  }

  public function getGroupeId() {
    return $this->_groupeId;
  }
  public function setGroupe_id($id) {
    $id = (int)$id;
    if ($id > 0) {
      $this->_groupeId = $id;
    }
  }

  public function getCreated() {
    return $this->_created;
  }
  public function setCreated($date) {
    $this->_created = $date;
  }

  public function getUpdated() {
    return $this->_updated;
  }
  public function setUpdated($date) {
    $this->_updated = $date;
  }

  public function getDel() {
    return $this->_del;
  }
  public function setDel($delete) {
    $delete = (int)$delete;
    if ($delete === 0 || $delete === 1) {
      $this->_del = $delete;
    }
  }

  public function getRoleId() {
    return $this->_roleId;
  }
  public function setRole_id($id) {
    $id = (int)$id;
    if ($id > 0) {
      $this->_roleId = $id;
    }
  }
}
?>