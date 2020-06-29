<?php
require_once 'models/Web.php';
require_once 'helpers/utils.php';

class gwebController{
  public function update(){
    if (utils::isAdmin()) {
      if (isset($_POST)) {
        $web = new Web();
        $web->setId(1);
        $web->setNombreWeb($_POST['txtNombre']);
        $web->setIgLink($_POST['txtIgLink']);
        $web->setFbLink($_POST['txtFbLink']);
        $web->setTwtLink($_POST['txtTwtLink']);
        #$pie_pag = ['Encuesta Innovacion','Data Emprendimiento','Observatorio CTCI','Observatorio MINECOM'];
        $pie_pag = $_POST['txtPiePag'];
        $web->setPiePagina(json_decode($pie_pag, true));
        $resultado = $web->update();
        if ($resultado) {
            $_SESSION['contenido_mensaje'] = "exito";
        } else {
            $_SESSION['contenido_mensaje'] = "fallo";
        }
      }
      header("Location:" . base_url . 'gestion/web');
    }
    else {
      header('Location:' . base_url . 'web/inicio');
    }
  }
}

 ?>
