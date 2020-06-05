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
                    <div class="col-sm-4">
                        <h2 class="destacado-naranja "><i class="fas fa-dollar-sign fa-2x"></i></h2>
                        <h2 class="destacado-naranja">+ $<span class="count">800</span> <br>millones</h2>
                    </div>
                    <div class="col-sm-4">
                        <h2 class="destacado-naranja"><i class="fas fa-chart-line fa-2x"></i></h2>
                        <h2 class="destacado-naranja">+ <span class="count">2000</span> <br>Iniciativas apoyadas</h2>
                    </div>
                    <div class="col-sm-4">
                        <h2 class="destacado-naranja"><i class="fas fa-globe fa-2x"></i></h2>
                        <h2 class="destacado-naranja"">+ <span class="count">1500</span> <br>beneficiados</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
        </div>
</section>
<section class="seccion" data-section-name="graficos_destacados">
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
                            <li data-target="#graficos-crsl" data-slide-to="1"></li>
                            <li data-target="#graficos-crsl" data-slide-to="2"></li>
                            <li data-target="#graficos-crsl" data-slide-to="3"></li>
                            <li data-target="#graficos-crsl" data-slide-to="4"></li>
                        </ul>

                        <!--SlideShow-->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="contenedor-grafico">
                                    <iframe scroll="no" class="grafico-destacado" src="<?= base_url ?>uploads/graficos/plot_test_1.html">
                                    </iframe>

                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="contenedor-grafico">
                                    <iframe class="grafico-destacado" src="<?= base_url ?>uploads/graficos/plot_test_1.html">
                                    </iframe>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="contenedor-grafico">
                                    <iframe class="grafico-destacado" src="<?= base_url ?>uploads/graficos/plot_test_1.html">
                                    </iframe>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="contenedor-grafico">
                                    <iframe class="grafico-destacado" src="<?= base_url ?>uploads/graficos/plot_test_1.html">
                                    </iframe>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="contenedor-grafico">
                                    <iframe class="grafico-destacado" src="<?= base_url ?>uploads/graficos/plot_test_1.html">
                                    </iframe>
                                </div>
                            </div>
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
