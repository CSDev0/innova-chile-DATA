<?php

/**
 *
 */
class Web {

  private $id;
  private $nombre_web;
  private $ig_link;
  private $fb_link;
  private $twt_link;
  private $pie_pagina;
  private $pie_link;
  private $db;

  function __construct() {
    $this->db = Database::connect();
  }
  function getId() {
    return $this->id;
  }
  function getNombreWeb() {
    return $this->nombre_web;
  }
  function getIgLink() {
    return $this->ig_link;
  }
  function getFbLink() {
    return $this->fb_link;
  }
  function getTwtLink() {
    return $this->twt_link;
  }
  function getPiePagina() {
    return $this->pie_pagina;
  }
  function getPieLink() {
    return $this->pie_link;
  }


  function setId($id) {
    $this->id = $id;
  }
  function setNombreWeb($nombre_web) {
    $this->nombre_web = $nombre_web;
  }
  function setIgLink($ig_link) {
    $this->ig_link = $ig_link;
  }
  function setFbLink($fb_link) {
    $this->fb_link = $fb_link;
  }
  function setTwtLink($twt_link) {
    $this->twt_link = $twt_link;
  }
  function setPiePagina($pie_pagina) {
    $this->pie_pagina = $pie_pagina;
  }
  function setPieLink($pie_link) {
    $this->pie_link = $pie_link;
  }

  public function getOne() {
    $query = "SELECT * FROM web WHERE id = {$this->getId()};";
    $web = $this->db->query($query);
    if ($web) {
      $web = $web->fetch_object();
    }
    else {
      $web = false;
    }
    return $web;
  }

  public function addPiePagina($pie_pagina,$newElement) {
    #en proceso
    array_push($pie_pagina,$newElement);
    $this->setPiePagina($pie_pagina);
  }

  public function save()
  {
    $pie_pagina = implode(",",$this->getPiePagina());
    $query = "INSERT INTO web VALUES (NULL,'{$this->getNombreWeb()}','{$this->getIgLink()}','{$this->getFbLink()}','{$this->getTwtLink()}','{$pie_pagina}')";
    $save = $this->db->query($query);
    $result = false;
    if ($save) {
      $result = true;
    }
    return $result;
  }

  public function delete() {
      $result = false;
      $query1 = "SET FOREIGN_KEY_CHECKS=0;";
      $this->db->query($query1);
      $query = "DELETE FROM web WHERE id = '{$this->getId()}'";
      if ($this->db->query($query) == TRUE && $this->db->affected_rows > 0) {
          $result = true;
      } else {
          $result = false;
      }
      return $result;
  }

  public function update()
  {
    $pie_pagina = implode(",",$this->getPiePagina());
    $pie_link = implode(",",$this->getPieLink());
    $query = "UPDATE web SET nombre_web='{$this->getNombreWeb()}',ig_link='{$this->getIgLink()}',fb_link='{$this->getFbLink()}',twt_link='{$this->getTwtLink()}',pie_pagina='{$pie_pagina}',pie_link='{$pie_link}';";
    $save = $this->db->query($query);
    $result = false;
    if ($save) {
        $result = true;
    }
    return $result;
  }

#fin clase

}


 ?>