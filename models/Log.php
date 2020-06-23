<?php

/**
 * Description of Usuario
 *
 * @author saez_
 */
class Log {

    private $id;
    private $fecha;
    private $tipo;
    private $actividad;
    private $txt_antiguo;
    private $txt_nuevo;
    private $Usuario_id;
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    function getId() {
        return $this->id;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getActividad() {
        return $this->actividad;
    }

    function getTxt_antiguo() {
        return $this->txt_antiguo;
    }

    function getTxt_nuevo() {
        return $this->txt_nuevo;
    }

    function getUsuario_id() {
        return $this->Usuario_id;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setActividad($actividad) {
        $this->actividad = $actividad;
    }

    function setTxt_antiguo($txt_antiguo) {
        $this->txt_antiguo = $txt_antiguo;
    }

    function setTxt_nuevo($txt_nuevo) {
        $this->txt_nuevo = $txt_nuevo;
    }

    function setUsuario_id($Usuario_id) {
        $this->Usuario_id = $Usuario_id;
    }

    public function save() {
        $query = "INSERT INTO log VALUES (NULL, '{$this->getFecha()}', '{$this->getTipo()}', '{$this->getActividad()}', '{$this->getTxt_antiguo()}', '{$this->getTxt_nuevo()}', '{$this->getUsuario_id()}');";

        $save = $this->db->query($query);
        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }
    public function getAll() {
        $logs = $this->db->query("SELECT * FROM log ORDER BY UNIX_TIMESTAMP(fecha) DESC LIMIT 1000 ;");
        return $logs;
    }
}
