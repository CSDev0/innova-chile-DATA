<!DOCTYPE html>
<html lang="es" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- FAVICON CONFIG -->
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/site.webmanifest">
        <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#0f4c75">
        <meta name="msapplication-TileColor" content="#2d89ef">
        <meta name="theme-color" content="#ffffff">
        <!-- ------------------------------------------------------------------------------------------------- -->
        <script src="https://www.google.com/recaptcha/api.js?onload=CaptchaCallback&render=explicit" async defer></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
        <link rel="stylesheet" href="<?= base_url ?>assets/css/force-bootstrap.css">
        <link rel="stylesheet" href="<?= base_url ?>assets/css/fonts/fonts.css">
        <link rel="stylesheet/less" href="<?= base_url ?>assets/css/data.less">
        <link rel="stylesheet/less" href="<?= base_url ?>assets/css/general.less">
        <link rel="stylesheet/less" href="<?= base_url ?>assets/css/gestion.less">
        <link rel="stylesheet" href="<?= base_url ?>assets/css/loader.css">
        <link rel="stylesheet" href="<?= base_url ?>assets/icon/icons.css">
        <link rel="stylesheet/less" href="<?= base_url ?>assets/css/navbar.less">
        <!--  Para mostrar errores de LESS si es que ocurriesen activar:       -->
        <!--  <script type="text/javascript">less = {env: 'development'};</script> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/less.js/3.11.1/less.min.js" ></script>
        <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="https://pixijs.download/dev-graphics-batch-pool/pixi.js"></script>
        <script src="https://cdn.jsdelivr.net/gh/T-vK/SuperParticles@master/SuperParticles.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.6/clipboard.min.js"></script>
        <!--Funciones $.debounce: junta todas las peticiones y las ejecuta luego de unos milisegundos.
                                $.throttle: solo permite la ejecucion de una peticion cada tantos milisegundos.
        -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-throttle-debounce/1.1/jquery.ba-throttle-debounce.min.js"></script>
        <script src="<?= base_url ?>assets/js/particles.min.js"></script>
        <script src="<?= base_url ?>assets/js/parameters.js"></script>
        <script src="<?= base_url ?>assets/js/nav-bar.js"></script>
        <script src="<?= base_url ?>assets/js/parsley.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
        <title><?php utils::getTitulo() ?></title>
    </head>
    <body>

        <!--Para utilizar var_dump y esas cosas de debug, colocar    style="display: none"   a este elemento (el loader)-->
        <div class="se-pre-con"></div>
