<!-- Offcanvas (visible on mobile; becomes static sidebar on desktop) -->
<div class="offcanvas offcanvas-start responsive-sidebar" tabindex="-1" id="sidebar" aria-labelledby="sidebarLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="sidebarLabel">Sort & Choose</h5>
        <button type="button" class="btn-close d-md-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <div class="offcanvas-body">
        <div class="filter-form">
            <div class="filter-form-header">
                <div>
                    <a href=""><span>Reset all</span></a>
                </div>
            </div>

            <div class="filter-form-category">
                @include('eventscape.category')
            </div>

            {{-- The ONLY form used for both mobile & desktop --}}
            <div class="form mt-3">
                @include('eventscape.form')
            </div>
        </div>
    </div>
</div>



@push('styles')
<link rel="stylesheet" href="{{ asset('manual_css/eventscape_checkbox.css') }}">
<style>

@media (min-width: 768px) {
    .responsive-sidebar.offcanvas {
        position: static;               /* take it out of overlay */
        transform: none !important;     /* no slide-in */
        visibility: visible !important; /* always visible */
        background: transparent;        /* blend with page */
        border: 0;
        width: 100%;
        box-shadow: none;
    }
    .responsive-sidebar .offcanvas-header .btn-close {
        display: none;                  /* no close button on desktop */
    }
    /* If Bootstrap injects a backdrop, hide it on desktop */
    .offcanvas-backdrop {
        display: none !important;
    }
}
</style>
@endpush
