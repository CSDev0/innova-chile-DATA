<?php $conjunto=utils::getLinksB();?>
<h3>General</h3>
<div class="row col-12">
<label for="txtNombre"><i class="fas fa-edit"></i> Nombre del sitio web</label>
<input type="text" class="form-control" name="txtNombre" placeholder="Nombre" value="<?php utils::getTitulo();?>">
</div>
<div class="row col-12 mt-3">
<label for="txtFbLink"><i class="fab fa-facebook-square"></i> Enlace Facebook</label>
<input type="text" class="form-control" name="txtFbLink" placeholder="https://facebook.com/usuario" value="<?php echo $conjunto->fb_link?>">
</div>
<div class="row col-12 mt-3">
<label for="txtIgLink"><i class="fab fa-instagram-square"></i> Enlace Instagram</label>
<input type="text" class="form-control" name="txtIgLink" placeholder="https://instagram.com/usuario" value="<?php echo $conjunto->ig_link?>">
</div>
<div class="row col-12 mt-3">
<label for="txtTwtLink"><i class="fab fa-twitter-square"></i> Enlace Twitter</label>
<input type="text" class="form-control" name="txtTwtLink" placeholder="https://twitter.com/usuario" value="<?php echo $conjunto->twt_link?>">
</div>
<div class="row col-12 mt-3">
<label for="txtPortafolio"><i class="fad fa-link"></i> Enlace hacia Portafolio</label>
<input type="text" class="form-control" name="txtPortafolio" placeholder="https://ejemplo.com/enlace_de_ejemplo" value="<?php echo $conjunto->portafolio_link?>">
</div>
<div class="row col-12 mt-3">
<label for="txtLeyId"><i class="fad fa-link"></i> Enlace hacia Ley i+d</label>
<input type="text" class="form-control" name="txtLeyId" placeholder="https://ejemplo.com/enlace_de_ejemplo" value="<?php echo $conjunto->leyid_link?>">
</div>
<div class="row col-12 mt-3">
<label for="txtHistorico"><i class="fad fa-link"></i> Enlace hacia Historico</label>
<input type="text" class="form-control" name="txtHistorico" placeholder="https://ejemplo.com/enlace_de_ejemplo" value="<?php echo $conjunto->historico_link?>">
</div>
<br><br>
