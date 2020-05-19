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
         <div class="container">
           <div class="table-wrapper">
               <div class="table-title">
                   <div class="row">
                      <div class="col-sm-6">
                  			<h2> Administrar <b>Archivos</b></h2>
                  		</div>
                  		<div class="col-sm-6">
                  			<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><span>Subir Archivo</span></a>
                  			<a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><span>Borrar</span></a>
                  		</div>
                   </div>
               </div>
                   <table class="table table-striped table-hover">
                       <thead>
                           <tr>
                               <th></th>
                               <th>Nombre</th>
                               <th>Fecha de subida</th>
          					           <th>Usuario</th>
                               <th>Rut de usuario</th>
                               <th></th>
                           </tr>
                       </thead>
                       <tbody>
                           <tr>
                    					<td>
                    						<span class="custom-checkbox">
                    							<input type="checkbox" id="checkbox1" name="options[]" value="1">
                    							<label for="checkbox1"></label>
                    						</span>
                    					</td>
                               <td>Thomas Hardy</td>
                               <td>Thomas Hardy</td>
                               <td>Thomas Hardy</td>
                               <td>thomashardy@mail.com</td>
                               <td>
                                   <a href="#editEmployeeModal" class="edit" data-toggle="modal"><span>Editar</span></a>
                                   <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><span>Borrar</span></a>
                               </td>
                           </tr>

                       </tbody>
                   </table>
           			   <div class="clearfix">
                           <div class="hint-text">Showing <b>1</b> out of <b>1</b> entries</div>
                           <ul class="pagination">
                               <li class="page-item"><a href="#" class="page-link">Previous</a></li>
                               <li class="page-item active"><a href="#" class="page-link">1</a></li>
                               <li class="page-item"><a href="#" class="page-link">Next</a></li>
                           </ul>
                       </div>
              </div>
         </div>

       </div>
     </div>
   </div>
<?php

?>
