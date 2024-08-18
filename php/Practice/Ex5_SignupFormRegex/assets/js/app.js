let input = document.querySelectorAll("input");

input.forEach((value) => {
    if (!value.hasAttribute('id')) {
        if (value.value !== "")
            value.parentElement.firstElementChild.classList.add("active");

        value.addEventListener("focus", () => {
            value.parentElement.firstElementChild.classList.add("active");
            value.parentElement.style.border = "2px solid rgba(0, 0, 0, 0.5)";
            value.parentElement.style.boxShadow = "0 0 10px 2px rgba(255, 255, 255, 0.5)";
        });

        value.addEventListener("blur", () => {
            if (value.value === "") {
                value.parentElement.firstElementChild.classList.remove("active");
                value.parentElement.style.border = "2px solid transparent";
                value.parentElement.style.boxShadow = "0 0 0 1px rgba(0, 0, 0, 0.3)";
            }
            else {
                value.parentElement.style.border = "2px solid transparent";
                value.parentElement.style.boxShadow = "0 0 0 1px rgba(0, 0, 0, 0.3)";
            }
        });
    }
    else {
        value.addEventListener("change", () => {
            if (value.checked) {
                value.parentElement.lastElementChild.style.marginLeft = "0.7em";
                value.parentElement.lastElementChild.style.color = "rgba(190, 148, 249, 0.3)";
                value.parentElement.lastElementChild.style.textShadow = "0 0 1px rgba(190, 148, 249, 0.5), 0 0 2px rgba(190, 148, 249), 0 0 3px #000, 0 0 4px #000, 0 0 4px #000, 0 0 4px #000";
            }
            else {
                value.parentElement.lastElementChild.style.marginLeft = "0.2em";
                value.parentElement.lastElementChild.style.color = "rgba(0, 0, 0, 0.7)";
                value.parentElement.lastElementChild.style.textShadow = "0 0 3px #fff";
            }
        });
    }
});