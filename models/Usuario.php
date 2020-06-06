<?php

/**
 * Description of Usuario
 *
 * @author saez_
 */
class Usuario {

    private $id;
    private $rut;
    private $nombre;
    private $apellido;
    private $correo;
    private $clave;
    private $tipo;
    private $activado;
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    function getRut() {
        return $this->rut;
    }

    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellido() {
        return $this->apellido;
    }

    function getCorreo() {
        return $this->correo;
    }

    function getClave() {
        return password_hash($this->db->real_escape_string($this->clave), PASSWORD_BCRYPT, ['cost' => 4]);
    }

    function getActivado() {
        return $this->activado;
    }

    function getTipo() {
        return $this->tipo;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setRut($rut) {
        $this->rut = $this->db->real_escape_string($rut);
    }

    function setNombre($nombre) {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    function setApellido($apellido) {
        $this->apellido = $this->db->real_escape_string($apellido);
    }

    function setCorreo($correo) {
        $this->correo = $this->db->real_escape_string($correo);
    }

    function setClave($clave) {
        $this->clave = $this->db->real_escape_string($clave);
    }

    function setActivado($activado) {
        $this->activado = $activado;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    public function login() {
        $result = false;
        $correo = $this->correo;
        $clave = $this->clave;

        //Comprobar que el usuario exista
        $query = "SELECT * FROM usuario WHERE correo = '$correo'";
        $login = $this->db->query($query);

        if ($login && $login->num_rows == 1) {
            $usuario = $login->fetch_object();
            $validar = password_verify($clave, $usuario->clave);


            if ($validar) {

                $result = $usuario;
            } else {
                if ($clave == $usuario->clave) {
                    $result = $usuario;
                }
            }
        }
        return $result;
    }

    //Metodos usuario
    //Registrar o Guardar un Usuario en la BD.
    public function save() {
        $query = "INSERT INTO usuario VALUES (NULL, '{$this->getRut()}', '{$this->getNombre()}', '{$this->getApellido()}','{$this->getCorreo()}', '{$this->getClave()}', '{$this->getTipo()}', '{$this->getActivado()}')";
        $save = $this->db->query($query);
        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

    //Eliminar un Usuario de la BD por su ID.
    public function delete($id) {
        $result = false;
        $query1 = "SET FOREIGN_KEY_CHECKS=0;";
        $this->db->query($query1);
        $query = "DELETE FROM usuario WHERE id_usuario = '$id'";
        if ($this->db->query($query) == TRUE && $this->db->affected_rows > 0) {
            require_once 'models/Direccion.php';
            $direccion = new Direccion();
            $dir = $direccion->deleteAllFrom($id);
            $query2 = " SET FOREIGN_KEY_CHECKS=1;";
            $this->db->query($query2);
            $result = true;
        } else {
            $result = false;
        }

        return $result;
    }

    //actualizar un usuario.

    public function update() {
        $query = "UPDATE usuario SET nombre = '{$this->getNombre()}', apellido = '{$this->getApellido()}'";
        if ($this->getCorreo() != NULL) {
            $query .= ", correo = '{$this->getCorreo()}' ";
        }
        $query .= "WHERE id_usuario = {$this->getId()};";

        $save = $this->db->query($query);

        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

    //Obtener un usuario por su id.
    public function getOne() {
        $query = "SELECT * FROM usuario WHERE id = {$this->getId()};";
        $usuario = $this->db->query($query);
        if ($usuario) {
            $usuario = $usuario->fetch_object();
        } else {
            $usuario = false;
        }
        return $usuario;
    }

    //Obtener todos los usuarios
    public function getAll() {
        $usuarios = $this->db->query("SELECT * FROM usuario;");
        return $usuarios;
    }

    //Actualizar la clave del usuario.
    public function updateClave() {
        $query = "UPDATE usuario SET clave = '{$this->getClave()}' WHERE id = {$this->getId()}";
        $save = $this->db->query($query);

        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

    //Buscar un usuario.
    public function find($busqueda) {
        $query = "SELECT * FROM usuario WHERE (nombre LIKE '%$busqueda%' OR rut LIKE '%$busqueda%' OR correo LIKE '%$busqueda%')";

        $usuarios = $this->db->query($query);

        return $usuarios;
    }

    //Obtener un usuario por su correo.
    public function getUsuarioByCorreo() {

        $query = "SELECT * FROM usuario WHERE correo = '{$this->getCorreo()}' LIMIT 1";

        $usuario = $this->db->query($query);

        return $usuario;
    }

    //Obtener un usuario por su id.
    public function getUsuarioById() {
        $query = "SELECT * FROM usuario WHERE id = '{$this->getId()}' LIMIT 1";

        $usuario = $this->db->query($query);
        return $usuario;
    }

    public function consulta($query) {
        $resultado = $this->db->query($query);

        return $resultado;
    }

    public function buscar($busqueda) {
        if ($busqueda == 'all') {
            $query = "SELECT * FROM usuario ORDER BY id;";
        } else {
            $query = "
                   SELECT * FROM usuario
	WHERE rut LIKE '%" . $busqueda . "%'
	OR correo LIKE '%" . $busqueda . "%'
	OR nombre LIKE '%" . $busqueda . "%'
	OR apellido LIKE '%" . $busqueda . "%' ";
        }
        $resultado = $this->db->query($query);
        return $resultado;
    }

}
