<?php

/**
 * Description of Usuario
 *
 * @author saez_
 */
class Estudio {

    private $id;
    private $nombre;
    private $descripcion;
    private $ano_estudio;
    private $archivo;
    private $enlace;
    private $ultima_modificacion;
    private $tipo;
    private $Usuario_id;
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    function getId() {
        return $this->id;
    }

    function getEnlace() {
        return $this->enlace;
    }

    function setEnlace($enlace) {
        $this->enlace = $enlace;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getAno_estudio() {
        return $this->ano_estudio;
    }

    function getArchivo() {
        return $this->archivo;
    }

    function getUltima_modificacion() {
        return $this->ultima_modificacion;
    }

    function getTipo() {
        return $this->tipo;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $this->db->real_escape_string($descripcion);
    }

    function setAno_estudio($ano_estudio) {
        $this->ano_estudio = $this->db->real_escape_string($ano_estudio);
    }

    function setArchivo($archivo) {
        $this->archivo = $this->db->real_escape_string($archivo);
    }

    function setUltima_modificacion($ultima_modificacion) {
        $this->ultima_modificacion = $this->db->real_escape_string($ultima_modificacion);
    }

    function setTipo($tipo) {
        $this->tipo = $this->db->real_escape_string($tipo);
    }

    function getUsuario_id() {
        return $this->Usuario_id;
    }

    function setUsuario_id($Usuario_id) {
        $this->Usuario_id = $Usuario_id;
    }

    public function save() {

        $now = new DateTime();
        $date = $now->format("Y-m-d H:i:s");

        $query = "INSERT INTO estudio VALUES (NULL, '{$this->getNombre()}', '{$this->getDescripcion()}', '{$this->getAno_estudio()}', ";
        if ($this->getTipo() == 'estudio') {
            $query .= "'{$this->getArchivo()}', ";
        } else {
            $query .= "NULL, ";
        }
        if ($this->getTipo() == 'lectura') {
            $query .= "'{$this->getEnlace()}', ";
        } else {
            $query .= "NULL, ";
        }
        $query .= "'" . $date . "', '{$this->getTipo()}', '{$this->getUsuario_id()}');";

        $save = $this->db->query($query);

        $result = false;
        if ($save) {
            require_once 'models/Log.php';
            $log = new Log();
            $log->setFecha($date);
            $log->setTipo('Agregar');
            $log->setActividad('Estudios->' . $this->getNombre());
            $log->setTxt_nuevo($this->getDescripcion());
            $log->setUsuario_id($this->getUsuario_id());
            $log->save();
            $result = true;
        }
        return $result;
    }

    public function getAll() {
        $estudios = $this->db->query("SELECT * FROM estudio ORDER BY UNIX_TIMESTAMP(ultima_modificacion) DESC;");
        return $estudios;
    }

    public function getAllByAno() {
        $estudios = $this->db->query("SELECT * FROM estudio ORDER BY ano_estudio DESC");
        return $estudios;
    }

    public function getEstudioById() {
        $result = false;
        $query = "SELECT * FROM estudio WHERE id = '{$this->id}' LIMIT 1";
        $estudio = $this->db->query($query);
        if ($estudio) {
            $result = $estudio->fetch_object();
        }
        return $result;
    }

    public function delete() {
        $now = new DateTime();
        $date = $now->format("Y-m-d H:i:s");
        $result = false;
        $query = "DELETE FROM estudio WHERE id = '$this->id'";
        $estudio = new Estudio();
        $estudio->setId($this->id);
        $est_eliminado = $estudio->getEstudioById();
        if ($this->db->query($query) == TRUE && $this->db->affected_rows > 0) {
            require_once 'models/Log.php';
            $log = new Log();
            $log->setFecha($date);
            $log->setTipo('Eliminar');
            $log->setActividad('Estudios->' . $est_eliminado->nombre);
            $log->setTxt_nuevo($est_eliminado->descripcion);
            $log->setUsuario_id($est_eliminado->Usuario_id);
            $log->save();
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    public function search($busqueda) {
        if ($busqueda == 'all') {
            $query = "SELECT * FROM estudio ORDER BY ultima_modificacion DESC;";
        } else {
            if (is_numeric($busqueda)) {
                $query = "SELECT * FROM estudio WHERE ano_estudio = " . $busqueda . ";";
            } else {
                $query = "
                   SELECT * FROM estudio
	WHERE nombre LIKE '%" . $busqueda . "%'
	OR archivo LIKE '%" . $busqueda . "%'
	OR ultima_modificacion LIKE '%" . $busqueda . "%' ";
            }
        }
        $resultado = $this->db->query($query);
        return $resultado;
    }

    public function update() {
        $now = new DateTime();
        $date = $now->format("Y-m-d H:i:s");
        $query = "UPDATE estudio SET nombre='{$this->getNombre()}', descripcion='{$this->getDescripcion()}', ano_estudio='{$this->getAno_estudio()}', ";
        if ($this->getArchivo() != null & $this->getArchivo() != false) {
            $query .= "archivo='{$this->getArchivo()}', ";
        }
        $query .= "enlace='{$this->getEnlace()}', ultima_modificacion='{$date}', Usuario_id ='{$this->getUsuario_id()}' WHERE id = {$this->getId()};";

        $save = $this->db->query($query);
        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

}
