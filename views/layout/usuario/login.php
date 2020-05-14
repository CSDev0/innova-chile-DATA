<?php ?>
<script>
    $(document).ready(function () {
        $("#footer").hide();
        $("#jumbo").hide();
    });
</script>
<div class="wrapper fadeInDown">
    <div id="formContent">
        <div class="fadeIn first">
            <img src="../assets/img/logos/innova_logo.png" id="icon" alt="Innova"/>
        </div>
        <form action="<?=base_url?>usuario/loginRequest" method="POST" data-parsley-validate data-parsley-trigger="focusout" >
            <input type="text" id="txtCorreo"  class="fadeIn second admin"  name="txtCorreo"  placeholder="correo">
            <input type="password"  id="txtClave"  class="fadeIn third admin" name="txtClave"  placeholder="clave">
            <button class="btn-admin btn-primary fadeIn fourth" name="signin" type="submit">Iniciar sesión</button>
            <a href="<?= base_url ?>web/inicio" class="btn-admin btn-primary fadeIn fourth">volver</a>
        </form>
    </div>
</div>
<div id="logAdminTest" style="margin-bottom:200px; margin-top:200px;"></div>
