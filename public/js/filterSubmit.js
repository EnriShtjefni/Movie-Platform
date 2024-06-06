document.addEventListener('DOMContentLoaded', function() {
    // const filterForm = document.querySelector('.filter-form');
    // const companyFilter = document.querySelector('select[name="company_id"]');
    // const categoryFilter = document.querySelector('select[name="categories[]"]');
    // const orderFilter = document.querySelector('select[name="order"]');
    const searchInput = document.querySelector('#search-element');

    if (searchInput) {
        searchInput.addEventListener('keydown', function(event) {
            if (event.key === 'Enter') {
                event.preventDefault();
            }
        });
    }

    // if (companyFilter) {
    //     companyFilter.addEventListener('change', function() {
    //         filterForm.submit();
    //     });
    // }
    //
    // if (categoryFilter) {
    //     $(categoryFilter).on('change', function() {
    //         filterForm.submit();
    //     });
    // }
    //
    // if (orderFilter) {
    //     orderFilter.addEventListener('change', function() {
    //         filterForm.submit();
    //     });
    // }
});
