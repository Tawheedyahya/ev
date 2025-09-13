   <div class="container search-bar">
        <div class="custom-search-bar d-flex align-items-center shadow-lg overflow-hidden">
            {{-- Location Button --}}
            <button type="button" class="btn btn-warning d-flex align-items-center px-4 py-3 border-0 custom-left-btn"
                id="locationplace" aria-label="Use my location">
                <i class="bi bi-geo-alt-fill me-2"></i>
            </button>

            {{-- Search Input --}}
            <input type="text" class="form-control border-0 px-3 py-3 flex-fill custom-input" placeholder="Search..."
                name="location" id="location" aria-label="Search">

            {{-- Search Button --}}
            <button type="submit" class="btn btn-warning d-flex align-items-center px-4 py-3 border-0 custom-right-btn"
                id="search">
                <i class="bi bi-search me-2"></i>
                Search
            </button>
        </div>
    </div>
