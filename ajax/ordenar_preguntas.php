<?php
$i = 0;
require_once "../config/db.php";
require_once "../helpers/utils.php";
require_once "../config/parameters.php";
require_once "../models/Contenido.php";

foreach ($_POST['pregunta'] as $value) {
    // Execute statement:
    $query = "UPDATE contenido SET posicion = '{$i}' WHERE id = '{$value}'";
    $contenido = new Contenido();
    $contenido->query($query);
    
    $i++;

}