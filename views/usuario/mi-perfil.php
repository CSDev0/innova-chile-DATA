<script>
    $(document).ready(function () {
        setTimeout(function(e){
            $(window).scrollTop(0);
        }, 100);
        
    });
</script>
<div class='row'>
<div class="col-sm-10 mi-perfil">
    <h2>Mi perfil</h2>
    <hr>
    <h4>Nombre: <?= $_SESSION['identidad']->nombre ?> <?= $_SESSION['identidad']->apellido ?></h4>
    <h4>Correo: <?= $_SESSION['identidad']->correo ?></h4>
    <h4>Privilegios: <?= $_SESSION['identidad']->tipo ?></h4>
    <hr>
    <button class="btn btn-primary" onclick='window.location.href = "<?= base_url ?>usuario/modificarPerfil&id="'><i class="fas fa-user-edit"></i> Modificar perfil</button>
    <button class="btn btn-primary" onclick='window.location.href = "<?= base_url ?>usuario/modificarPerfil&id="'><i class="fas fa-unlock-alt"></i> Restablecer clave</button>
</div>
</div>
</div>
</div>
</div>
