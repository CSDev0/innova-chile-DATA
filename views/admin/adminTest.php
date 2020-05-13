<?php
 ?>
 <script>
 $(document).ready(function () {
     $("#footer").hide();
     $("#jumbo").hide();
     $("#logAdminTest").html('<div class="wrapper fadeInDown"><div id="formContent"><div class="fadeIn first"><img src="../assets/img/logos/innova_logo.png" id="icon" alt="Innova"/></div><form><!--falta el action y el method ---><input type="text" id="inputUser"  class="fadeIn second admin"  name="user"  placeholder="usuario"><input type="password"  id="inputPassword"  class="fadeIn third admin" name="password"  placeholder="clave"><button class="btn-admin btn-primary fadeIn fourth" name="signin" type="submit">entrar</button><a href="<?= base_url ?>web/inicio" class="btn-admin btn-primary fadeIn fourth">volver</a></form></div></div>');
 });
 </script>
 <div id="logAdminTest" style="margin-bottom:200px; margin-top:200px;"></div>
