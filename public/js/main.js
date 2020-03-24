///// Burger handler

(function () {
    const burgerItem = document.querySelector('.burger');
    const menu = document.querySelector('.header_nav');
    const menu_close = document.querySelector('.header_nav_close');
    burgerItem.addEventListener('click', () => {
        menu.classList.add('header_nav_active');
    });
    menu_close.addEventListener('click', () => {
        menu.classList.remove('header_nav_active');
    });
}());

///// Form handler

(function () {
    const signup = document.getElementById('signup_active');
    const signup_cls = document.getElementById('signup_close');
    const f_sign = document.querySelector('.signup');
    var header = document.querySelector('.header_nav');

    const login = document.getElementById('login_active');
    const login_cls = document.getElementById('login_close');
    const f_login = document.querySelector('.login');

    signup.addEventListener('click', () => {
        f_sign.style.display = 'block';
        header.classList.remove('header_nav_active');
    });

    signup_cls.addEventListener('click', () => {
        f_sign.style.display = 'none';
    });

    login.addEventListener('click', () => {
        f_login.style.display = 'block';
        header.classList.remove('header_nav_active');
    });
    
    login_cls.addEventListener('click', () => {
        f_login.style.display = 'none';
    });
}());

///// Slider
showSlides(window.slideIndex);

var timer;

autoSlider();
function autoSlider() {
    timer = setTimeout(plusSlides, 4000);
}

// Next/previous controls
function plusSlides() {
    showSlides(window.slideIndex += 1);
    clearTimeout(timer);
    autoSlider();
}

// Thumbnail image controls
function currentSlide() {
    showSlides(window.slideIndex = 1);
}

function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    if (n > slides.length) {window.slideIndex = 1}
    if (n < 1) {window.slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[window.slideIndex-1].style.display = "block";
    dots[window.slideIndex-1].className += " active";
}