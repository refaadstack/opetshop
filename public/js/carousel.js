$(".owl-carousel").owlCarousel({
    loop: true,
    nav: true,
    navText: [
        "<button type='button' class='btn btn-outline-info mr-2 mt-2'>Prev</button>",
        " <button type='button' class='btn btn-info mt-2'>Next</button>",
    ],
    margin: 0,
    autoplay: true,
    autoplayTimeout: 20000,
    smartSpeed: 450,
    responsive: {
        0: {
            items: 1,
        },
        768: {
            items: 2,
        },
        1170: {
            items: 4,
        },
    },
});
