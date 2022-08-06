let menuBtn = document.querySelector('.header__menu-btn');
let menu = document.querySelector('.menu');
let menuBox = document.querySelector('.menu-btn-box');
let mainBlur = document.querySelector('.main');
menuBtn.addEventListener('click', function () {
    menu.classList.toggle('active');
    mainBlur.classList.toggle('active-blur');
})
