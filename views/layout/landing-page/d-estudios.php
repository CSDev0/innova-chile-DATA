<div class="row section" id="nav4">
    <div class="col-sm-12">
        <h1>Estudios</h1>
        <p><?=utils::getTextoByTipoContenido('Estudios')?></p>
        <div id="NuestrosEstudios"></div>
        <br><br><br>
        <div class="row" >
            <div class="col-sm-6">
                <h2>Nuestros estudios</h2>
                <br>
            </div>
            <div class="col-sm-6">
                <br>
            </div>
        </div> 
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
                        <a class="link-normal estudios" data-nombre="<?= $est1->nombre ?>" data-descripcion="<?= $est1->descripcion ?>" 
                           data-archivo="<?= $est1->archivo ?>" data-tipo="<?= $est1->tipo ?>" 
                           href="#modal-estudios" data-toggle="modal" ><?= $est1->nombre ?> (<?= $est1->ano_estudio ?>)</a>
                        <hr>
                    </div>

                    <?php
                    $contador1 = $contador1 + 1;

                    if ($contador1 == 2) {
                        $contador1 = 0;
                        ?>
                    </div>
                    <?php
                }
            }
        endwhile;
        if ($contador1 == 1) {
            ?>
        </div>
        <?php
    }
    ?>
    <div id="LecturasRecomendadas"></div>
    <br><br><br>
    <div class="row" >
        <div class="col-sm-6">
            <h2>Lecturas recomendadas</h2>
            <br>
        </div>
        <div class="col-sm-6">
            <br>
        </div>
    </div>
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
                    <a class="link-normal estudios" data-nombre="<?= $est2->nombre ?>" data-descripcion="<?= $est2->descripcion ?>" 
                       data-enlace="<?= $est2->enlace ?>" data-tipo="<?= $est2->tipo ?>" 
                       href="#modal-estudios" data-toggle="modal" ><?= $est2->nombre ?> (<?= $est2->ano_estudio ?>) </a>
                    <hr>
                </div>
                <?php
                $contador2 = $contador2 + 1;

                if ($contador2 == 2) {
                    $contador2 = 0;
                    ?>
                </div>
                    <?php
                }
            }
        endwhile;
        if ($contador2 == 1) {
            ?>
        </div>
        <?php
    }
    ?>
</div>
</div>