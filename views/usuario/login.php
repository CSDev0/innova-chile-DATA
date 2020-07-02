<?php
if (isset($_SESSION['identidad'])) {
    header('Location:' . base_url . 'usuario/panel');
} else {
    ?>
    <script>
        $("#jumbo").hide();
        $("#navMenu").hide();
        $(document).ready(function () {
            $("#modal-fade").css("opacity", "1");
            $("#modal-fade").css("margin-top", "0");
            $("#footer").css("margin-top", "350px");
            $(".landing-page-navbar").removeClass("no-bg");
        $(".landing-page-nav-link").removeClass("initial-state")
        });
        $(document).ready(function () {
            $("#show_hide_password a").on('click', function (event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("fa-eye-slash");
                    $('#show_hide_password i').removeClass("fa-eye");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("fa-eye-slash");
                    $('#show_hide_password i').addClass("fa-eye");
                }
            });
        });
    </script>
    <div id="bg-login">
    </div>
    <div class="modal-dialog" id="modal-fade">
        <div class="modal-content">
            <form action="<?= base_url ?>usuario/loginRequest" method="POST" data-parsley-validate data-parsley-trigger="focusout" >
                <div class="form-group login">
                    <div class="modal-header">
                        <h3 class="modal-title">Iniciar sesión</h3>
                    </div>
                    <br>
                    <label for="txtCorreo">Correo: </label>
                    <input type="email" class="form-control"  name="txtCorreo"  placeholder="correo@email.com" required data-parsley-error-message="Debe ingresar un correo valido!" data-parsley-errors-container="#errorCorreo">
                    <div id="errorCorreo"></div>
                    <div class="small-br"></div>
                    <div class="form-group">
                        <label for="txtClave">Clave: </label>
                        <div class="input-group" id="show_hide_password">
                            <input type="password" class="form-control" name="txtClave"  placeholder="******" required minlength="6" data-parsley-error-message="La clave debe tener al menos 6 carácteres!" data-parsley-errors-container="#errorClave">
                            <div class="input-group-addon">
                                <a class="form-control" href=""><i class="fa fa-eye-slash " aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    <div id="errorClave"></div>
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