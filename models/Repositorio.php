<?php

/**
 * Description of Usuario
 *
 * @author saez_
 */
class Repositorio {

    private $id;
    private $usuario;
    private $repositorio;
    private $ultima_modificacion;
    private $Usuario_id;
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    function getId() {
        return $this->id;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function getRepositorio() {
        return $this->repositorio;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function setRepositorio($repositorio) {
        $this->repositorio = $repositorio;
    }

    function getUltima_modificacion() {
        return $this->ultima_modificacion;
    }

    function setUltima_modificacion($ultima_modificacion) {
        $this->ultima_modificacion = $ultima_modificacion;
    }

    function getUsuario_id() {
        return $this->Usuario_id;
    }

    function setUsuario_id($Usuario_id) {
        $this->Usuario_id = $Usuario_id;
    }

    public function update() {
        $query = "UPDATE repositorio SET usuario='{$this->getUsuario()}', repositorio = '{$this->getRepositorio()}', ultima_modificacion = '{$this->getUltima_modificacion()}', Usuario_id = '{$this->getUsuario_id()}'";
        $query .= "WHERE id = {$this->getId()};";
        $repo = new Repositorio();
        $repo->setId($this->getId());
        $repo_antiguo = $repo->getRepoById()->fetch_object();
        $save = $this->db->query($query);
        $result = false;
        if ($save) {
            require_once 'models/Log.php';
            $log = new Log();
            $log->setFecha($this->getUltima_modificacion());
            $log->setTipo('Modificar');
            $log->setActividad('Repositorio->' . $repo_antiguo->repositorio);
            $log->setUsuario_id($this->getUsuario_id());
            $log->save();
            $result = true;
        }
        return $result;
    }

    public function getRepoById() {
        $query = "SELECT * FROM repositorio WHERE id = '{$this->getId()}' LIMIT 1";
        $repo = $this->db->query($query);
        return $repo;
    }

}
