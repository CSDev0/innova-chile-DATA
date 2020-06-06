<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">


        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
        <link rel="stylesheet" href="<?= base_url ?>assets/css/force-bootstrap.css">
        <link rel="stylesheet" href="<?= base_url ?>assets/css/fonts/fonts.css">
        <link rel="stylesheet/less" href="<?= base_url ?>assets/css/data.less">
        <link rel="stylesheet/less" href="<?= base_url ?>assets/css/general.less">
        <link rel="stylesheet/less" href="<?= base_url ?>assets/css/gestion.less">
        <link rel="stylesheet" href="<?= base_url ?>assets/css/loader.css">

        <!--  Para mostrar errores de LESS si es que ocurriesen activar:       -->
        <!--  <script type="text/javascript">less = {env: 'development'};</script> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/less.js/3.11.1/less.min.js" ></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="https://pixijs.download/dev-graphics-batch-pool/pixi.js"></script>
        <script src="https://cdn.jsdelivr.net/gh/T-vK/SuperParticles@master/SuperParticles.js"></script>
        
        <!--Funciones $.debounce: junta todas las peticiones y las ejecuta luego de unos milisegundos.
                                $.throttle: solo permite la ejecucion de una peticion cada tantos milisegundos.
        -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-throttle-debounce/1.1/jquery.ba-throttle-debounce.min.js"></script>
        <script src="<?= base_url ?>assets/js/particles.min.js"></script>
        <script src="<?= base_url ?>assets/js/parameters.js"></script>
        <script src="<?= base_url ?>assets/js/scrollify.js"></script>
        <script src="<?= base_url ?>assets/js/nav-bar.js"></script>
        <script src="<?= base_url ?>assets/js/animations.js"></script>
        <script src="<?= base_url ?>assets/js/parsley.js"></script>




        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
        <title>InnovaChile - Proyectos para el mañana.</title>
    </head>
    <body>
        <div class="se-pre-con"></div>  
        <?php require_once('views/mensajes/modal-mensajes.php'); ?>
    <!--        <a id="back-to-top" href="#" class="btn btn-light btn-lg back-to-top" role="button"><i class="fas fa-chevron-up"></i></a>-->
