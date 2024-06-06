document.addEventListener("DOMContentLoaded", function() {
    const actionsButton = document.querySelector(".actions-button");
    const addCreateButtons = document.querySelectorAll(".add-create-button");

    actionsButton.addEventListener("click", function() {
        addCreateButtons.forEach(button => {
            button.classList.toggle("show");
        });
    });
});
