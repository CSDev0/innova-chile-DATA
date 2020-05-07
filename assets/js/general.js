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
