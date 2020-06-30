<?php
$i = 0;
require_once "../config/db.php";
require_once "../helpers/utils.php";
require_once "../config/parameters.php";
require_once "../models/Grafico_destacado.php";

foreach ($_POST['grafico'] as $value) {
    // Execute statement:
    $query = "UPDATE graficodestacado SET posicion = '{$i}' WHERE id = '{$value}'";
    $grafico = new Grafico_destacado();
    $grafico->query($query);
    $i++;
}