<?php

/**
 * Description of Usuario
 *
 * @author saez_
 */
class Contenido {

    private $id;
    private $tipo;
    private $nombre;
    private $texto;
    private $ultima_modificacion;
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

    function getUltima_modificacion() {
        return $this->Ultima_modificacion;
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

    function setUltima_modificacion($Ultima_modificacion) {
        $this->Ultima_modificacion = $Ultima_modificacion;
    }

    function setUsuario_id($Usuario_id) {
        $this->Usuario_id = $Usuario_id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function save() {
        $query = "INSERT INTO contenido VALUES (NULL, '{$this->getTipo()}', '{$this->getNombre()}', '{$this->getTexto()}', '{$this->getUltima_modificacion()}', '{$this->getUsuario_id()}');";
        $save = $this->db->query($query);
        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

    public function update() {
        $result = false;
        $query = "UPDATE contenido SET nombre='{$this->getNombre()}', texto='{$this->getTexto()}', ultima_modificacion='{$this->getUltima_modificacion()}', Usuario_id='{$this->getUsuario_id()}' WHERE tipo = '{$this->getTipo()}';";

        $update = $this->db->query($query);
        $result = false;
        if ($update) {
            $result = true;
        }
        return $result;
    }
    public function updateById() {
        $result = false;
        $query = "UPDATE contenido SET nombre='{$this->getNombre()}', texto='{$this->getTexto()}', fecha_modificacion='{$this->getFecha_modificacion()}', Usuario_id='{$this->getUsuario_id()}' WHERE id = '{$this->getId()}';";
        $update = $this->db->query($query);
        $result = false;
        if ($update) {
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
    
    public function searchPregunta($busqueda) {
        if ($busqueda == 'all') {
            $query = "SELECT * FROM contenido WHERE tipo='pregunta' ORDER BY posicion;";
        } else {
            $query = "
                   SELECT * FROM contenido
	WHERE (nombre LIKE '%" . $busqueda . "%') AND tipo = 'pregunta'";
        }
        $resultado = $this->db->query($query);
        return $resultado;
    }
    
    public function query($query){
        $resultado = $this->db->query($query);
        return $resultado;
    }
}
