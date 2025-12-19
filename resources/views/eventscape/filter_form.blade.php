<div class="offcanvas offcanvas-end" tabindex="-1" id="sidebar">
    <div class="offcanvas-header border-bottom">
        <h6 class="fw-bold text-uppercase">Filter Venues</h6>
        <button class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>

    <div class="offcanvas-body">

        <label class="text-muted text-uppercase small fw-bold mb-2 d-block">
            Category
        </label>
        @include('eventscape.category')

        <div class="mt-4">
            <label class="text-muted text-uppercase small fw-bold mb-2 d-block">
                Price & Location
            </label>
            @include('eventscape.form')
        </div>

    </div>

    <!-- <div class="border-top p-3">
        <button class="btn btn-dark w-100 fw-bold">
            Apply Filters
        </button>
    </div> -->
</div>
