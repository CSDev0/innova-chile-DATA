<h3>Pie de página</h3>
<div class="row">

  <div class="col-sm-6">
    <label for="txtPiePag"><i class="fas fa-edit"></i> Te puede interesar (Beta)</label>
    <input type="text" class="form-control" name="txtPiePag" id="pie_title">
    <?php utils::getTitulos(); ?>
  </div>

  <div class="col-sm-6">
    <label for="txtPieLink"><i class="fas fa-edit"></i>Links (Beta)</label>
    <input type="text" class="form-control" name="txtPieLink" id="pie_link">
    <?php utils::getEnlace(); ?>
  </div>

</div>
<br><br>
<input type='button' class="btn btn-success" value='Agregar Link' id='addButton'>
<input type='button' class="btn btn-danger" value='Quitar Link' id='removeButton'>
<input type='button' class="btn btn-secondary" value='salvar Links' id='saveBtnPie'>
