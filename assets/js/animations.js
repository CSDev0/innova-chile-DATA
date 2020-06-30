$(function () {

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
                $("#quienes_somos_title").effect("slide", 800);
                $(".landing-page-navbar").addClass("no-bg");
                $(".landing-page-nav-link").addClass("initial-state")
                $(".logo-corfo").css("opacity", "1");

            }
            if ($.scrollify.current().attr('data-section-name') == "datos_destacados")
            {
                datosDestacados();
                $("#datos_destacados_title").effect("slide", 800);
                $(".landing-page-navbar").removeClass("no-bg");
                $(".landing-page-nav-link").removeClass("initial-state")
                $(".logo-corfo").css("opacity", "0");
            }
            if ($.scrollify.current().attr('data-section-name') == "graficos_destacados")
            {
                $("#graficos_destacados_title").effect("slide", 800);
                $(".landing-page-navbar").removeClass("no-bg");
                $(".landing-page-nav-link").removeClass("initial-state")
                $(".logo-corfo").css("opacity", "0");
            }

            if ($.scrollify.current().attr('data-section-name') == "data")
            {
                $("#data_title").effect("slide", 800);
                $(".landing-page-navbar").removeClass("no-bg");
                $(".landing-page-nav-link").removeClass("initial-state")
                $(".logo-corfo").css("opacity", "0");
            }
            if ($.scrollify.current().attr('data-section-name') == "estudios")
            {
                $("#estudios_title").effect("slide", 800);
                $("#nuestros_title").effect("slide", 800);
                $("#lecturas_title").effect("slide", 800);
                $(".landing-page-navbar").removeClass("no-bg");
                $(".landing-page-nav-link").removeClass("initial-state")
                $(".logo-corfo").css("opacity", "0");

            }
            if ($.scrollify.current().attr('data-section-name') == "chile_en_el_mundo")
            {
                $("#chile_title").effect("slide", 800);
                $(".landing-page-navbar").removeClass("no-bg");
                $(".landing-page-nav-link").removeClass("initial-state")
                $(".logo-corfo").css("opacity", "0");

            }
        },
        after: function (index)
        {
        },
        afterRender: function () {
            $.scrollify.update();

        },

    });
});


