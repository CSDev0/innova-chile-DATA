<?php

/**
 * Description of Faltantes
 *
 * @author saez_
 */
class Faltantes {

    private $id;
    private $codigo;
    private $proyecto;
    private $correo;
    private $estado;
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    function getId() {
        return $this->id;
    }

    function getCodigo() {
        return $this->codigo;
    }

    function getProyecto() {
        return $this->proyecto;
    }

    function getCorreo() {
        return $this->correo;
    }

    function getEstado() {
        return $this->estado;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setProyecto($proyecto) {
        $this->proyecto = $proyecto;
    }

    function setCorreo($correo) {
        $this->correo = $correo;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    public function getCorreos($cantidad){
        $query = "SELECT * FROM faltantes WHERE estado = 0 LIMIT {$cantidad};";
        $correos = $this->db->query($query);
        if ($correos) {
            return $correos;
        } else {
            $correos = false;
        }
        return $correos;
    }

    public function setAllEstadoDefault() {
        $query = "UPDATE faltantes SET estado = 0 WHERE estado = 1;";
        $save = $this->db->query($query);
        if ($save) {
            $resultado = true;
        } else {
            $resultado = false;
        }
        return $resultado;
    }

    public function setEstadoEnviado() {
        $resultado = false;
        $query = "UPDATE faltantes SET estado = 1 WHERE id = {$this->getId()};";
        $update = $this->db->query($query);
        if ($update) {
            $resultado = true;
        } else {
            $resultado = false;
        }
        return $resultado;
    }
    public function setEstadoNoEnviado() {
        $resultado = false;
        $query = "UPDATE faltantes SET estado = 0 WHERE id = {$this->getId()};";
        $update = $this->db->query($query);
        if ($update) {
            $resultado = true;
        } else {
            $resultado = false;
        }
        return $resultado;
    }
}
