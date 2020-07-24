<nav id="menubar-convocatorias" class="navbar navbar-expand-sm">
    <div class="navbar-collapse justify-content-center ">
        <ul class="navbar-nav">
            <div id="accordion1">
                <div class="row" >
                    <div class="col-1-10 " >
                      <?php
                      if ($convocatorias) {
                        while ($conv = $convocatorias->fetch_object()) {
                          echo '<a class="convocatoria-link boton active" data-toggle="collapse" data-target="#navbarPorAnos2" id="ultima-convocatoria" data-link='.base_url.$conv->archivo.' href="#">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-award icono-blanco"></i> Ultima convocatoria&nbsp;&nbsp;&nbsp;&nbsp;</a>';
                          break;
                        }
                      }
                    ?>
                    </div>
                    <div class="col-1-10" >
                        <a class="convocatoria-link boton" data-toggle="collapse" data-target="#navbarPorAnos" href="#">&nbsp;&nbsp;&nbsp;&nbsp;<i class="far fa-calendar-alt icono-blanco"></i> Convocatorias por año&nbsp;&nbsp;&nbsp;&nbsp;</a>
                        <div class="collapse" id="navbarPorAnos2" data-parent="#accordion1">
                        </div>
                    </div>
                    <div class="col-sm-1" >

                    </div>
                    </div>
                    <div class="row" >
                        <div class="collapse" id="navbarPorAnos" data-parent="#accordion1">
                            <div id="accordion">
                                <br>
                                <?php
                                if ($convocatorias) {
                                    while ($y = $anosConv->fetch_object()) {
                                      echo '<a data-toggle="collapse" href="#" data-target="#Ano'.$y->ano.'" class="convocatoria-link ano">'.$y->ano.'</a>';
                                      echo '<div id="Ano'.$y->ano.'" class="collapse anos" data-parent="#accordion"><br>';
                                      printLllamados($convocatorias,$y);
                                      echo '</div>';
                                    }
                                }

                                function printLllamados($convocatorias,$y) {
                                  $i = $y->id;
                                  while ($conv = $convocatorias->fetch_object()) {
                                    if ($conv->convocatoria_id_ano == $y->id) {
                                      echo '<a class="convocatoria-link llamado" href="#">Llamado '.$conv->llamado.'</a>';
                                    }
                                  }
                                }

                                ?>

                            </div>
                        </div>
                    </div>

            </div>
        </ul>
    </div>
</nav>

<!--<div id="accordion">
            <h5>
                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne">
                    Collapsible #1 trigger
                </button>
            </h5>
        <div id="collapseOne" class="collapse" data-parent="#accordion">
                Collapsible #1 element
        </div>
            <h5>
                <button class="btn btn-link" data-toggle="collapse" data-target="#collapse2">
                    Collapsible #2 trigger
                </button>
            </h5>
        <div id="collapse2" class="collapse" data-parent="#accordion">
                Collapsible #1 element
        </div>
    ... (more cards/collapsibles inside #accordion parent)
</div>-->
