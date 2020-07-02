<section class="seccion fullview" data-section-name="datos_destacados" id="datos-destacados">
    <div class="bg-datos-destacados">
        <div class="container d-flex">
            <div class="row section justify-content-center">
                <div class="col-sm-12 align-self-top h-100">

                    <h1 class="text-center" id="datos_destacados_title">Datos destacados</h1>

                    <hr class="faded " >
                </div>
                <div class="col-sm-12">
                    <div class="row align-self-center">
                        <?php utils::getDatos_destacados(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="seccion" data-section-name="graficos_destacados" id="graficos-destacados">
    <div class="container-fluid d-flex">
        <div class="row section">
            <div class="col-sm-12 align-self-top vw-100">
                <div class="container">
                    <h1 class="text-center" id="graficos_destacados_title">Graficos destacados</h1>
                    <hr class="faded" >
                </div>
            </div>
            <div class="row ">
                <div class="col-sm-12 vw-100">
                    <div id="graficos-crsl" class="carousel slide destacados" data-ride="carousel">

                        <!--Indicadores-->
                        <ul class="carousel-indicators">
                            <li data-target="#graficos-crsl" data-slide-to="0" class="active"></li>
                            <?php
                            $cantidad_graficos = mysqli_num_rows($graficos);
                            if ($cantidad_graficos > 1) {
                                for ($x = 1; $x < $cantidad_graficos; $x++) {
                                    echo '<li data-target="#graficos-crsl" data-slide-to="' . $x . '"></li>';
                                }
                            }
                            ?>
                        </ul>
                        <!--SlideShow-->
                        <div class="carousel-inner">
                            <?php
                            $contador = 0;
                            while ($gra = $graficos->fetch_object()) {
                                if ($contador == 0) {
                                    echo '<div class="carousel-item active">';
                                } else {
                                    echo '<div class="carousel-item">';
                                }
                                $contador++;
                                ?>
                                <div class="contenedor-grafico">
                                    <iframe class="grafico-destacado" src="<?= base_url . $gra->archivo ?>">
                                    </iframe>
                                </div>
                            </div>
                            <?php
                        }
                        ?>

                    </div>

                    <!--Controles del carousel-->
                    <a class="carousel-control-prev" href="#graficos-crsl" data-slide="prev">
                        <i class="fas fa-angle-double-left fa-5x carousel"></i>
                    </a>
                    <a class="carousel-control-next" href="#graficos-crsl" data-slide="next">
                        <i class="fas fa-angle-double-right fa-5x carousel"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
