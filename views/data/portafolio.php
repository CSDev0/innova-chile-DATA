<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<script>

    $(".se-pre-con").fadeOut("slow");
    $(document).ready(function () {
        $.scrollify.disable();
        $(".landing-page-navbar").removeClass("no-bg");
        $(".landing-page-nav-link").removeClass("initial-state");
        $("#menubar").removeClass("sticky-top");
        $("#jumbo").hide();
        showSpinnerWhileIFrameLoads();
        $("#menubar").slideUp(400);
    });
    function showSpinnerWhileIFrameLoads() {
        var iframe = $('iframe');
        if (iframe.length) {

            $(iframe).before('<div class="bg-iframe"><div id="spinner"><i class="fa fa-spinner fa-spin fa-4x fa-fw icono-naranja"></i>\n\
                </div></div></div>');
            $(iframe).on('load', function () {
                $('.bg-iframe').css('opacity', '0');
                $('.bg-iframe').css('visibility', 'hidden');

            });
        }
    }

</script>
<iframe id="portafolio-shiny" frameborder="0" style="overflow:hidden;height:90vh;width:100%" height="90vh" width="100%" frameBorder='0' src="https://datainnovacion.shinyapps.io/portafolio/">
</iframe>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>