<div class="rounded-square">
    <div class="filter-container">
        <p class="filter-text">FILTER BY</p>
        <button type="button" class="filter-toggle-btn">▼ SHOW FILTERS</button>
        <div id="filter-options-container" class="dropdown-menu">
            <form class="filter-form" method="GET" action="{{ route('movies.index') }}">
                <div id="search-filter" class="filter-option">
                    <label for="search-element">Search</label>
                    <input id="search-element" class="form-search" type="search" placeholder="🔍..." name="search"
                           value="{{ request('search') }}" aria-label="Search">
                </div>
                <div id="company-filter" class="filter-option">
                    <label for="company-element">Select Company</label>
                    <select id="company-element" name="company_id" class="form-search">
                        <option value="">-</option>
                        @foreach($companies as $company)
                            <option
                                value="{{ $company->id }}" {{ request('company_id') == $company->id ? 'selected' : '' }}>
                                {{ $company->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div id="category-filter" class="filter-option">
                    <label for="category-element">Select Category</label>
                    <select id="category-element" name="categories[]" class="form-search" multiple>
                        @foreach($categories as $category)
                            <option
                                value="{{ $category->id }}" {{in_array($category->id, request('categories', [])) ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div id="order-filter" class="filter-option">
                    <label for="order-element">Order By</label>
                    <select id="order-element" name="order" class="form-search">
                        <option value="">-</option>
                        <option value="newest" {{ request('order') == 'newest' ? 'selected' : '' }}>Newest</option>
                        <option value="oldest" {{ request('order') == 'oldest' ? 'selected' : '' }}>Oldest</option>
                    </select>
                </div>
                <div class="submit-button-wrapper">
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="{{ asset('js/filters.js') }}"></script>
<script src="{{ asset('js/filterSubmit.js') }}"></script>
<script src="{{ asset('js/multipleSelectCategory.js') }}"></script>
