<?php 
if(isset($_SESSION['identidad'])){
    header('Location:' . base_url . 'usuario/panel');
}
else{
?>
<script>
    $("#jumbo").hide();
    $("#navMenu").hide();
    $(document).ready(function () {
        $("#modal-fade").css("opacity", "1");
        $("#modal-fade").css("margin-top", "0");
        $("#footer").css("margin-top", "350px");
    });
</script>
<div id="bg-login">
    </div>
    <div class="modal-dialog" id="modal-fade">
        <div class="modal-content">
            <form action="<?= base_url ?>usuario/loginRequest" method="POST" data-parsley-validate data-parsley-trigger="focusout" >
                <div class="form-group login">
                    <div class="modal-header">
                        <h4 class="modal-title">Iniciar sesión</h4>
                    </div>
                    <br>
                    <label for="txtCorreo">Correo: </label>
                    <input type="text" class="form-control"  name="txtCorreo"  placeholder="correo@email.com">
                    <br>
                    <label for="txtClave">Clave: </label>
                    <input type="password" class="form-control" name="txtClave"  placeholder="******">
                    <br>
                    <div class="modal-footer">
                        <button class="btn btn-primary" name="btnLogin" type="submit" >Iniciar sesión</button>
                        <a href="<?= base_url ?>web/inicio" class="btn btn-danger">Volver</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

<?php
}