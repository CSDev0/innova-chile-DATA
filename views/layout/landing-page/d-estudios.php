<section class="seccion" data-section-name="estudios">
    <div class="container d-flex h-100">
        <div class="row section justify-content-center vw-100">
            <div class="col-sm-12 align-self-top ">
                <div class="container">
                    <h1 class="text-center" id="estudios_title"><i class="fad fa-folder-open icono-celeste"></i> Estudios</h1>
                    <hr class="faded" >
                    <br>

                </div>
            </div>
            </section>
            <section class="seccion pb-5" data-section-name="nuestros_estudios" id="nuestros-estudios">
                <div class="row section ">
                    <div class="col-sm-12 align-self-top vw-100">
                        <h2 class="text-center" id="nuestros_title">Nuestros estudios</h2>
                        <br>
                        <div class="container">
                            <p><?= utils::getTextoByTipoContenido('Estudios') ?></p>
                            <br>
                        </div>

                    </div>
                </div>
                <div class="col-sm-12 align-self-top vw-100">
                    <div class="container">
                        <ul class="dot-list">
                            <?php
                            $contador1 = 0;
                            $full_contador1 = 0;
                            while ($est1 = $estudios1->fetch_object()):
                                if ($est1->tipo == "estudio") {

                                    if ($contador1 == 0) {
                                        ?>
                                        <div class="row">
                                        <?php
                                        }
                                        if ($full_contador1 >= 8) {
                                            ?>
                                            <div class="col-12 row justify-content-end p-0">
                                                <a href="<?= base_url . 'estudio/nuestrosEstudios' ?>" class="btn btn-primary" ><i class="fal fa-file-plus"></i> Ver más </a>
                                            </div>
                                            <?php
                                            break;
                                        } else {
                                            ?>
                                            <div class="col-sm-6">
                                                <li>
                                                    <a class="link-normal estudios" data-nombre="<?= $est1->nombre ?>" data-descripcion="<?= htmlentities($est1->descripcion) ?>"
                                                       data-archivo="<?= $est1->archivo ?>" data-tipo="<?= $est1->tipo ?>"
                                                       href="#modal-estudios" data-toggle="modal" ><?= $est1->nombre ?> (<?= $est1->ano_estudio ?>)</a>
                                                </li>
                                            </div>
                                            <?php
                                        }
                                        $contador1++;
                                        $full_contador1++;
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
            <section class="seccion fullview" data-section-name="lecturas_recomendadas" id="lecturas-recomendadas">
                <div class="row section ">
                    <div class="col-sm-12 align-self-top vw-100 ">
                        <h2 class="text-center"  id="lecturas_title">Lecturas recomendadas</h2>
                        <br>
                        <div class="container">
                            <p><?= utils::getTextoByTipoContenido('Lecturas') ?></p>
                            <br>
                        </div>

                    </div>
                </div>
                <div class="col-sm-12 align-self-top vw-100">
                    <div class="container">
                        <ul class="dot-list">
                            <?php
                            $contador2 = 0;
                            $full_contador2 = 0;
                            while ($est2 = $estudios2->fetch_object()):
                                if ($est2->tipo == "lectura") {

                                    if ($contador2 == 0) {
                                        ?>
                                        <div class="row">
                                        <?php }
                                        if ($full_contador2 >= 8) {
                                            ?>
                                            <div class="col-12 row justify-content-end p-0">
                                                <a href="<?= base_url . 'estudio/nuestrosEstudios' ?>" class="btn btn-primary" ><i class="fal fa-file-plus"></i> Ver más </a>
                                            </div>
                                            <?php
                                            break;
                                        } else {?>
                                        <div class="col-sm-6">
                                            <li>
                                                <a class="link-normal estudios" data-nombre="<?= $est2->nombre ?>" data-descripcion="<?= htmlentities($est2->descripcion)?>"
                                                   data-enlace="<?= $est2->enlace ?>" data-tipo="<?= $est2->tipo ?>"
                                                   href="#modal-estudios" data-toggle="modal" ><?= $est2->nombre ?> (<?= $est2->ano_estudio ?>) </a>
                                            </li>
                                        </div>

                                        <?php
                                        }
                                        $contador2++;
                                        $full_contador2++;
                                        
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
