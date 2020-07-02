<h2> Gestionar <b>Sitio Web</b></h2>
<hr>
<div class="container">
  <form action="<?php echo base_url.'dato/update';?>" method="post" enctype="multipart/form-data" >
    <input type="hidden" class="form-control" id="pie_title" name="txtValor" placeholder="valor" value="">
  <div class="row">
    <div class="col-sm-6">
      <label for=""><i class="fas fa-edit"></i> Nombres de los datos</label>
      <?php utils::getNombres(); ?>

    </div>
    <div class="col-sm-6">
      <label for=""><i class="fas fa-edit"></i> Valores de los datos</label>
      <?php utils::getValores(); ?>

    </div>
  </div>
      <hr class="bc-celeste">
      <div class="row justify-content-end">
  <a href="<?=base_url.'gestion/dato'?>" type="button" class="btn btn-danger mr-2" ><i class="fas fa-times"></i> Cancelar</a>
  <button type="submit" class="btn btn-success mr-3" id="saveBtnPie"><i class="fas fa-save"></i> Guardar cambios</button>
      </div>
  </form>
</div>
