//! ========== Title Input ==========

let input = document.querySelectorAll(".input");

input.forEach((value) => {
    if (value.value !== "")
        value.previousElementSibling.classList.add("active");

    value.addEventListener("focus", () => {
        value.previousElementSibling.classList.add("active");
        value.parentElement.style.border = "2px solid rgba(0, 0, 0, 0.5)";
        value.parentElement.style.boxShadow = "0 0 10px 2px rgba(255, 255, 255)";
    });

    value.addEventListener("blur", () => {
        if (value.value === "")
            value.previousElementSibling.classList.remove("active");

        value.parentElement.style.border = "2px solid transparent";
        value.parentElement.style.boxShadow = "0 0 0 1px rgba(0, 0, 0, 0.3)";
    });
});

//! ========== Upload Post Image ==========

function updateFile(input) {
    let fileSpace = document.querySelector('.file-name');
    let fileName = input.files[0].name;
    fileSpace.textContent = fileName;
};

//! ========== Nav ==========

let form = document.querySelector('.form');
let listPost = document.querySelector('.posts-container');
let navButton = document.querySelectorAll("aside>nav>ul>li");

listPost.style.Height = "fit-content";
listPost.style.minHeight = "100vh";
listPost.style.padding = "2em";

navButton.forEach((value) => {
    value.addEventListener("click", () => {
        if (value.textContent === "New Post") {
            form.style.Height = "fit-content";
            form.style.minHeight = "90vh";
            form.style.padding = "2em 0";
            listPost.style.Height = "0";
            listPost.style.minHeight = "0";
            listPost.style.padding = "0";
        } else {
            listPost.style.Height = "fit-content";
            listPost.style.minHeight = "80vh";
            listPost.style.padding = "2em";
            form.style.Height = "0";
            form.style.minHeight = "0";
            form.style.padding = "0";
        }
    });
});