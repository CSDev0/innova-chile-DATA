<script>
    $(document).ready(function () {
        setTimeout(function(e){
            $(window).scrollTop(0);
        }, 100);
        
    });
</script>
<a href="#" class="scrollToTop"><i class="fad fa-arrow-to-top fa-2x"></i></a>
<div class="col-12 page-content p-5" id="content">
    <button id="sidebarCollapse" type="button" class="btn px-4 mb-4 navbar-toggler2 collapsed shadow-sm">
        <span class="icon-bar top-bar"></span>
        <span class="icon-bar middle-bar"></span>
        <span class="icon-bar bottom-bar"></span>
    </button>
    <div class="pr-2">
<div class='row'>
<div class="col-sm-10 mi-perfil">
    <h2>Mi perfil</h2>
    <hr>
    <h4>Nombre: <?= $_SESSION['identidad']->nombre ?> <?= $_SESSION['identidad']->apellido ?></h4>
    <h4>Correo: <?= $_SESSION['identidad']->correo ?></h4>
    <h4>Privilegios: <?= $_SESSION['identidad']->tipo ?></h4>
    <hr>
    <button class="btn btn-primary" onclick='window.location.href = "<?= base_url ?>usuario/modificarPerfil&id="'><i class="fas fa-user-edit"></i> Modificar perfil</button>
    <button class="btn btn-primary" onclick='window.location.href = "<?= base_url ?>usuario/solicitarRestablecerAutenticado"'><i class="fas fa-unlock-alt"></i> Restablecer clave</button>
</div>
</div>
</div>
</div>
</div>
