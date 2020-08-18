$(document).ready(function () {
    $(".landing-page-navbar").removeClass("bg-gradient");
    $(".landing-page-nav-link").removeClass("bg-gradient");
    $.scrollify({
        section: ".seccion",
        scrollSpeed: 1000,
        interstitialSection: ".seccion-extra",
        easing: "easeOutExpo",
        setHeights: false,
        scrollbars: true,
        overflowScroll: true,
        updateHash: true,
        touchScroll: true,
        offset: 0,
        before: function ()
        {
            if ($.scrollify.current().attr('data-section-name') == "quienes_somos")
            {
                $("#quienes_somos_title").show("puff", 650);
                $(".landing-page-navbar").removeClass("bg-gradient");
                $(".landing-page-nav-link").removeClass("bg-gradient");
                $(".landing-page-navbar").addClass("no-bg");
                $(".landing-page-nav-link").addClass("initial-state")
                $(".logo-corfo").css("opacity", "1");
                $("#datos_destacados_title").hide("puff", 0);

            }
            if ($.scrollify.current().attr('data-section-name') == "datos_destacados")
            {
                datosDestacados();
                $("#datos_destacados_title").show("puff", 650);
                $(".landing-page-navbar").removeClass("no-bg");
                $(".landing-page-nav-link").removeClass("initial-state")
                $(".landing-page-navbar").addClass("bg-gradient");
                $(".landing-page-nav-link").addClass("bg-gradient");
                $(".logo-corfo").css("opacity", "0");
                $("#graficos_destacados_title").hide("puff", 0);
            }
            if ($.scrollify.current().attr('data-section-name') == "graficos_destacados")
            {
                $("#datos_destacados_title").hide("puff", 0);
                $("#graficos_destacados_title").show("puff", 650);
                $(".landing-page-navbar").removeClass("no-bg");
                $(".landing-page-nav-link").removeClass("initial-state")
                $(".landing-page-navbar").addClass("bg-gradient");
                $(".landing-page-nav-link").addClass("bg-gradient");
                $(".logo-corfo").css("opacity", "0");
                $("#data_title").hide("puff", 0);
            }

            if ($.scrollify.current().attr('data-section-name') == "data")
            {
                $("#graficos_destacados_title").hide("puff", 0);
                $("#data_title").show("puff", 650);
                $(".landing-page-navbar").removeClass("no-bg");
                $(".landing-page-nav-link").removeClass("initial-state")
                $(".landing-page-navbar").addClass("bg-gradient");
                $(".landing-page-nav-link").addClass("bg-gradient");
                $(".logo-corfo").css("opacity", "0");
                $("#estudios_title").hide("puff", 0);

                $("#nuestros_title").hide("puff", 0);
                $("#lecturas_title").hide("puff", 0);

            }
            if ($.scrollify.current().attr('data-section-name') == "politicas_publicas")
            {
                $("#data_title").hide("puff", 0);
                $("#estudios_title").show("puff", 650);

                $("#nuestros_title").show("puff", 650);
                $("#lecturas_title").show("puff", 650);
                $("#programas_title").show("puff", 650);

                $(".landing-page-navbar").removeClass("no-bg");
                $(".landing-page-nav-link").removeClass("initial-state");
                $(".landing-page-navbar").addClass("bg-gradient");
                $(".landing-page-nav-link").addClass("bg-gradient");
                $(".logo-corfo").css("opacity", "0");
                $("#chile_title").hide("puff", 0);

            }
            if ($.scrollify.current().attr('data-section-name') === "chile_en_el_mundo")
            {
                $("#chile_title").show("puff", 650);
                $(".landing-page-navbar").removeClass("no-bg");
                $(".landing-page-nav-link").removeClass("initial-state");
                $(".landing-page-navbar").addClass("bg-gradient");
                $(".landing-page-nav-link").addClass("bg-gradient");
                $(".logo-corfo").css("opacity", "0");
            }
        },
        after: function (index)
        {
            $.scrollify.update();
        }


    });
});
function startTimer(duration, display) {
    var start = Date.now(),
            diff,
            hours,
            minutes,
            seconds;

    function timer() {
        // get the number of seconds that have elapsed since 
        // startTimer() was called
        diff = duration - (((Date.now() - start) / 1000) | 0);

        // Setting and displaying hours, minutes, seconds
        hours = (diff / 3600) | 0; // was: hours = (diff / 360) | 0;
        minutes = ((diff % 3600) / 60) | 0;
        seconds = (diff % 60) | 0;

        hours = hours < 10 ? "0" + hours : hours;
        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = hours + ":" + minutes + ":" + seconds;

        if (diff <= 0) {
            // add one second so that the count down starts at the full duration
            // example 17:00:00 not 16:59:59
            start = Date.now() + 1000;
        }
    }
    ;
    // don't want to wait a full second before the timer starts
    timer();
    setInterval(timer, 1000);
}