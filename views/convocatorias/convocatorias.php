<?php ?>
<script>
    $(".se-pre-con").fadeOut("slow");
    $(document).ready(function () {
        $(".landing-page-navbar").removeClass("no-bg");
        $(".landing-page-nav-link").removeClass("initial-state")
        $("#jumbo").hide();
        $('html, body, #main').css("overflow", "hidden");
        showSpinnerWhileIFrameLoads();
    });
    function showSpinnerWhileIFrameLoads() {
        var iframe = $('iframe');
        if (iframe.length) {

            $(iframe).before('<div class="bg-iframe"><div id="spinner"><i class="fa fa-spinner fa-spin fa-4x fa-fw icono-naranja"></i>\n\
                </div></div></div>');
            $(iframe).before(function () {
                $('#menubar-convocatorias').css("opacity", 0);
                setTimeout(function () {
                    $('#menubar-convocatorias').css("visibility", "hidden");
                }, 500);
            });
            $(iframe).on('load', function () {
                $('.bg-iframe').css('opacity', '0');
                $('.bg-iframe').css('visibility', 'hidden');
                $('#menubar-convocatorias').css("visibility", "visible");
                $('#menubar-convocatorias').css("opacity", "1");

            });
        }
    }
    $.scrollify.disable();

</script>
  <?php
  while ($gra = $convocatorias->fetch_object()) {
    echo'<h1>lol</h1>';
    echo '<iframe id="contendedor-convocatorias" src="'.base_url . $gra->archivo.'"></iframe>';
    break;
  }
?>

<script>
    $('.convocatoria-link.llamado').click(function () {
        var link = $(this).data('link');
        $('#contendedor-convocatorias').attr('src', link);
        showSpinnerWhileIFrameLoads();
    });
    $('#ultima-convocatoria').click(function () {
        var link = $(this).data('link');
        $('#contendedor-convocatorias').attr('src', link);
        showSpinnerWhileIFrameLoads();
    });
</script>
