//! ========== Keyframes categories bound ==========

let categories = document.querySelectorAll(".product-list");

if (categories) {
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
}

//! ========== Sticky ==========

let header = document.querySelector('header');
let nav = document.querySelector('#main-nav');
let navOffsetY = nav.offsetHeight + header.offsetHeight;

window.addEventListener('scroll', () => {
    if (window.scrollY >= navOffsetY)
        nav.classList.add('sticky');
    else
        nav.classList.remove('sticky');
});

//! ========== Show Search Input ==========

let searchBtn = document.querySelector('#search-icon');
let searchInput = document.querySelector('form.search');
let line = document.querySelector('#search-icon>.line');

let clicked = 0;
searchBtn.addEventListener('click', () => {
    if (!clicked) {
        clicked = 1;

        line.style.left = `-0.5em`;
        line.style.opacity = `1`;
        setTimeout(() => {
            searchInput.style.transform = `translateX(0)`;
        }, 550);
    }
    else {
        clicked = 0;

        searchInput.style.transform = `translateX(110%)`;

        setTimeout(() => {
            line.style.left = `0`;
            line.style.opacity = `0`;
        }, 550)
    }
});

//! ========== Show Product Scroll ==========

let hiddenLeft = document.querySelectorAll('.hidden-left');
let hiddenRight = document.querySelectorAll('.hidden-right');
let hiddenBot = document.querySelectorAll('.hidden-bot');
let hiddenTop = document.querySelectorAll('.hidden-top');
let activeHeight = window.innerHeight / 5 * 4.95;

window.addEventListener('load', () => {
    if (hiddenLeft) {
        hiddenLeft.forEach((value) => {
            if (value.getBoundingClientRect().top < activeHeight) {
                value.classList.add('show-left');
            }
        });
    }

    if (hiddenRight) {
        hiddenRight.forEach((value) => {
            if (value.getBoundingClientRect().top < activeHeight) {
                value.classList.add('show-right');
            }
        });
    }

    if (hiddenBot) {
        hiddenBot.forEach((value) => {
            if (value.getBoundingClientRect().top < activeHeight) {
                value.classList.add('show-bot');
            }
        });
    }

    if (hiddenTop) {
        hiddenTop.forEach((value) => {
            if (value.getBoundingClientRect().top < activeHeight) {
                value.classList.add('show-top');
            }
        });
    }
});

window.addEventListener('scroll', () => {
    if (hiddenLeft) {
        hiddenLeft.forEach((value) => {
            if (value.getBoundingClientRect().top < activeHeight) {
                value.classList.add('show-left');
            }
        });
    }

    if (hiddenRight) {
        hiddenRight.forEach((value) => {
            if (value.getBoundingClientRect().top < activeHeight) {
                value.classList.add('show-right');
            }
        });
    }

    if (hiddenBot) {
        hiddenBot.forEach((value) => {
            if (value.getBoundingClientRect().top < activeHeight) {
                value.classList.add('show-bot');
            }
        });
    }

    if (hiddenTop) {
        hiddenTop.forEach((value) => {
            if (value.getBoundingClientRect().top < activeHeight) {
                value.classList.add('show-top');
            }
        });
    }
});

//! ========== Scroll to Top ==========

let scrollBtn = document.querySelector('.scroll-on-top');

window.addEventListener('scroll', () => {
    if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300)
        scrollBtn.style.display = "flex";
    else
        scrollBtn.style.display = "none";
});

scrollBtn.addEventListener('click', () => {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
});

//! ========== Close Alert ==========

let alert = document.querySelectorAll('.alert');

if (alert) {
    alert.forEach((value) => {
        value.style.animation = `show-alert 5.5s cubic-bezier(0.68, -0.6, 0.32, 1.6)`;

        let exit = value.querySelector('.exit');

        exit.addEventListener('click', () => {
            value.style.animation = `close-alert 0.5s cubic-bezier(0.32, -0.22, 0.24, -0.18)`;
        });
    });
}