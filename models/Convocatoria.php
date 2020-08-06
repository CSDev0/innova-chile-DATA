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

      $y = $this->db->query("SELECT * FROM anoconvocatoria WHERE ano = {$this->getAno()} ;");
      $ano = $y->fetch_object();
      if ($ano->id) {
      }else {
        $query2 = "INSERT INTO anoconvocatoria VALUES (NULL, {$this->getAno()} );";
        if ($sYear = $this->db->query($query2)) {}
          else{
            $sYear = $this->db->error;
            return $sYear;
          }
          $y = $this->db->query("SELECT * FROM anoconvocatoria WHERE ano = {$this->getAno()} ;");
          $ano = $y->fetch_object();
      }

      $query = "INSERT INTO convocatoria VALUES (NULL, '{$this->getArchivo()}', '{$this->getLlamado()}', {$ano->id} );";

      if ($save = $this->db->query($query)) {}
        else{
          $save = $this->db->error;
          return $save;
        }


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
          $query = "SELECT * FROM convocatoria;";
      } else {
          if (is_numeric($busqueda)) {
              $query = "SELECT * FROM convocatoria WHERE llamado = " . $busqueda . ";";
          } else {
              $query = "SELECT * FROM convocatoria WHERE archivo LIKE '%" . $busqueda . "%'";
          }
      }
      $resultado = $this->db->query($query);
      return $resultado;
  }

  public function getConvocatoriaById() {
      $result = false;
      $query = "SELECT * FROM convocatoria WHERE id = {$this->getId()} LIMIT 1;";
      $grafico = $this->db->query($query);

      if ($grafico) {

        $result = $grafico->fetch_object();
        $conv = new Convocatoria();
        $conv->setId($result->id);
        $conv->setAno($result->convocatoria_id_ano);
        $conv->setLlamado($result->llamado);
        $conv->setArchivo($result->archivo);
      } else{
          $result = $this->db->error;
          return $result;
        }
      return $conv;
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
      $estudios = $this->db->query("SELECT * FROM convocatoria ORDER BY convocatoria_id_ano DESC;");
      if ($estudios) {
        $i=0;
        while ($result = $estudios->fetch_object()) {
            $convocatorias[$i] = $result;
            $i++;
        }
        if(isset($convocatorias)){
            return $convocatorias;
        } else {
            return false;
        }
      } else{
          $result = $this->db->error;
          return $result;
        }
  }
  public function getAnoById() {
    $query="SELECT * FROM anoconvocatoria WHERE id ={$this->getAno()};";
    $estudios = $this->db->query($query);
    if ($estudios) {
      return $estudios->fetch_object();
    }else {
      $result = $this->db->error;
      return $result;
    }

  }
  public function getAnos() {
      $estudios = $this->db->query("SELECT * FROM anoconvocatoria ORDER BY ano DESC;");
      if ($estudios) {
        $i=0;
        while ($result = $estudios->fetch_object()) {
          $convocatorias[$i] = $result;
          $i++;
        }
        return $convocatorias;
      } else{
          $result = $this->db->error;
          return $result;
        }
  }

}
?>
