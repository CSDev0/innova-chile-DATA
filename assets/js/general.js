$(document).on('click', 'a[href^="#"]', function (event) {
    event.preventDefault();

    $('html, body, #main').animate({
        scrollTop: $($.attr(this, 'href')).offset().top
    }, 500);

});

$(window).scroll(function () {
    if ($(this).scrollTop() > 700) {
        $('#back-to-top').fadeIn();
    } else {
        $('#back-to-top').fadeOut();
    }
});
// scroll body to 0px on click
$('#back-to-top').click(function () {
    $('body,html').animate({
        scrollTop: 0
    }, 400);
    return false;
});

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
