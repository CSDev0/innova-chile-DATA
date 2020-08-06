<base target="_parent">
<h1 class="text-center mt-4">Lo que buscas no existe!</h1>
<div class='row justify-content-center'>
<i class="fad fa-frown-open fa-6x text-center color-azul mt-5"></i>
</div>
<h2 class="text-center mt-5">¿Ahora que?</h2>
<div class='row justify-content-center'>
 <a href='<?=base_url?>' class='btn btn-primary mt-3' ><i class="fad fa-home"></i> Volver al Inicio</a>
</div>
<script>

    $(".se-pre-con").fadeOut("slow");
    $(document).ready(function () {
        $.scrollify.disable();
        $("#jumbo").hide();
        $("#footer").hide();
        $("#menubar").slideUp(400);
    });

</script>
