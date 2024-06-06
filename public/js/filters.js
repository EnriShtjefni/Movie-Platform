document.addEventListener('DOMContentLoaded', function() {
    const filterButton = document.querySelector('.filter-toggle-btn');
    const filterContainer = document.querySelector('#filter-options-container');

    filterButton.addEventListener('click', function() {
        if (filterContainer.style.display === 'block') {
            filterContainer.style.display = 'none';
            filterButton.innerHTML = '▼ SHOW FILTERS';
        } else {
            filterContainer.style.display = 'block';
            filterButton.innerHTML = '▲ HIDE FILTERS';
        }
    });
});
