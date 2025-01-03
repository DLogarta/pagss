$(document).ready(function(){
    $(".events").owlCarousel({
        loop: true,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 3000,
        items: 1
    });
});

$(document).ready(function(){
    $("#awards").owlCarousel({
        loop: true,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 3000,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            }
        }
    });
});

$(document).ready(function(){
    $("#services").owlCarousel({
        loop: true,
        margin: 10,
        center: true,
        autoplay: true,
        autoplayTimeout: 3000,
        items: 1,
    });
});

$(document).ready(function(){
    $(".owl-carousel").owlCarousel({
        loop: true,
        margin: 10,
        center: true,
        autoplay: true,
        autoplayTimeout: 3000,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 3
            }
        }
    });
});

