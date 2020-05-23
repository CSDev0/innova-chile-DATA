$(document).ready(function () {
    bsCustomFileInput.init()
});

$(document).on('click', 'a[href^="#nav"]', function (event) {
    event.preventDefault();

    $('html, body, #main').animate({
        scrollTop: $($.attr(this, 'href')).offset().top
    }, 500);

});
$.fn.scrollBottom = function () {
    return $(document).height() - this.scrollTop() - this.height();
};
var abierto = false;
$(window).scroll(function () {
    if ($(this).scrollTop() > 700) {
        $('#back-to-top').fadeIn();
    } else {
        $('#back-to-top').fadeOut();
    }
    if ($(this).scrollBottom() < 20) {
        var altura = $('.footer-sticky').get(0).scrollHeight;
        $('.footer-sticky').animate({height: altura}, 50);
        abierto = true;
        flecha_abajo();

    } else {
        if ($(this).scrollBottom() > 20 && abierto === true) {
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
$('.footer-sticky').mouseenter(function (e) {
    var altura = $('.footer-sticky').get(0).scrollHeight;
    $(this).animate({height: altura}, 50);
    abierto = true;
    flecha_abajo();
}).mouseleave(function (e) {
    $(this).animate({height: '40px'}, 50);
    abierto = false;
    flecha_arriba();

});

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
