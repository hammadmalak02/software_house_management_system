// Toggle Mobile Menu 
const burger = document.querySelector('.burger');
const nav = document.querySelector('.nav-links');

burger.addEventListener('click', () => {
    nav.classList.toggle('nav-active');

    // Burger Animation
    burger.classList.toggle('toggle');
});
