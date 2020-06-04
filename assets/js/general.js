$(document).ready(function () {
    bsCustomFileInput.init()


});
   var baloon = $('.logo-innova');
   function runIt() {
       baloon.animate({top:'+=100'}, 1000);
       baloon.animate({top:'-=100'}, 1000, runIt);
   }
   runIt();
//Funcion para definir el tamaño de las secciones dependiendo del tamaño del dispositivo.
//Esto Para solucionar bug de desplazamiento entre las secciones. (al usar viewport o height 100%).
function resizeSecciones() {

    var w = window,
            d = document,
            e = d.documentElement,
            g = d.getElementsByTagName('body')[0],
            x = w.innerWidth || e.clientWidth || g.clientWidth,
            y = w.innerHeight || e.clientHeight || g.clientHeight;
    $('.seccion.fullview').css('width', x);
    $('.seccion.fullview').css('height', y - 5); //Si se ocupa el height completo ocurre un extraño bug al desplazarse entre secciones, por lo que se le resta 5 y se soluciona.
    $("#bg-quienes-somos").css("height", y );
    $("#bg-quienes-somos").css("width", x);
}
resizeSecciones();

function datosDestacados() {
    $('.count').each(function () {
        $(this).prop('Counter', 0).animate({
            Counter: $(this).text()
        }, {
            duration: 2000,
            easing: 'easeOutExpo',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    });
}
;
//$(document).on('click', 'a[href^="#nav"]', function (event) {
//    event.preventDefault();
//
//    $('html, body, #main').animate({
//        scrollTop: $($.attr(this, 'href')).offset().top
//    }, 500);
//
//});
$(".nav-link").on('click', function (e) {
    $.scrollify.move($(this).attr('href'));
});

$("#dropdown-item-hover6").on('click', function (e) {
    $.scrollify.move($(this).attr('href'));
});
$("#dropdown-item-hover7").on('click', function (e) {
    $.scrollify.move($(this).attr('href'));
});


$.fn.scrollBottom = function () {
    return $(document).height() - this.scrollTop() - this.height();
};
var abierto = false;
var header = false;
$(window).scroll(function () {

    if ($(this).scrollBottom() < 120 && abierto === false) {
        var altura = $('.footer-sticky').get(0).scrollHeight;
        $('.footer-sticky').animate({height: altura}, 50);
        abierto = true;
        flecha_abajo();

    } else {
        if ($(this).scrollBottom() > 120 && abierto === true) {
            $('.footer-sticky').animate({height: '40px'}, 50);
            abierto = false;
            flecha_arriba();
        }
    }
});

// scroll body to 0px on click
$('#back-to-top').click(function () {
    $('body,html').animate({
        scrollTop: 0
    }, 400);
    return false;
});

//FOOTER STICKY------------------------------------------------
function flecha_abajo() {
    $('#flecha-animada').removeClass('fas fa-angle-up fa-3x icono-azul')
    $('#flecha-animada').addClass('fas fa-angle-down fa-3x icono-azul')
}
;
function flecha_arriba() {
    $('#flecha-animada').removeClass('fas fa-angle-down fa-3x icono-azul')
    $('#flecha-animada').addClass('fas fa-angle-up fa-3x icono-azul')
}
$('.footer-sticky').mouseenter($.debounce(150, function (e) {
    var altura = $('.footer-sticky').get(0).scrollHeight;

    $(this).animate({height: altura}, 50);
    abierto = true;
    flecha_abajo();
})).mouseleave($.debounce(700, function (e) {
//    if ($(window).scrollBottom() < 20 && abierto === true) {
//
//    } else {
//        if (abierto === true) {

    esconderFooter();
//        }
//    }
}));
function esconderFooter() {
    $(".footer-sticky").animate({height: '40px'}, 50);
    abierto = false;
    flecha_arriba();
}

function loop_flecha_animada() {
    $('#flecha-animada').animate({
        color: '#0062AB'
    }, 5000, 'linear', function () {
        if ($("#flecha-animada").hasClass('fas fa-angle-up fa-3x icono-azul')) {
            $("#flecha-animada").effect("bounce", {times: 10}, 1500);
        }

        loop_flecha_animada();
    });
}
loop_flecha_animada();

//--------------------------------------------------------------
$('#dropdown-item-hover').mouseenter(function (e) {
    $('#nav-bar-dropdown-arrow').css("color", "white");
}).mouseleave(function (e) {
    $('#nav-bar-dropdown-arrow').css("color", "#0062AB");
});
$('#dropdown-item-hover2').mouseenter(function (e) {
    $('#nav-bar-dropdown-arrow2').css("color", "white");
}).mouseleave(function (e) {
    $('#nav-bar-dropdown-arrow2').css("color", "#0062AB");
});

$('#dropdown-item-hover3').mouseenter(function (e) {
    $('#nav-bar-dropdown-arrow3').css("color", "white");
    $('#nav-bar-dropdown-arrow3').removeClass("fa-angle-double-right");
    $('#nav-bar-dropdown-arrow3').addClass("fa-angle-double-down");
}).mouseleave(function (e) {
    $('#nav-bar-dropdown-arrow3').css("color", "#0062AB");

    $('#nav-bar-dropdown-arrow3').removeClass("fa-angle-double-down");
    $('#nav-bar-dropdown-arrow3').addClass("fa-angle-double-right");
});

$('#dropdown-item-hover4').mouseenter(function (e) {
    $('#nav-bar-dropdown-arrow4').css("color", "white");

    $('#nav-bar-dropdown-arrow3').removeClass("fa-angle-double-right");
    $('#nav-bar-dropdown-arrow3').addClass("fa-angle-double-down");

}).mouseleave(function (e) {
    $('#nav-bar-dropdown-arrow4').css("color", "#0062AB");

    $('#nav-bar-dropdown-arrow3').removeClass("fa-angle-double-down");
    $('#nav-bar-dropdown-arrow3').addClass("fa-angle-double-right");
});

$('#dropdown-item-hover5').mouseenter(function (e) {
    $('#nav-bar-dropdown-arrow5').css("color", "white");

    $('#nav-bar-dropdown-arrow3').removeClass("fa-angle-double-right");
    $('#nav-bar-dropdown-arrow3').addClass("fa-angle-double-down");
}).mouseleave(function (e) {
    $('#nav-bar-dropdown-arrow5').css("color", "#0062AB");

    $('#nav-bar-dropdown-arrow3').removeClass("fa-angle-double-down");
    $('#nav-bar-dropdown-arrow3').addClass("fa-angle-double-right");
});

$('#ultima-convocatoria').on('click', function (e) {
    $('.convocatoria-link.ano').each(function (e) {
        $('.convocatoria-link.ano').removeClass('active');

    });
    $('.convocatoria-link.llamado').each(function (e) {
        $('.convocatoria-link.llamado').removeClass('active');

    });
    $('.collapse.anos').collapse('hide');
});
$('.convocatoria-link.boton').on('click', function (e) {
    if ($(this).hasClass('active')) {
        $(this).removeClass('active');
    } else {
        $('.convocatoria-link.boton').each(function (e) {
            $('.convocatoria-link.boton').removeClass('active');

        });

        $(this).addClass('active');
    }

});
$('.convocatoria-link.ano').on('click', function (e) {
    if ($(this).hasClass('active')) {
        $(this).removeClass('active');
    } else {
        $('.convocatoria-link.ano').each(function (e) {
            $('.convocatoria-link.ano').removeClass('active');

        });
        $(this).addClass('active');
    }
});

$('.convocatoria-link.llamado').on('click', function (e) {
    if ($(this).hasClass('active')) {
        $(this).removeClass('active');
    } else {
        $('.convocatoria-link.llamado').each(function (e) {
            $('.convocatoria-link.llamado').removeClass('active');

        });
        $(this).addClass('active');
    }
});
