<?php

?>
<h2> Gestionar <b>Usuarios</b></h2>
<hr>

<div class="row">
  <p class="col-sm-9">Esta Opcion en un futuro solo estara disponible para el administrador por lo tanto los usuarios normales no deberian tener esta opcion.</p>

    <div class="col-sm-10 contenedor-gestion">
        <h4>Usuarios</h4>
        <button class="btn btn-primary" href="#modal-agregar-usuario" data-toggle="modal"><i class="fas fa-plus-square"></i> Agregar</button>
        <button class="btn btn-primary" href="#modal-buscar-usuario" data-toggle="modal"><i class="fas fa-search-plus"></i> Buscar</button>
        <br><br>
        <?php require_once('views/usuario/ver-usuarios.php');?>

    </div>
</div>

</div>
</div>
</div>
</div>
