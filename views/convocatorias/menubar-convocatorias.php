<nav id="menubar-convocatorias" class="navbar navbar-expand-sm">
    <div class="navbar-collapse justify-content-center ">
        <ul class="navbar-nav">
            <div id="accordion1">
                <div class="row" >
                    <div class="col-1-10 " >
                      <?php
                      if ($convocatorias) {
                        echo '<a class="convocatoria-link boton active" data-toggle="collapse" data-target="#navbarPorAnos2" id="ultima-convocatoria" data-link='.base_url.$convocatorias[0]->archivo.' href="#">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-award icono-blanco"></i> Ultima convocatoria&nbsp;&nbsp;&nbsp;&nbsp;</a>';
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
                                #var_dump($anosConv);
                                if ($convocatorias) {
                                  $v=count($convocatorias);
                                  $c=count($anosConv);
                                    for ($i=0; $i < $c ; $i++) {
                                      echo '<a data-toggle="collapse" href="#" data-target="#Ano'.$anosConv[$i]->ano.'" class="convocatoria-link ano">'.$anosConv[$i]->ano.'</a>';
                                      echo '<div id="Ano'.$anosConv[$i]->ano.'" class="collapse anos" data-parent="#accordion"><br>';
                                      #var_dump($convocatorias);
                                      for ($j=0; $j < $v ; $j++) {
                                        if ($convocatorias[$j]->convocatoria_id_ano == $anosConv[$i]->id) {
                                          echo '<a class="convocatoria-link llamado" data-toggle="collapse" data-target="#navbarPorAnos2" data-link='.base_url.$convocatorias[$j]->archivo.' href="#">&nbsp;&nbsp;&nbsp;&nbsp; Llamado '.$convocatorias[$j]->llamado.'&nbsp;&nbsp;&nbsp;&nbsp;</a>';
                                        }
                                      }
                                      echo '</div>';
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
