<?php
$nombre_completo = utils::getNombreCompleto();
if(utils::isVerified()){
?>
<script>
    $(document).ready(function () {
        $(".panel").animate({
            opacity: 1
        }, 0);
        $.scrollify.disable();
    });
</script>
<div class="vertical-nav bg-naranjo" id="sidebar">
    <div class="col-12 p-0 m-0">
        <div class='panel-nombre-contenedor' onclick="window.location = baseurl + 'usuario/panel'">
            <a class='panel-nombre' href="<?= base_url ?>usuario/panel"><?= $nombre_completo ?></a>
        </div>
        <?php
        if ($_SESSION['tipo_usuario'] == 'admin') {
            ?>
            <div class="mb-2">
                <button class="btn btn-primary panel show-load" onclick='window.location.href = "<?= base_url ?>gestion/usuarios"'><i class="fal fa-users"></i> Gestionar Usuarios y Actividad</button>
            </div>
            <div class="mb-2" >
                <button class="btn btn-primary panel show-load" onclick='window.location.href = "<?= base_url ?>gestion/web"'><i class="fal fa-wrench"></i> Gestionar Sitio Web y Preguntas frecuentes</button>
            </div>
            <?php
        }elseif($_SESSION['tipo_usuario'] == 'empleado'){
            ?>
            <div class="mb-2">
                <button class="btn btn-primary panel show-load" onclick='window.location.href = "<?= base_url ?>gestion/usuarios"'><i class="fal fa-users"></i> Ver Actividad</button>
            </div>
        <?php
        }
        ?>
        <div class="mb-2">
            <button class="btn btn-primary panel show-load" onclick='window.location.href = "<?= base_url ?>gestion/estudios"'><i class="fal fa-file-alt"></i> Gestionar Politicas Publicas</button>
        </div>
        <div class="mb-2">
            <button class="btn btn-primary panel show-load" onclick='window.location.href = "<?= base_url ?>gestion/contenidos"'><i class="fal fa-align-left"></i> Gestionar Textos y Archivos</button>
        </div>
        <div class="mb-2">
            <button class="btn btn-primary panel show-load" onclick='window.location.href = "<?= base_url ?>gestion/data"'><i class="fal fa-star"></i> Gestionar Datos y Graficos</button>
        </div>
        <div class="mb-2">
            <button class="btn btn-primary panel show-load" onclick='window.location.href = "<?= base_url ?>gestion/convocatorias"'><i class="fal fa-calendar-alt"></i> Gestionar Convocatorias</button>
        </div>
        <div class="mb-2">
            <button class="btn btn-danger panel show-load" onclick='window.location.href = "<?= base_url ?>usuario/logout"'><i class="fal fa-sign-out-alt"></i> Cerrar Sesión</button>
        </div>
        <div class="mb-2">
            <button class="btn btn-danger panel show-load" onclick='window.location.href = "<?= base_url ?>web/develop"'><i class="fal fa-flask"></i> Entorno Experimental </button>
        </div>
    </div>
</div>
<?php
}else{
    header("Location:" . base_url . 'usuario/verificarMiCuenta');
}