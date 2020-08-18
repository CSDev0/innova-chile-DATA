<?php

/**
 *
 */
class Web {

    private $id;
    private $nombre_web;
    private $ig_link;
    private $fb_link;
    private $twt_link;
    private $portafolio_link;
    private $leyid_link;
    private $historico_link;
    private $pie_pagina;
    private $db;

    function __construct() {
        $this->db = Database::connect();
    }

    function getId() {
        return $this->id;
    }

    function getNombreWeb() {
        return $this->nombre_web;
    }

    function getIgLink() {
        return $this->ig_link;
    }

    function getFbLink() {
        return $this->fb_link;
    }

    function getTwtLink() {
        return $this->twt_link;
    }

    function getPiePagina() {
        return $this->pie_pagina;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombreWeb($nombre_web) {
        $this->nombre_web = $nombre_web;
    }

    function setIgLink($ig_link) {
        $this->ig_link = $ig_link;
    }

    function setFbLink($fb_link) {
        $this->fb_link = $fb_link;
    }

    function setTwtLink($twt_link) {
        $this->twt_link = $twt_link;
    }

    function setPiePagina($pie_pagina) {
        $this->pie_pagina = $pie_pagina;
    }

    function getPortafolio_link() {
        return $this->portafolio_link;
    }

    function getLeyid_link() {
        return $this->leyid_link;
    }

    function getHistorico_link() {
        return $this->historico_link;
    }

    function setPortafolio_link($portafolio_link) {
        $this->portafolio_link = $portafolio_link;
    }

    function setLeyid_link($leyid_link) {
        $this->leyid_link = $leyid_link;
    }

    function setHistorico_link($historico_link) {
        $this->historico_link = $historico_link;
    }

    public function getOne() {
        $query = "SELECT * FROM web WHERE id = {$this->getId()};";
        $web = $this->db->query($query);
        if ($web) {
            $web = $web->fetch_object();
        } else {
            $web = false;
        }
        return $web;
    }

    public function save() {
        $pie_pagina = json_encode($this->getPiePagina());
        $query = "INSERT INTO web VALUES (NULL,'{$this->getNombreWeb()}','{$this->getIgLink()}','{$this->getFbLink()}', '{$this->getTwtLink()}', '{$this->getPortafolio_link()}', '{$this->getLeyid_link()}', '{$this->getHistorico_link()}', '{$pie_pagina}')";
        $save = $this->db->query($query);
        $result = false;
        if ($save) {
            require_once 'models/Log.php';
            $log = new Log();
            $log->setFecha($date);
            $log->setTipo('Modificar');
            $log->setActividad('Pagina Web');
            $log->setUsuario_id($_SESSION['identidad']->id);
            $log->save();
            $result = true;
        }
        return $result;
    }

    public function delete() {
        $result = false;
        $query1 = "SET FOREIGN_KEY_CHECKS=0;";
        $this->db->query($query1);
        $query = "DELETE FROM web WHERE id = '{$this->getId()}'";
        if ($this->db->query($query) == TRUE && $this->db->affected_rows > 0) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    public function update() {
        $pie_pagina = json_encode($this->getPiePagina());
        if ($pie_pagina != null) {
            
        } else {
            $pie_pagina = '{"0":["null","null"]}';
        }

        $query = "UPDATE web SET nombre_web='{$this->getNombreWeb()}',ig_link='{$this->getIgLink()}',fb_link='{$this->getFbLink()}',twt_link='{$this->getTwtLink()}', portafolio_link='{$this->getPortafolio_link()}', leyid_link='{$this->getLeyid_link()}', historico_link='{$this->getHistorico_link()}', pie_pagina='{$pie_pagina}';";
        $save = $this->db->query($query);
        $result = false;
        if ($save) {
            require_once 'models/Log.php';
            $log = new Log();
            $log->setFecha($date);
            $log->setTipo('Modificar');
            $log->setActividad('Pagina Web');
            $log->setUsuario_id($_SESSION['identidad']->id);
            $log->save();
            $result = true;
        }
        return $result;
    }

#fin clase
}

?>
