<?php
/**
 *
 */
class Dato_destacado {

  private $id;
  private $nombre;
  private $valor;

  function __construct()
  {
    $this->db = Database::connect();
  }

  function getId() {
    return $this->id;
  }
  function getNombre() {
    return $this->nombre;
  }
  function getValor() {
    return $this->valor;
  }

  function setId($id) {
    $this->id = $id;
  }
  function setNombre($nombre) {
    $this->nombre = $nombre;
  }
  function setValor($valor) {
    $this->valor = $valor;
  }

  public function getOne() {
    $query = "SELECT * FROM datodestacado WHERE id = {$this->getId()};";
    $dato = $this->db->query($query);
    if ($dato) {
      $dato = $dato->fetch_object();
    }
    else {
      $dato = false;
    }
    return $dato;
  }

  public function update() {
    $valor = json_encode($this->getValor());
    if ($valor != null) {
    }else {
      $valor = '{"0":["null","null"]}';
    }

    $query = "UPDATE datodestacado SET datos='{$valor}';";
    $save = $this->db->query($query);
    $result = false;
    if ($save) {
        $result = true;
    }
    return $result;
  }


}



 ?>
