<?php
class Token {

    private $id;
    private $correo;
    private $token_key;
    private $expira;
    
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }
    
    function getId() {
        return $this->id;
    }

    function getCorreo() {
        return $this->correo;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setCorreo($correo) {
        $this->correo = $correo;
    }

    function getExpira() {
        return $this->expira;
    }

    function setExpira($expira) {
        $this->expira = $expira;
    }
    function getToken_key() {
        return $this->token_key;
    }

    function setToken_key($token_key) {
        $this->token_key = $token_key;
    }

        public function save(){
        $result = false;
        $query = "INSERT INTO token VALUES(NULL, '{$this->getCorreo()}', {$this->getToken_key()}, '{$this->getExpira()}')";
        $save = $this->db->query($query);
        if($save){
            $result = true;
        }
        return $result;
    }
    public function getTokenByToken_key(){
        $query = "SELECT * FROM token WHERE token_key = {$this->getToken_key()} LIMIT 1";
        $save = $this->db->query($query);
        return $save;
    }
    
    public function delete(){
        $result = false;
        $query = "DELETE FROM token WHERE correo = '{$this->getCorreo()}'";
        if ($this->db->query($query)==TRUE && $this->db->affected_rows > 0 ) {
            $result = true;
        }else{
            $result = false;
        }
        return $result;
    }
}