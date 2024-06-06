document.addEventListener("DOMContentLoaded", function() {
    const dropdownButton = document.getElementById("dropdownButton");

    dropdownButton.addEventListener("click", function() {
        this.classList.toggle("active");
    });
});
