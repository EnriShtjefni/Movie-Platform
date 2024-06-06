document.addEventListener("DOMContentLoaded", function() {
    const titleContainer = document.querySelector(".title-right-container");

    const selectedTab = localStorage.getItem('selectedTab');

    if (selectedTab === 'dashboard') {
        titleContainer.textContent = "Dashboard";
    } else if (selectedTab === 'movies') {
        titleContainer.textContent = "Movies";
    }

    document.querySelectorAll('.dashboard-button, .movies-button').forEach(button => {
        button.addEventListener('click', function(event) {
            const tab = event.target.dataset.tab;
            localStorage.setItem('selectedTab', tab);
        });
    });
});
