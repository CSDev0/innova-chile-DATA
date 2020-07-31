<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of lecturas-recomendadas
 *
 * @author saez_
 */
?>
<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of estudios
 *
 * @author saez_
 */
?>
<script>
    $("#navMenu").hide();
    $(document).ready(function () {
        $.scrollify.disable();
        $(".landing-page-navbar").removeClass("no-bg");
        $(".landing-page-nav-link").removeClass("initial-state")
    });
</script>

<section class="seccion pb-5" data-section-name="nuestros_estudios" id="nuestros-estudios">
    <div class="row justify-content-center w-100"> 
        <div class="col-sm-12 align-self-top ">
            <div class="container">
                <h1 class="text-center" id="estudios_title"><i class="fad fa-folder-open icono-celeste"></i> Lecturas recomendadas</h1>
                <hr class="faded" >
                <br>
                <div class="container">
                    <p><?= utils::getTextoByTipoContenido('Lecturas') ?></p>
                    <br>
                </div>
            </div>
        </div>

    </div>
    <div class="col-sm-12 align-self-top vw-100">
        <div class="container">
            <ul class="dot-list">
                <?php
                $contador1 = 0;
                while ($est2 = $estudios2->fetch_object()):
                    if ($est2->tipo == "lectura") {

                        if ($contador1 == 0) {
                            ?>
                            <div class="row">
                            <?php }
                            ?>
                            <div class="col-sm-6">
                                <li>
                                    <a class="link-normal estudios" data-nombre="<?= $est2->nombre ?>" data-descripcion="<?= htmlentities($est2->descripcion)?>"
                                       data-enlace="<?= $est2->enlace ?>" data-tipo="<?= $est2->tipo ?>"
                                       href="#modal-estudios" data-toggle="modal" ><?= $est2->nombre ?> (<?= $est2->ano_estudio ?>) </a>
                                </li>
                            </div>
                            <?php
                            $contador1++;
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

        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    </div>
</section>

