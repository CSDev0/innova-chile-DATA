<?php
require_once 'models/Dato_destacado.php';
require_once 'helpers/utils.php';

class datoController{
  public function update(){
    if (utils::isAdmin()) {
      if (isset($_POST)) {
        $dato = new Dato_destacado();
        $dato->setId(1);
        #$pie_pag = ['Encuesta Innovacion','Data Emprendimiento','Observatorio CTCI','Observatorio MINECOM'];
        $valor = $_POST['txtValor'];
        $dato->setValor(json_decode($valor, true));
        $resultado = $dato->update();
        if ($resultado) {
            $_SESSION['contenido_mensaje'] = "exito";
        } else {
            $_SESSION['contenido_mensaje'] = "fallo";
        }
      }
      header("Location:" . base_url . 'gestion/datos_destacados');
    }
    else {
      header('Location:' . base_url . 'dato/inicio');
    }
  }
}

 ?>
