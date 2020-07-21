<nav id="menubar-convocatorias" class="navbar navbar-expand-sm">
    <div class="navbar-collapse justify-content-center ">
        <ul class="navbar-nav">
            <div id="accordion1">
                <div class="row" >
                    <div class="col-1-10 " >
                      <?php
                      while ($gra = $convocatorias->fetch_object()) {
                        echo '<a class="convocatoria-link boton active" data-toggle="collapse" data-target="#navbarPorAnos2" id="ultima-convocatoria" data-link='.$gra->archivo.' href="#">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-award icono-blanco"></i> Ultima convocatoria&nbsp;&nbsp;&nbsp;&nbsp;</a>';
                        break;
                      }
                    ?>
                        <a class="convocatoria-link boton active" data-toggle="collapse" data-target="#navbarPorAnos2" id='ultima-convocatoria' data-link='https://datainnovacion.github.io/llamado_3/' href="#">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-award icono-blanco"></i> Ultima convocatoria&nbsp;&nbsp;&nbsp;&nbsp;</a>
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
                                $no_duplicado=0;
                                  while ($gra = $convocatorias->fetch_object()) {

                                    if ($gra->año != $no_duplicado) {
                                      echo '<a data-toggle="collapse" href="#" data-target="#Ano'.$gra->año.'" class="convocatoria-link ano">'.$gra->año.'</a>';
                                    }
                                    $no_duplicado=$gra->año;
                                  }
                                ?>
                                <div class="row">
                                    <div class="container">
                                      <?php
                                      $no_duplicado=0;
                                        while ($gra = $convocatorias->fetch_object()) {

                                          if ($gra->año != $no_duplicado) {
                                            echo '<div id="Ano'.$gra->año.'" class="collapse anos" data-parent="#accordion"><br>';
                                            $current = $gra->año;
                                            while ($gra = $convocatorias->fetch_object()){
                                              if ($gra->año == $current ) {
                                                echo '<a class="convocatoria-link llamado" data-link="'.$gra->archivo.'" href="#">Llamado '.$gra->llamado.'</a>';
                                              }
                                            }
                                            echo '</div>';
                                          }
                                          $no_duplicado=$gra->año;
                                        }
                                      ?>
                                    </div>
                                </div>
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
