<h2> Gestionar <b>Usuarios</b></h2><input data-size="s"type="checkbox" id="estudios-toggle" checked data-toggle="toggle" data-on="Usuarios" data-off="Actividad" data-onstyle="nuestros" data-offstyle="recomendadas">
<hr>

<div class="row">
  <p class="col-sm-9">Esta Opcion en un futuro solo estara disponible para el administrador.</p>
  
    <div class="col-sm-10 estudios" id="contenedor-nuestros-estudios">
        <h3>Usuarios</h3>
        <button class="btn btn-primary" href="#modal-agregar-usuario" data-toggle="modal"><i class="fas fa-plus-square"></i> Agregar</button>
        <button class="btn btn-primary" href="#modal-buscar-usuario" data-toggle="modal"><i class="fas fa-search-plus"></i> Buscar</button>
        <br><br>
        <?php $usCtrl=new usuarioController; $usCtrl->showUsers();?>

    </div>
</div>
<div class="row">
    <div class="col-sm-10 lecturas" id="contenedor-lecturas-recomendadas">
        <h4>Registro de actividad</h4>
        <?php require_once('views/usuario/ver-actividad.php');?>
    </div>
</div>
</div>
</div>
</div>
</div>
