<script>
    $(document).ready(function () {
    $(".landing-page-navbar").removeClass("no-bg");
    $(".landing-page-nav-link").removeClass("initial-state");
    $(".landing-page-navbar").addClass("bg-gradient");
    $(".landing-page-nav-link").addClass("bg-gradient");
    });
</script>
<div class="bg-chile">
    <section class="seccion fullview chile_mundo" data-section-name="chile">
        <div class="container-fluid d-flex justify-content-center">
            <div class="row section vw-100">
                <div class="col-sm-12">
                    <div class="container">
                        <h1 class="text-center" id="chile_title"><i class="fad fa-globe-americas icono-celeste"></i> Chile en el mundo</h1>
                        <hr class="faded">
                        <br>
                        <p class=""><?= utils::getTextoByTipoContenido('Chile en el mundo') ?></p>
                        <br>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="contenedor-grafico small">
                                    <iframe class="grafico-chile" src="<?= base_url ?>uploads/graficos/GCR_chile.html">
                                    </iframe>
                                </div>
                                <div class="small-br"></div>
                                <h2 class="text-center">Grafico Indice de Competitividad</h2>
                            </div>
                            <div class="col-sm-6">
                                <div class="contenedor-grafico small">
                                    <iframe class="grafico-chile" src="<?= base_url ?>uploads/graficos/GII_chile.html">
                                    </iframe>
                                </div>
                                <div class="small-br"></div>
                                <h2 class="text-center">Grafico Indice de Innovación</h2>
                            </div>
                            <div class="col-sm-2"></div>
                            <?php
//                          while ($gra2 = $graficos2->fetch_object()) {
//                            if ($gra2->seccion == 1) {
                            ?>
                            <!--                              <div class="col-sm-6">
                                                              <div class="contenedor-grafico small">
                                                                  <iframe class="grafico-destacado justify-content-center border pl-5 mb-2" src="<?= base_url . $gra2->archivo ?>">
                                                                  </iframe>
                                                              </div>
                                                          </div>-->
                            <?php
//                            }
//                          }
                            ?>
                            <div class="col-sm-2"></div>
                        </div>
                    </div>
                </div>
            </div>
            <br><br><br><br>
        </div>
    </section>
</div>
