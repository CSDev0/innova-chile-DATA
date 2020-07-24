<section id="footer" class="seccion-extra footer-sticky bg-gradient" >
    <div id="bg-footer">
        <div class="text-center"><i class="fal fa-angle-up fa-3x color-blanco" id="flecha-animada"></i></div>
        <div class="container">
            <div class="row w-100">
                <div class="col-sm-4">
                    <h4 class="color-blanco">Te puede interesar</h4>
                    <?php utils::getOtros(); ?>
                </div>
                <div class="col-sm-4 text-center">
                    <div class="col-sm">
                        <a class="link-celeste" href="<?= base_url ?>web/faq"> <i class="fa fa-angle-double-right color-blanco"></i> Preguntas frecuentes (FAQ) <i class="fa fa-angle-double-left color-azul"></i></a><br>
                    </div>
                    <br>
                    <div class="col-sm">
                        <h4 class="color-blanco">Siguenos en nuestras redes</h4>
                        <?php utils::getLinks(); ?>
                    </div>

                </div>
                <div class="col-sm-4">
                    <h4 class="color-blanco">Mapa del sitio</h4>
                    <i class="fa fa-angle-double-right color-blanco"></i><a class="link-celeste" href="<?= base_url ?>web/inicio"> Inicio</a><br>
                    <i class="fa fa-angle-double-right color-blanco"></i><a class="link-celeste" href="<?= base_url ?>web/convocatorias"> Convocatorias</a><br>
                    <i class="fa fa-angle-double-right color-blanco"></i><a class="link-celeste" href="<?= base_url ?>web/login"> Zona de administración</a><br>
                </div>
            </div>

        </div>
    </div>
    <div id="copyright">
        <p class="color-azul text-center">© InnovaChile CORFO todos los derechos reservados <?php echo date("Y"); ?>.</p>
    </div>
</section>

<script type="text/javascript">
    var CaptchaCallback = function () {
        jQuery('.g-recaptcha').each(function (index, el) {
            grecaptcha.render(el, {
                'sitekey': jQuery(el).attr('data-sitekey')
                , 'theme': jQuery(el).attr('data-theme')
                , 'size': jQuery(el).attr('data-size')
                , 'tabindex': jQuery(el).attr('data-tabindex')
                , 'callback': jQuery(el).attr('data-callback')
                , 'expired-callback': jQuery(el).attr('data-expired-callback')
                , 'error-callback': jQuery(el).attr('data-error-callback')
            });
        });
    };
</script>
<script>
    $(window).on('load', function () {
        // Animate loader off screen
        setTimeout(function () {
            $(".se-pre-con").fadeOut("slow");
        }, 300);

//        particlesJS.load('bg-quienes-somos', baseurl + 'assets/particlesjs-config.json', function () {
//        });
        var divContainer = '#bg-quienes-somos'
        new SuperParticles({
            "maxFps": 15,
            "autoStartAnimation": true,
            "container": {
                "element": divContainer,
                "backgroundCssRule": ""
            },
            "pixiApp": {
                "antialias": true,
                "transparent": true,
                "forceFXAA": false,
                "powerPreference": "high-performance",
                "resolution": 1
            },
            "particles": {
                "amount": 20,
                "radius": 2,
                "velocity": 3,
                "color": "0x2680BD",
                "fadeInDuration": 3000,
                "fadeOutDuration": 600,
                "keepRelativePositionOnResize": true
            },
            "lines": {
                "minDistance": 0.50,
                "color": "0xc4c4c4",
                "maxOpacity": 0.3,
                "thickness": 0.5,
                "distanceBasedTransparency": true
            },
            "debug": {
                "showFps": false
            }
        });
    });</script>

<script src="<?= base_url ?>assets/js/general.js"></script>
<script src="<?= base_url ?>assets/js/boxes.js"></script>
<script src="<?= base_url ?>assets/js/inputsWeb.js"></script>
<script src="<?= base_url ?>assets/js/scrollify.js"></script>
<script src="<?= base_url ?>assets/js/animations.js"></script>
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
