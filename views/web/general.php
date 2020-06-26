<?php $conjunto=utils::getLinksB();?>
<h3>General</h3>
<label for="txtNombre"><i class="fas fa-edit"></i> Nombre del sitio web</label>
<input type="text" class="form-control" name="txtNombre" placeholder="Nombre" value="<?php utils::getTitulo();?>">
<label for="txtFbLink"><i class="fab fa-facebook-square"></i> Enlace Facebook</label>
<input type="text" class="form-control" name="txtFbLink" placeholder="Nombre" value="<?php echo $conjunto->fb_link?>">
<label for="txtIgLink"><i class="fab fa-instagram-square"></i> Enlace Instagram</label>
<input type="text" class="form-control" name="txtIgLink" placeholder="Nombre" value="<?php echo $conjunto->ig_link?>">
<label for="txtTwtLink"><i class="fab fa-twitter-square"></i> Enlace Twitter</label>
<input type="text" class="form-control" name="txtTwtLink" placeholder="Nombre" value="<?php echo $conjunto->twt_link?>">
<br><br>
