$(document).on('click', 'a[href^="#"]', function (event) {
    event.preventDefault();

    $('html, body, #main').animate({
        scrollTop: $($.attr(this, 'href')).offset().top
    }, 500);
    
});
