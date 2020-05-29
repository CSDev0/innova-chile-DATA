<section class="seccion">
    <div class="container justify-content-center vh-100">
    <div class="row section">
        <div class="col-sm-12">
            <h1 class="text-center">Chile en el mundo</h1>
            <hr class="faded">
            <br>
            <p><?= utils::getTextoByTipoContenido('Chile en el mundo') ?></p>
            <br><br>
            <div class="row">
                <div class="col-sm-6">
                    <div class="contenedor-grafico small">
                        <iframe class="grafico-chile" src="<?= base_url ?>uploads/graficos/GCR_chile.html">
                        </iframe>
                    </div>
                    <br><br> <p class="text-center">Grafico Indice de Competitividad</p>
                </div>
                <div class="col-sm-6">
                    <div class="contenedor-grafico small">
                        <iframe class="grafico-chile" src="<?= base_url ?>uploads/graficos/GII_chile.html">
                        </iframe>
                    </div>
                    <br><br> <p class="text-center">Grafico Indice de Innovación</p>
                </div>
                <div class="col-sm-2"></div>
            </div>
        </div>
    </div>
        <br><br>
    </div>
</section>


