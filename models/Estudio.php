<?php

/**
 * Description of Usuario
 *
 * @author saez_
 */
class Usuario {

    private $id;
    private $nombre;
    private $descripcion;
    private $ano_estudio;
    private $archivo;
    private $enlace;
    private $fecha;
    private $tipo;
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    function getId() {
        return $this->id;
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

    function getFecha() {
        return $this->fecha;
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

    function setFecha($fecha) {
        $this->fecha = $this->db->real_escape_string($fecha);
    }

    function setTipo($tipo) {
        $this->tipo = $this->db->real_escape_string($tipo);
    }

    public function save() {
        $now = new DateTime();
        $date = $now->format("Y-m-d H:i");
        
        $query = "INSERT INTO estudio VALUES (NULL, '{$this->getNombre()}', '{$this->getDescripcion()}', '{$this->getAno_estudio()}', ";
        if ($this->getTipo() == 'estudio') {
            $query .= "{$this->getArchivo()}, ";
        } else {
            $query .= "NULL, ";
        }
        if ($this->getTipo() == 'lectura') {
            $query .= "{$this->getEnlace()}, ";
        } else {
            $query .= "NULL, ";
        }
        $query .= "'" . $date . "', '{$this->getClave()}', '{$this->getTipo()}', '1');";

        $save = $this->db->query($query);
        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

}
