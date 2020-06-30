<section id="footer" class="seccion-extra footer-sticky" >
    <div id="bg-footer">
        <div class="text-center"><i class="fas fa-angle-up fa-3x color-azul" id="flecha-animada"></i></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <h4>Te puede interesar</h4>
                    <?php utils::getOtros(); ?>
                </div>
                <div class="col-sm-4 text-center">
                    <div class="col-sm">
                        <a class="link-normal" href="<?= base_url ?>web/faq"> <i class="fa fa-angle-double-right color-azul"></i> Preguntas frecuentes (FAQ) <i class="fa fa-angle-double-left color-azul"></i></a><br>
                    </div>
                    <br>
                    <div class="col-sm">
                    <h4>Siguenos en nuestras redes</h4>
                    <?php utils::getLinks(); ?>
                    </div>

                </div>
                <div class="col-sm-4">
                    <h4>Mapa del sitio</h4>
                    <i class="fa fa-angle-double-right color-azul"></i><a class="link-normal" href="<?= base_url ?>web/inicio"> Inicio</a><br>
                    <i class="fa fa-angle-double-right color-azul"></i><a class="link-normal" href="<?= base_url ?>web/convocatorias"> Convocatorias</a><br>
                    <i class="fa fa-angle-double-right color-azul"></i><a class="link-normal" href="<?= base_url ?>web/login"> Zona de administración</a><br>
                </div>
            </div>

        </div>
    </div>
    <div id="copyright">
        <p class="white text-center">© InnovaChile CORFO todos los derechos reservados <?php echo date("Y"); ?>.</p>
    </div>
</section>


<script>
    $(window).on('load', function () {
        // Animate loader off screen
        $(".se-pre-con").fadeOut("slow");
//        particlesJS.load('bg-quienes-somos', baseurl + 'assets/particlesjs-config.json', function () {
//        });
        var divContainer = '#bg-quienes-somos'
        new SuperParticles({
            "maxFps": 30,
            "autoStartAnimation": true,
            "container": {
                "element": divContainer,
                "backgroundCssRule": ""
            },
            "pixiApp": {
                "antialias": false,
                "transparent": true,
                "forceFXAA": false,
                "powerPreference": "high-performance",
                "resolution": 1
            },
            "particles": {
                "amount": 60,
                "radius": 2,
                "velocity": 15,
                "color": "0x0062AB",
                "fadeInDuration": 3000,
                "fadeOutDuration": 600,
                "keepRelativePositionOnResize": true
            },
            "lines": {
                "minDistance": 0.17,
                "color": "0x0062AB",
                "maxOpacity": 0.3,
                "thickness": 1,
                "distanceBasedTransparency": true
            },
            "debug": {
                "showFps": false
            }
        });
    });</script>
<script src="<?= base_url ?>assets/js/general.js"></script>
<script src="<?= base_url ?>assets/js/boxes.js"></script>
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script src="<?= base_url ?>assets/js/summernote-es-ES.js"></script>
<script>
    $('.input-contenido-texto').summernote({
        lang: 'es-ES',
        dialogsInBody: true,
        placeholder: 'Ingrese un texto descriptivo.',
        tabsize: 5,
        height: 250,
        toolbar: [
            // [groupName, [list of button]]
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link']],
            ['view', ['fullscreen', 'codeview', 'help']],
        ]
    });
    $('#input-estudio-texto').summernote({
        lang: 'es-ES',
        dialogsInBody: true,
        placeholder: 'Ingrese un texto descriptivo.',
        tabsize: 5,
        height: 150,
        toolbar: [
            // [groupName, [list of button]]
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['para', ['ul', 'ol']],
            ['insert', ['link']],
            ['view', ['fullscreen', 'help']],
        ]
    });

</script>
