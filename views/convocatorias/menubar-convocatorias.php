<nav id="menubar-convocatorias" class="navbar">
    <div class="container">
        <nav class="navbar-nav">
            <div id="accordion1">
                <div class="row">
                    <div class="col-1-10">
                        <a class="convocatoria-link boton active" data-toggle="collapse" data-target="#navbarPorAnos2" id='ultima-convocatoria' data-link='https://datainnovacion.github.io/llamado_3/' href="#">Ultima convocatoria</a>
                    </div>
                    <div class="col-1-10">
                        <a class="convocatoria-link boton" data-toggle="collapse" data-target="#navbarPorAnos" href="<?= base_url ?>web/todos-subsidios">Convocatorias por año</a>
                        <div class="collapse" id="navbarPorAnos2" data-parent="#accordion1">
                        </div>
                        <div class="collapse" id="navbarPorAnos" data-parent="#accordion1">
                            <div id="accordion">
                                <br>
                                <a data-toggle="collapse" href="#" data-target="#Ano2019" class="convocatoria-link ano">2019</a>
                                <a data-toggle="collapse" href="#" data-target="#Ano2018" class="convocatoria-link ano">2018</a>
                                <a class="convocatoria-link ano" data-toggle="collapse" data-target="#Ano2017"href="#">2017</a>
                                <a class="convocatoria-link ano" data-toggle="collapse" data-target="#Ano2016"href="#">2016</a>
                                <a class="convocatoria-link ano" data-toggle="collapse" data-target="#Ano2015"href="#">2015</a>
                                <a class="convocatoria-link ano" data-toggle="collapse" data-target="#Ano2014"href="#">2014</a>
                                <a class="convocatoria-link ano" data-toggle="collapse" data-target="#Ano2013"href="#">2013</a>
                                <a class="convocatoria-link ano" data-toggle="collapse" data-target="#Ano2012"href="#">2012</a>
                                <div class="row">
                                    <div class="container">
                                        <div id="Ano2019" class="collapse anos" data-parent="#accordion">
                                            <br>
                                            <a class="convocatoria-link llamado" data-link='https://datainnovacion.github.io/portafolio_innova_2019_test/' href="#">Anual</a>
                                            <a class="convocatoria-link llamado" data-link='https://datainnovacion.github.io/llamado_3/' href="#">Llamado 3</a>
                                            <a class="convocatoria-link llamado" href="#">Llamado 2</a>
                                            <a class="convocatoria-link llamado" href="#">Llamado 1</a>
                                        </div>
                                        <div id="Ano2018" class="collapse anos" data-parent="#accordion">
                                            <br>
                                            <a class="convocatoria-link llamado" href="#">Llamado 3</a>
                                            <a class="convocatoria-link llamado" href="#">Llamado 2</a>
                                            <a class="convocatoria-link llamado" href="#">Llamado 1</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</nav>

<!--<div id="accordion">
            <h5>
                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne">
                    Collapsible #1 trigger
                </button>
            </h5>
        <div id="collapseOne" class="collapse" data-parent="#accordion">
                Collapsible #1 element
        </div>
            <h5>
                <button class="btn btn-link" data-toggle="collapse" data-target="#collapse2">
                    Collapsible #2 trigger
                </button>
            </h5>
        <div id="collapse2" class="collapse" data-parent="#accordion">
                Collapsible #1 element
        </div>
    ... (more cards/collapsibles inside #accordion parent)
</div>-->