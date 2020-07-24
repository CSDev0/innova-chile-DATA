<section class="seccion fullview datos_destacados" data-section-name="datos_destacados" id="datos-destacados">
    <div class="bg-datos-destacados">
        <div class="container">
            <div class="row section justify-content-center">
                <div class="col-sm-12 align-self-top h-100">
                    <h1 class="text-center" id="datos_destacados_title"><i class="fad fa-star icono-celeste"></i> Datos destacados</h1>
                    <hr class="faded " >
                </div>
                <div class="col-12 mt-5 pr-5 mr-2">
                    <div class="row">
                        <div class="col-6 col-sm-6 col-md-6 col-lg-6 dato-destacado">
                            <div class="row justify-content-center">
                            <h2 class="destacado-naranja"><i class="fad fa-sack-dollar fa-3x"></i></h2>
                            </div>
                            <div class="row justify-content-center">
                            <h2 class="destacado-naranja"><i class="fal fa-plus"></i> <span class="count"><?php if(isset($dato_millones) && $dato_millones->texto != ''){echo $dato_millones->texto;}?></span>
                                <br>millones de pesos</h2>
                            </div>
                        </div>
                        <div class="col-6 col-sm-6 col-md-6 col-lg-6 dato-destacado ">
                            <div class="row justify-content-center">
                            <h2 class="destacado-naranja"><i class="fad fa-users-crown fa-3x"></i></h2>
                            </div>
                            <div class="row justify-content-center">
                                    <h2 class="destacado-naranja"><i class="fal fa-plus"></i> <span class="count"><?php if(isset($dato_beneficiados) && $dato_beneficiados->texto != '' ){echo $dato_beneficiados->texto;}?></span>
                                        <br>beneficiados en total</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center mt-5 pt-2 mr-2 dato-destacado">
                        <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                            <h2 class="destacado-naranja"><i class="fad fa-rocket-launch fa-3x"></i></h2>
                            <h2 class="destacado-naranja"><i class="fal fa-plus"></i> <span class="count"><?php if(isset($dato_iniciativas) && $dato_iniciativas->texto != '' ){echo $dato_iniciativas->texto;}?></span>
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
                    <h1 class="text-center" id="graficos_destacados_title"><i class="fad fa-file-chart-line icono-celeste"></i> Graficos destacados</h1>
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
                                <div class="contenedor-grafico justify-content-center">
                                    <iframe class="grafico-destacado justify-content-center border pl-5 mb-2" src="<?= base_url . $gra->archivo ?>">
                                    </iframe>
                                </div>
                            </div>
                            <?php
                        }
                        ?>

                    </div>
                    <!--Controles del carousel-->
                    <a class="carousel-control-prev" href="#graficos-crsl" data-slide="prev">
                    </a>
                    <a class="carousel-control-next" href="#graficos-crsl" data-slide="next">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
