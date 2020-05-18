<?php  ?>
<?php
#validaciones correspondientes
 ?>


   <div class="row">

     <div class="col-sm-2">
       <div class="" style="margin-left:10%; padding-left: 5%; padding-top:10% ;padding-bottom: 290%;background-color:#ff0059;">
         <a class="link" href="<?= base_url ?>web/admin"><h3>Info Admin</h3></a>
         <div class="" style="margin-bottom:10px;">
           <a class="link" href="<?= base_url ?>web/cuentas">Administrar Cuentas</a>
         </div>
         <div class="" style="margin-bottom:10px;">
           <a class="link" href="<?= base_url ?>web/contenido">Editar Contenido</a>
         </div>
         <div class="" style="margin-bottom:10px;">
           <a class="link" href="<?= base_url ?>web/archivos">Editar Archivos</a>
         </div>
       </div>
     </div>
     <div class="col-sm-10">
       <div class="" style=" padding-top:2% ;padding-bottom: 51%;">
         <h2> Seccion: <b>Data</b></h2>
         <div class="container">
           <textarea name="name" rows="8" cols="80">Lorem ipsum dolor sit amet, consectetur <br> adipisicing elit, sed do eiusmod tempor incididunt.</textarea>
           <?php #aqui va el plugin de edicion ?>
         </div>
       </div>
     </div>
   </div>
