<?php

/**
 * Description of Usuario
 *
 * @author saez_
 */
class Contenido {

    private $id;
    private $tipo;
    private $texto;
    private $fecha_modificacion;
    private $Usuario_id;
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    function getId() {
        return $this->id;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getTexto() {
        return $this->texto;
    }

    function getFecha_modificacion() {
        return $this->fecha_modificacion;
    }

    function getUsuario_id() {
        return $this->Usuario_id;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setTexto($texto) {
        $this->texto = $texto;
    }

    function setFecha_modificacion($fecha_modificacion) {
        $this->fecha_modificacion = $fecha_modificacion;
    }

    function setUsuario_id($Usuario_id) {
        $this->Usuario_id = $Usuario_id;
    }

    public function save() {

        $query = "INSERT INTO contenido VALUES (NULL, '{$this->getTipo()}', '{$this->getTexto()}', '{$this->getFecha_modificacion()}', '{$this->getUsuario_id()}');";

        $save = $this->db->query($query);
        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

    public function update() {
        $result = false;
        $query = "UPDATE contenido SET texto='{$this->getTexto()}', fecha_modificacion='{$this->getFecha_modificacion()}', Usuario_id='{$this->getUsuario_id()}' WHERE tipo = '{$this->getTipo()}';";
        

        $save = $this->db->query($query);
        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

    public function getContenidoByTipo() {
        $result = false;
        $query = "SELECT * FROM contenido WHERE tipo='{$this->getTipo()}' LIMIT 1;";
        $contenido = $this->db->query($query);
        if ($contenido) {
            $result = $contenido->fetch_object();
        }
        return $result;
    }

}
