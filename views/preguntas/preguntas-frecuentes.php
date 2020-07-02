<script>

    $(document).ready(function () {
        $(".landing-page-navbar").removeClass("no-bg");
        $(".landing-page-nav-link").removeClass("initial-state")
        $(".panel").animate({
            opacity: 1
        }, 0);
        $.scrollify.disable();
    });
</script>
<?php
?>
<div class="container vh-100">
    <div class="row justify-content-center mt-2">
        <h1> Preguntas frecuentes </h1>
    </div>
    <div class="row justify-content-center">
        <i class="far fa-question-circle fa-5x color-azul-claro"></i>
    </div>
    <br>
    <div id="accordion">
        <?php while ($pre = $preguntas->fetch_object()) { ?>
            <div class="card">    
                <div class="card-header" id="heading-<?= $pre->id ?>">
                    <h5 class="row mb-0 justify-content-center">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#pregunta-contenido-<?= $pre->id ?>">
                            <h3><?= $pre->nombre ?></h3>
                        </button>
                    </h5>
                </div>
                <div id="pregunta-contenido-<?= $pre->id ?>" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                        <p><?= $pre->texto ?></p>
                    </div>
                </div>
            </div>

            <?php
        }
        ?>
    </div>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>

