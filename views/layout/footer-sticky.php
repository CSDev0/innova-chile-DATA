<section id="footer" class="seccion-extra footer-sticky">
    <div id="bg-footer">
        <div class="text-center"><i class="fas fa-angle-up fa-3x color-azul" id="flecha-animada"></i></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <h4>Te puede interesar</h4>
                    <i class="fa fa-angle-double-right color-azul"></i><a class="link-normal" href="#"> Encuesta de Innovacion</a><br>
                    <i class="fa fa-angle-double-right color-azul"></i><a class="link-normal" href="#"> Data Emprendimiento</a><br>
                    <i class="fa fa-angle-double-right color-azul"></i><a class="link-normal" href="#"> Observatiorio CTCI</a><br>
                    <i class="fa fa-angle-double-right color-azul"></i><a class="link-normal" href="#"> Observatiorio MINECON</a>
                </div>
                <div class="col-sm-4 text-center">
                    <h4>Siguenos en nuestras redes</h4>
                    <i class="fab fa-facebook-square fa-4x color-azul"></i>
                    <i class="fab fa-instagram-square fa-4x color-ig"></i>
                    <i class="fab fa-twitter-square fa-4x color-azul-claro"></i>

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

<script src="<?= base_url ?>assets/js/general.js"></script>
<script src="<?= base_url ?>assets/js/boxes.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/smoothscroll/1.4.10/SmoothScroll.min.js"></script>
<script>SmoothScroll({keyboardSupport: true})</script>
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script src="<?= base_url ?>assets/js/summernote-es-ES.js"></script>
<script>
    $('#input-contenido-texto').summernote({
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

