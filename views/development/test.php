<?php require_once 'models/Web.php';
$object= new Web();
$object->setId(1);
$web = $object->getOne();
unset($object);
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
        $("#footer").css('height', '30px');
    });
    function showSpinnerWhileIFrameLoads() {
        var iframe = $('iframe');
        if (iframe.length) {

            $(iframe).before('<div class="bg-iframe"><div id="spinner"><i class="fal fa-spinner fa-spin fa-4x fa-fw icono-naranja"></i>\n\
                </div></div></div>');
            $(iframe).on('load', function () {
                $('.bg-iframe').css('opacity', '0');
                $('.bg-iframe').css('visibility', 'hidden');

            });
        }
    }

</script>
<iframe id="portafolio-shiny" frameborder="0" style="overflow:hidden;height:90vh;width:100%" height="90vh" width="100%" frameBorder='0' src="https://app.powerbi.com/view?r=eyJrIjoiYzE1NWQzMjUtN2RmNC00ZmNjLTg4ZjItNTliZjQ3ZTAzMGVkIiwidCI6IjYxYTM2ZTI0LTRjZjAtNGUwOC05YjgxLTQ0YmZkMjk3N2E1ZSIsImMiOjR9">
</iframe>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>