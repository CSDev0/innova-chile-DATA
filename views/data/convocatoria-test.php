<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<script>
    $(document).ready(function () {
        $('html, body, #main').animate({
            scrollTop: $('#menubar').offset().top
        }, 1500);
    });
</script> 

<div class="container">
    <div class="contenedor-grafico" id="grafico">
        <iframe class="grafico-data" src="https://datainnovacion.github.io/plot_2/">
        </iframe>
    </div>

</div>

