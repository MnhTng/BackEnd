//! ========== Interact with form ==========

let input = document.querySelectorAll(".input");

input.forEach((value) => {
    value.addEventListener("focus", () => {
        value.parentElement.firstElementChild.classList.add("active");
        value.parentElement.firstElementChild.style.textShadow = "0 0 1px #000, 0 0 1px #000, 0 0 2px #000, 0 0 2px #000";
        value.parentElement.firstElementChild.style.color = "#fff";
    });

    value.addEventListener("blur", () => {
        if (value.value === "") {
            value.parentElement.firstElementChild.classList.remove("active");
            value.parentElement.firstElementChild.style.textShadow = "0 0 1px #000, 0 0 1px #000, 0 0 2px #000, 0 0 2px #000";
            value.parentElement.firstElementChild.style.color = "#fff";
        }
    });
});

//! ========== Keyframes categories bound ==========

let categories = document.querySelectorAll(".product-list");

categories.forEach((value) => {
    value.addEventListener("mouseover", () => {
        if (value.previousElementSibling.nodeName == 'H2')
            value.previousElementSibling.classList.add("text-bound");
    });

    value.addEventListener("mouseout", () => {
        if (value.previousElementSibling.nodeName == 'H2')
            value.previousElementSibling.classList.remove("text-bound");
    });
});

//! ========== Sticky ==========

let nav = document.querySelector('nav');
let navOffsetY = nav.offsetTop;

window.addEventListener('scroll', () => {
    if(window.scrollY >= navOffsetY)
        nav.classList.add('sticky');
    else
        nav.classList.remove('sticky');
});