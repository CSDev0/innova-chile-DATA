<?php

class Archivo {

    private $id;
    private $archivo;

    function __construct() {
        $this->db = Database::connect();
    }

    function getId() {
        return $this->id;
    }

    function getArchivo() {
        return $this->archivo;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setArchivo($archivo) {
        $this->archivo = $archivo;
    }

    public function search($busqueda) {
        if ($busqueda == 'all') {
            $query = "SELECT * FROM archivo ORDER BY id DESC;";

        } else {

            $query = "
                   SELECT * FROM archivo
	WHERE archivo LIKE '%" . $busqueda . "%' ";

        }
        $resultado = $this->db->query($query);
        return $resultado;
    }

    public function save() {
        $now = new DateTime();
        $date = $now->format("Y-m-d H:i:s");

        $query = "INSERT INTO archivo VALUES (NULL, '{$this->getArchivo()}');";
        $save = $this->db->query($query);
        $result = false;
        if ($save) {
            require_once 'models/Log.php';
            $log = new Log();
            $log->setFecha($date);
            $log->setTipo('Agregar');
            $log->setActividad('Archivo->' . $this->getArchivo());
            $log->setUsuario_id($_SESSION['identidad']->id);
            $log->save();
            $result = true;
        }
        return $result;
    }
    public function delete(){
        $now = new DateTime();
        $date = $now->format("Y-m-d H:i:s");
        $query = "DELETE FROM archivo WHERE id = '{$this->getId()}';";
        $result = false;
        if ($this->db->query($query) == TRUE && $this->db->affected_rows > 0) {
            require_once 'models/Log.php';
            $log = new Log();
            $log->setFecha($date);
            $log->setTipo('Eliminar');
            $log->setActividad('Archivo->' . $this->getArchivo());
            $log->setUsuario_id($_SESSION['identidad']->id);
            $log->save();
            $result = true;
        }
        return $result;
    }
    public function getArchivoById(){
        $result = false;
        $query = "SELECT * FROM archivo WHERE id='{$this->getId()}' LIMIT 1;";
        $archivo = $this->db->query($query);
        if ($archivo) {
            $result = $archivo->fetch_object();
        }
        return $result;
    }
}
