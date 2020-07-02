<?php
$nombre_completo = utils::getNombreCompleto();
?>

<script>

    $(document).ready(function () {
        $(".panel").animate({
            opacity: 1
        }, 0);
        $.scrollify.disable();
    });
</script>

<div class="row gestion">
    <div class="col-sm-2">
        <div class="side-bar">
            <div class='panel-nombre-contenedor' onclick="window.location = baseurl + 'usuario/panel'">
                <a class='panel-nombre' href="<?= base_url ?>usuario/panel"><?= $nombre_completo ?></a>
            </div>
            <?php
            if ($_SESSION['tipo_usuario'] == 'admin') {
                ?>
                <div class="" style="margin-bottom:10px;">
                    <button class="btn btn-primary panel" onclick='window.location.href = "<?= base_url ?>gestion/usuarios"'><i class="fas fa-users"></i> Gestión usuarios</button>
                </div>
                <div class="" style="margin-bottom:10px;">
                    <button class="btn btn-primary panel" onclick='window.location.href = "<?= base_url ?>gestion/web"'><i class="fas fa-wrench"></i> Gestión sitio web</button>
                </div>
                <?php
            }
            ?>
            <div class="" style="margin-bottom:10px;">
                <button class="btn btn-primary panel" onclick='window.location.href = "<?= base_url ?>gestion/estudios"'><i class="fas fa-file-alt"></i> Gestión estudios</button>
            </div>
            <div class="" style="margin-bottom:10px;">
                <button class="btn btn-primary panel" onclick='window.location.href = "<?= base_url ?>gestion/datos_destacados"'><i class="fas fa-file-alt"></i> Datos destacados</button>
            </div>
            <div class="" style="margin-bottom:10px;">
                <button class="btn btn-primary panel" onclick='window.location.href = "<?= base_url ?>gestion/contenidos"'><i class="fas fa-align-left"></i> Gestión textos</button>
            </div>
            <div class="" style="margin-bottom:10px;">
                <button class="btn btn-primary panel" onclick='window.location.href = "<?= base_url ?>gestion/data"'><i class="fas fa-star"></i> Gestión Data</button>
            </div>
            <div class="" style="margin-bottom:10px;">
                <button class="btn btn-danger panel" onclick='window.location.href = "<?= base_url ?>usuario/logout"'><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</button>
            </div>
        </div>
    </div>
    <div class="col-sm-10">
