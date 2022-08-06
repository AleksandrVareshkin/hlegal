const swiper = new Swiper('.swiper', {
    slidesPerView: 1,
    breakpoints: {
        768: {
            slidesPerView: 4,
            spaceBetween: 40,
        }
    },
    loop: true,
    pagination: {
        el: '.swiper-pagination',
    },
    // Navigation arrows
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
});