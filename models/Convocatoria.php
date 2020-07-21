<?php
/**
 *
 */
class Convocatoria
{

  private $id;
  private $archivo;
  private $ano;
  private $llamado;
  private $db;


  public function __construct() {
      $this->db = Database::connect();
  }
  function getId() {
      return $this->id;
  }
  function getArchivo() {
      return $this->archivo;
  }
  function getAno() {
      return $this->ano;
  }
  function getLlamado() {
      return $this->llamado;
  }

  function setId($id) {
      $this->id = $id;
  }
  function setArchivo($archivo) {
      $this->archivo = $archivo;
  }
  function setAno($ano) {
      $this->ano = $ano;
  }
  function setLlamado($llamado) {
      $this->llamado = $llamado;
  }

  public function save() {

      $now = new DateTime();
      $date = $now->format("Y-m-d H:i:s");

      $query = "INSERT INTO convocatoria VALUES (NULL, '{$this->getArchivo()}', {$this->getAno()},{$this->getLlamado()} );";

      $save = $this->db->query($query);

      $result = false;
      if ($save) {
          require_once 'models/Log.php';
          $archivo_nombre = substr($this->getArchivo(), strrpos($this->getArchivo(), '/') + 1);
          $log = new Log();
          $log->setFecha($date);
          $log->setTipo('Agregar');
          $log->setActividad('Convocatoria->' . $archivo_nombre);
          $log->setUsuario_id($_SESSION['identidad']->id);
          $log->save();
          $result = true;
      }
      return $result;
  }

  public function search($busqueda) {
      if ($busqueda == 'all') {
          $query = "SELECT * FROM estudio ORDER BY año DESC;";
      } else {
          if (is_numeric($busqueda)) {
              $query = "SELECT * FROM estudio WHERE año = " . $busqueda . ";";
          } else {
              $query = "SELECT * FROM estudio WHERE archivo LIKE '%" . $busqueda . "%'";
          }
      }
      $resultado = $this->db->query($query);
      return $resultado;
  }

  public function getConvocatoriaById() {
      $result = false;
      $query = "SELECT * FROM graficodestacado WHERE id='{$this->getId()}' LIMIT 1;";
      $grafico = $this->db->query($query);
      if ($grafico) {
          $result = $grafico->fetch_object();
      }
      return $result;
  }

  public function delete() {
      $now = new DateTime();
      $date = $now->format("Y-m-d H:i:s");
      $result = false;
      $query = "DELETE FROM convocatoria WHERE id = '$this->id'";
      $convocatoria = new Convocatoria();
      $convocatoria->setId($this->id);
      $con_eliminado = $convocatoria->getConvocatoriaById();
      if ($this->db->query($query) == TRUE && $this->db->affected_rows > 0) {
          require_once 'models/Log.php';
          $archivo_nombre = substr($con_eliminado->getArchivo(), strrpos($con_eliminado->getArchivo(), '/') + 1);
          $log = new Log();
          $log->setFecha($date);
          $log->setTipo('Eliminar');
          $log->setActividad('Convocatoria->' . $archivo_nombre);
          $log->setUsuario_id($_SESSION['identidad']->id);
          $log->save();
          $result = true;
      } else {
          $result = false;
      }
      return $result;
  }

  public function getAll() {
      $estudios = $this->db->query("SELECT * FROM convocatoria ORDER BY año ASC;");
      return $estudios;
  }

}
?>
