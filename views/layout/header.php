<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
        <link rel="stylesheet" href="<?= base_url ?>assets/css/force-bootstrap.css">
        <link rel="stylesheet" href="<?= base_url ?>assets/css/general.css">
        <link rel="stylesheet" href="<?= base_url ?>assets/css/data.css">
        <link rel="stylesheet" href="<?= base_url ?>assets/css/logAdmin.css">
        <link rel="stylesheet" href="<?= base_url ?>assets/css/gestion.css">
        <link rel="stylesheet" href="<?= base_url ?>assets/css/fonts/fonts.css">



        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>


        <script src="<?= base_url ?>assets/js/parameters.js"></script>
        <script src="<?= base_url ?>assets/js/general.js"></script>
        <script src="<?= base_url ?>assets/js/boxes.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/scrollify/1.0.19/jquery.scrollify.min.js"></script>
        <script>
            $(function () {
                $.scrollify({
                    section: ".seccion",
                    interstitialSection: ".seccion-extra",
                    easing: "easeOutExpo",
                    setHeights: false,
                    scrollSpeed: 1500
                });
            });
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/smoothscroll/1.4.10/SmoothScroll.min.js"></script>
        <script>SmoothScroll({keyboardSupport: true})</script>

        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">




        <title>InnovaChile - Proyectos para el mañana.</title>
    </head>
    <body>
        <?php require_once('views/mensajes/modal-mensajes.php'); ?>

<!--        <a id="back-to-top" href="#" class="btn btn-light btn-lg back-to-top" role="button"><i class="fas fa-chevron-up"></i></a>-->
        <section class="seccion-extra">
            <div id="jumbo" class="jumbotron">
                <div class="logo-corfo"></div>
                <a href="<?= base_url ?>web/inicio"><div class="logo-innova"></div></a>
            </div>
        </section>
