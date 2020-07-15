<section class="seccion fullview datos_destacados" data-section-name="datos_destacados" id="datos-destacados">
    <div class="bg-datos-destacados">
        <div class="container">
            <div class="row section justify-content-center">
                <div class="col-sm-12 align-self-top h-100">
                    <h1 class="text-center" id="datos_destacados_title">Datos destacados</h1>
                    <hr class="faded " >
                </div>
                <div class="col-sm">
                    <div class="row">
                        <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                            <div class="row justify-content-center">
                            <h2 class="destacado-naranja"><i class="fas fa-dollar-sign fa-2x"></i></h2>
                            </div>
                            <div class="row justify-content-center">
                            <h2 class="destacado-naranja">+ $<span class="count"><?php if(isset($dato_millones) && $dato_millones->texto != ''){echo $dato_millones->texto;}?></span>
                                <br>millones</h2>
                            </div>
                        </div>
                        <div class="col-6 col-sm-6 col-md-6 col-lg-6 ">
                            <div class="row justify-content-center">
                            <h2 class="destacado-naranja"><i class="fas fa-globe fa-2x"></i></h2>
                            </div>
                            <div class="row justify-content-center">
                                    <h2 class="destacado-naranja"">+ <span class="count"><?php if(isset($dato_beneficiados) && $dato_beneficiados->texto != '' ){echo $dato_beneficiados->texto;}?></span>
                                        <br>beneficiados</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                            <h2 class="destacado-naranja"><i class="fas fa-chart-line fa-2x"></i></h2>
                            <h2 class="destacado-naranja">+ <span class="count"><?php if(isset($dato_iniciativas) && $dato_iniciativas->texto != '' ){echo $dato_iniciativas->texto;}?></span>
                                <br>Iniciativas apoyadas</h2>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<section class="seccion fullview" data-section-name="graficos_destacados" id="graficos-destacados">
    <div class="container-fluid d-flex">
        <div class="row section">
            <div class="col-sm-12 align-self-top w-100">
                <div class="container">
                    <h1 class="text-center" id="graficos_destacados_title">Graficos destacados</h1>
                    <hr class="faded" >
                </div>
            </div>
            <div class="row ">
                <div class="col-sm-12" style="width: 98vw">
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
