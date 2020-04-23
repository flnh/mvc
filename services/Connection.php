<?php
class Connection {
  protected $bdd;

  public function __construct() {
    $this->bdd = new PDO("mysql:host=localhost;dbname=concert","root", "", array(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION));
  }
}
?>