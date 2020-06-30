<h3>Pie de página</h3>
<div class="row">
  <input type="hidden" class="form-control" name="txtPiePag" id="pie_title">
  <div class="col-sm-6">
    <label for="txtPiePag"><i class="fas fa-edit"></i> Te puede interesar</label>
    <div id="TextBoxesGroupA">
      <?php utils::getTitulos(); ?>
    </div>
  </div>
  
  <div class="col-sm-6">
    <label for="txtPieLink"><i class="fas fa-edit"></i>Enlaces</label>
    <div id="TextBoxesGroupB">
      <?php utils::getEnlace(); ?>
    </div>
  </div>

</div>
<br><br>
<button type='button' class="btn btn-success" value='Agregar Link' id='addButton'><i class="fas fa-plus"></i></button>
<button type='button' class="btn btn-danger" value='Quitar Link' id='removeButton'><i class="fas fa-minus"></i></button>
