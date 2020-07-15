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
        $(".landing-page-navbar").removeClass("no-bg");
        $(".landing-page-nav-link").removeClass("initial-state")
        $("#jumbo").hide();
        showSpinnerWhileIFrameLoads();
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
    $.scrollify.disable();
</script>
<iframe width="100%" height="1000px" frameBorder='0' src="https://datainnovacion.shinyapps.io/portafolio/">
</iframe>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>