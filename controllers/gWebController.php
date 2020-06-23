<?php
require_once 'models/Web.php';
require_once 'helpers/utils.php';

class gWebController{
  public function update(){
    if (utils::isAdmin()) {
      if (isset($_POST)) {
        $web = new Web();
        $web->setId(1);
        $web->setNombreWeb($_POST['txtNombre']);
        $web->setIgLink($_POST['txtIgLink']);
        $web->setFbLink($_POST['txtFbLink']);
        $web->setTwtLink($_POST['txtTwtLink']);
        #$pie_pag = $_POST['txtPiePag'];
        $pie_pag = ['Encuesta Innovacion','Data Emprendimiento','Observatorio CTCI','Observatorio MINECOM'];
        $web->setPiePagina(explode(',',$pie_pag));
        $resultado = $web->update();
        if ($resultado) {
            $_SESSION['usuario_mensaje'] = "exito modificar";
        } else {
            $_SESSION['usuario_mensaje'] = "fallo modificar";
        }
      }
      header("Location:" . base_url . 'gestion/usuarios');
    }
    else {
      header('Location:' . base_url . 'web/inicio');
    }
  }
}

 ?>
