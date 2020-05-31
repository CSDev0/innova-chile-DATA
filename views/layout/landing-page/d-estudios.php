<section class="seccion" data-section-name="estudios">
    <div class="container d-flex h-100">
        <div class="row section justify-content-center vw-100">
            <div class="col-sm-12 align-self-top ">
                <div class="container">
                    <h1 class="text-center" id="estudios_title">Estudios</h1>
                    <hr class="faded" >
                    <br>
                    <p><?= utils::getTextoByTipoContenido('Estudios') ?></p>
                </div>
            </div>
            </section>
            <section class="seccion" data-section-name="nuestros_estudios" id="nuestros_estudios">
                <div class="row section">
                    <div class="col-sm-12 align-self-top vw-100">
                        <h2 class="text-center" id="nuestros_title">Nuestros estudios</h2>
                        <br>
                    </div>
                </div>
                <div class="col-sm-12 align-self-top vw-100">
                    <div class="container">
                        <ul class="dot-list">
                            <?php
                            $contador1 = 0;
                            while ($est1 = $estudios1->fetch_object()):
                                if ($est1->tipo == "estudio") {

                                    if ($contador1 == 0) {
                                        ?>
                                        <div class="row">
                                        <?php }
                                        ?>
                                        <div class="col-sm-6">
                                            <li>
                                                <a class="link-normal estudios" data-nombre="<?= $est1->nombre ?>" data-descripcion="<?= $est1->descripcion ?>" 
                                                   data-archivo="<?= $est1->archivo ?>" data-tipo="<?= $est1->tipo ?>" 
                                                   href="#modal-estudios" data-toggle="modal" ><?= $est1->nombre ?> (<?= $est1->ano_estudio ?>)</a>
                                            </li>
                                        </div>

                                        <?php
                                        $contador1 = $contador1 + 1;

                                        if ($contador1 == 2) {
                                            $contador1 = 0;
                                            ?>
                                        </div>
                                        <hr class="faded-naranja">
                                        <?php
                                    }
                                }
                            endwhile;
                            if ($contador1 == 1) {
                                ?>
                                </div>
                                <hr class="faded-naranja">
                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </section>
            <section class="seccion fullview" data-section-name="lecturas_recomendadas" id="lecturas_recomendadas">
                <div class="row section ">
                    <div class="col-sm-12 align-self-top vw-100 ">
                        <h2 class="text-center"  id="lecturas_title">Lecturas recomendadas</h2>
                        <br>
                    </div>
                </div>
                <div class="col-sm-12 align-self-top vw-100">
                    <div class="container">
                        <ul class="dot-list">
                            <?php
                            $contador2 = 0;

                            while ($est2 = $estudios2->fetch_object()):
                                if ($est2->tipo == "lectura") {

                                    if ($contador2 == 0) {
                                        ?>
                                        <div class="row">
                                        <?php }
                                        ?>
                                        <div class="col-sm-6">
                                            <li>
                                                <a class="link-normal estudios" data-nombre="<?= $est2->nombre ?>" data-descripcion="<?= $est2->descripcion ?>" 
                                                   data-enlace="<?= $est2->enlace ?>" data-tipo="<?= $est2->tipo ?>" 
                                                   href="#modal-estudios" data-toggle="modal" ><?= $est2->nombre ?> (<?= $est2->ano_estudio ?>) </a>
                                            </li>
                                        </div>

                                        <?php
                                        $contador2 = $contador2 + 1;

                                        if ($contador2 == 2) {
                                            $contador2 = 0;
                                            ?>

                                        </div>
                                        <hr class="faded-naranja-alt">

                                        <?php
                                    }
                                }
                            endwhile;
                            if ($contador2 == 1) {
                                ?>

                                </div>
                                <hr class="faded-naranja">
                                <?php
                            }
                            ?>

                        </ul>
                    </div>
                </div>
            </section>
        </div>
    </div>
