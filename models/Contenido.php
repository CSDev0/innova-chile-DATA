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
        return $this->ultima_modificacion;
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

    function setUltima_modificacion($ultima_modificacion) {
        $this->ultima_modificacion = $ultima_modificacion;
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
        $query = "INSERT INTO contenido VALUES (NULL, '{$this->getTipo()}', '{$this->getNombre()}', '{$this->getTexto()}', '{$this->getUltima_modificacion()}', '{$this->getUsuario_id()}', NULL);";

        $save = $this->db->query($query);
        $result = false;
        if ($save) {
            require_once 'models/Log.php';
            $log = new Log();
            $log->setFecha($this->getUltima_modificacion());
            $log->setTipo('Agregar');
            if ($this->getTipo() == 'pregunta') {
                $log->setActividad('Pregunta frecuente'.' <i class=icon-fa>&#xf0a9;</i> '.$this->getNombre());
            } else {
                $log->setActividad('Contenido'.' <i class=icon-fa>&#xf0a9;</i> '.$this->getNombre());
            }
            $log->setTxt_nuevo($this->getTexto());
            $log->setUsuario_id($this->getUsuario_id());
            $log->save();

            $result = true;
        }
        return $result;
    }

    public function update() {
        $result = false;
        $query = "UPDATE contenido SET nombre='{$this->getNombre()}', texto='{$this->getTexto()}', ultima_modificacion='{$this->getUltima_modificacion()}', Usuario_id='{$this->getUsuario_id()}' WHERE tipo = '{$this->getTipo()}';";
        $contenido = new Contenido();
        $contenido->setTipo($this->getTipo());
        $cont_antiguo = $contenido->getContenidoByTipo();

        $update = $this->db->query($query);
        $result = false;
        if ($update) {
            require_once 'models/Log.php';
            $log = new Log();
            $log->setFecha($this->getUltima_modificacion());
            $log->setTipo('Modificar');
            if ($this->getTipo() == 'pregunta') {
                $log->setActividad('Pregunta frecuente'.' <i class=icon-fa>&#xf0a9;</i> '.$this->getNombre());
            } else {
                $log->setActividad('Contenido'.' <i class=icon-fa>&#xf0a9;</i> '.$this->getNombre());
            }
            $log->setTxt_antiguo($cont_antiguo->texto);
            $log->setTxt_nuevo($this->getTexto());
            $log->setUsuario_id($this->getUsuario_id());
            $log->save();
            $result = true;
        }
        return $result;
    }

    public function updateById() {
        $result = false;
        $query = "UPDATE contenido SET nombre='{$this->getNombre()}', texto='{$this->getTexto()}', ultima_modificacion='{$this->getUltima_modificacion()}', Usuario_id='{$this->getUsuario_id()}' WHERE id = '{$this->getId()}';";
        $contenido = new Contenido();
        $contenido->setId($this->getId());
        $cont_antiguo = $contenido->getContenidoById();

        $update = $this->db->query($query);
        $result = false;
        if ($update) {
            require_once 'models/Log.php';
            $log = new Log();
            $log->setFecha($this->getUltima_modificacion());
            $log->setTipo('Modificar');
            if ($this->getTipo() == 'pregunta') {
                $log->setActividad('Pregunta frecuente'.' <i class=icon-fa>&#xf0a9;</i> '.$this->getNombre());
            } else {
                $log->setActividad('Contenido->'.' <i class=icon-fa>&#xf0a9;</i> '.$this->getNombre());
            }
            $log->setTxt_antiguo($cont_antiguo->texto);
            $log->setTxt_nuevo($this->getTexto());
            $log->setUsuario_id($this->getUsuario_id());
            $log->save();
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

    public function getContenidoById() {
        $result = false;
        $query = "SELECT * FROM contenido WHERE id='{$this->getId()}' LIMIT 1;";
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

    public function query($query) {
        $resultado = $this->db->query($query);
        return $resultado;
    }

    public function delete() {
        $now = new DateTime();
        $date = $now->format("Y-m-d H:i:s");
        $result = false;
        $query = "DELETE FROM contenido WHERE id = '$this->id'";
        $contenido = new Contenido();
        $contenido->setId($this->id);
        $cont_eliminado = $contenido->getContenidoById();
        if ($this->db->query($query) == TRUE && $this->db->affected_rows > 0) {
            require_once 'models/Log.php';
            $log = new Log();
            $log->setFecha($date);
            $log->setTipo('Eliminar');
            if($cont_eliminado->tipo == "pregunta"){
                $log->setActividad('Pregunta frecuente'.' <i class=icon-fa>&#xf0a9;</i> '.$cont_eliminado->nombre);
            }else{
                $log->setActividad('Contenido'.' <i class=icon-fa>&#xf0a9;</i> '.$cont_eliminado->nombre);
            }
            $log->setTxt_antiguo($cont_eliminado->texto);
            $log->setUsuario_id($cont_eliminado->Usuario_id);
            $log->save();
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

}
