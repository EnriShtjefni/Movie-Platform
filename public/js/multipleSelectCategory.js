document.addEventListener("DOMContentLoaded", function() {
    const categoryElement = $('#category-element');

    categoryElement.select2({
        placeholder: "-",
        allowClear: true,
        closeOnSelect: false,
        templateResult: formatState,
        dropdownCssClass: 'select2-dropdown-custom'
    });

    categoryElement.on('select2:select', function (e) {
        updateOptionIcon(e.params.data.id, true);
    });

    categoryElement.on('select2:unselect', function (e) {
        updateOptionIcon(e.params.data.id, false);
    });

    function formatState(state) {
        return $(
            '<span>' + state.text + '<span class="select2-icon" data-id="' + state.id + '">' + (state.selected ? '-' : '+') + '</span></span>'
        );
    }

    function updateOptionIcon(id, isSelected) {
        $('.select2-dropdown-custom .select2-results__option[id$="' + id + '"] .select2-icon').text(isSelected ? '-' : '+');
    }
});
