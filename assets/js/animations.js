$(document).ready(function () {
    $(".landing-page-navbar").removeClass("bg-gradient");
    $(".landing-page-nav-link").removeClass("bg-gradient");
    $.scrollify({
        section: ".seccion",
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
                $("#quienes_somos_title").show("puff", 800);
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
                $("#datos_destacados_title").show("puff", 800);
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
                $("#graficos_destacados_title").show("puff", 800);
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
                $("#data_title").show("puff", 800);
                $(".landing-page-navbar").removeClass("no-bg");
                $(".landing-page-nav-link").removeClass("initial-state")
                $(".landing-page-navbar").addClass("bg-gradient");
                $(".landing-page-nav-link").addClass("bg-gradient");
                $(".logo-corfo").css("opacity", "0");
                $("#estudios_title").hide("puff", 0);

                $("#nuestros_title").hide("puff", 0);
                $("#lecturas_title").hide("puff", 0);

            }
            if ($.scrollify.current().attr('data-section-name') == "estudios")
            {
                $("#data_title").hide("puff", 0);
                $("#estudios_title").show("puff", 800);

                $("#nuestros_title").show("puff", 800);
                $("#lecturas_title").show("puff", 800);

                $(".landing-page-navbar").removeClass("no-bg");
                $(".landing-page-nav-link").removeClass("initial-state");
                $(".landing-page-navbar").addClass("bg-gradient");
                $(".landing-page-nav-link").addClass("bg-gradient");
                $(".logo-corfo").css("opacity", "0");
                $("#chile_title").hide("puff", 0);

            }
            if ($.scrollify.current().attr('data-section-name') === "chile_en_el_mundo")
            {
                $("#chile_title").show("puff", 800);
                $(".landing-page-navbar").removeClass("no-bg");
                $(".landing-page-nav-link").removeClass("initial-state");
                $(".landing-page-navbar").addClass("bg-gradient");
                $(".landing-page-nav-link").addClass("bg-gradient");
                $(".logo-corfo").css("opacity", "0");
            }
        },
        after: function (index)
        {
        }


    });
});
