<a href="#" class="scrollToTop"><i class="fad fa-arrow-to-top fa-2x"></i></a>
<div class="col-12 page-content p-5" id="content">
    <button id="sidebarCollapse" type="button" class="btn px-4 mb-4 navbar-toggler2 collapsed shadow-sm">
        <span class="icon-bar top-bar"></span>
        <span class="icon-bar middle-bar"></span>
        <span class="icon-bar bottom-bar"></span>
    </button>
    <div class="row justify-content-center w-100">
        <div class="col-sm-12 align-self-top ">
            <div class="container">
                <h1 class="text-center" id="estudios_title"><i class="fad fa-mail-bulk icono-celeste"></i> Envio de recordatorio masivo </h1>
                <hr class="faded" >
                <br>
                <div class="container justify-content-center">
                    <h2 class="text-center"><i class="fad fa-vial"></i> Funciones de prueba</h2>
                    <br>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center w-100 mt-4">
        <form action="<?= base_url . 'develop/pruebaRecorrer' ?>" class='col-12' method="POST">

            <div class='row justify-content-center '>

                <div class='col-6 border rounded p-3'>
                    <p class="mt-1">Selecciona la cuenta con la cual se recorreran los correos a los faltantes: </p>
                    <select name="nombre_corfo" id="" class="form-control select-form">
                        <option value="BrendaRG10553J">Brenda Rain Garrido</option>
                        <option value="MacarenaJF49343R">Macarena Jofré Fuentes</option>
                        <option value="FabiánOV99832A">Fabián Ortega Vega</option>
                    </select>
                    <p class="mt-3">Selecciona la cantidad de correos que se recorreran: </p>
                    <select name="cantidad_correos" id="" class="form-control select-form">
                        <option value="5">5 Correos</option>
                        <option value="15">15 Correos</option>
                        <option value="40">40 Correos</option>
                    </select>
                    <button type='submit' class="btn btn-danger w-100 mt-2 show-load"><i class="fal fa-paper-plane"></i> Prueba recorrer correos</button>
                </div>
            </div>
        </form>
    </div>

    <hr class='faded'>



    <div class="container justify-content-center mt-5">
        <h2 class="text-center"><i class="fad fa-project-diagram"></i> Funciones definitivas</h2>
        <br>
    </div>

    <div class="row justify-content-center w-100 mt-4">
        <form action="<?= base_url . 'develop/enviarCorreos' ?>" class='col-12' method="POST">

            <div class='row justify-content-center '>

                <div class='col-6 border rounded p-3'>
                    <p class="mt-1">Selecciona la cuenta con la cual se enviaran los correos a los faltantes: </p>
                    <select name="nombre_corfo" id="" class="form-control select-form">
                        <option value="BrendaRG10553J">Brenda Rain Garrido</option>
                        <option value="MacarenaJF49343R">Macarena Jofré Fuentes</option>
                        <option value="FabiánOV99832A">Fabián Ortega Vega</option>
                    </select>
                    <p class="mt-3">Selecciona la cantidad de correos que se enviaran: </p>
                    <select name="cantidad_correos" id="" class="form-control select-form mt-0">
                        <option value="5">5 Correos</option>
                        <option value="15">15 Correos</option>
                        <option value="40">40 Correos</option>
                    </select>
                    <button type='submit' class="btn btn-primary w-100 mt-2 show-load"><i class="fal fa-paper-plane"></i> Enviar correos</button>
                </div>
            </div>
        </form>
    </div>
    <br><br> <br><br> <br><br>
        <div class="row justify-content-center w-100 mt-4">
        <p class="color-rojo thin-font"><b>ATENCIÓN:</b> Esta función es solo de prueba, no utilizar en producción. </p>
        </div>
    <div class="row justify-content-center w-100 mt-2">
        <a class="btn btn-danger show-load" href="<?= base_url . 'develop/setAllFaltantesDefault' ?>"><i class="fal fa-edit"></i> Restablecer el estado de los faltantes</a>
    </div>
    <br><br> <br><br> <br><br> <br><br> <br><br> <br><br>
</div>