{{-- Single source of truth: one offcanvas that turns into a static sidebar on desktop --}}
<div class="offcanvas offcanvas-start responsive-sidebar" tabindex="-1" id="sidebar" aria-labelledby="sidebarLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="sidebarLabel">Filter</h5>
        <button type="button" class="btn-close d-md-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <div class="offcanvas-body">
        <div class="filter-form">
            <div class="filter-form-header">
                <a href=""><span>Reset all</span></a>
            </div>

            {{-- Categories --}}
            <div class="filter-form-category mt-2">
                @include('eventscape.category')
            </div>

            {{-- The ONLY form used on both mobile & desktop --}}
            <div class="form mt-3">
                @include('eventscape.service_providers.form') {{-- points to resources/views/eventscape/form.blade.php --}}
            </div>
        </div>
    </div>
</div>

@push('styles')
<link rel="stylesheet" href="{{ asset('manual_css/eventscape_checkbox.css') }}">
<style>
    /* Mobile: behaves like normal offcanvas (Bootstrap default) */

    /* Desktop (≥ md): make the offcanvas a static sidebar */
    @media (min-width: 768px) {
        .responsive-sidebar.offcanvas {
            position: static;              /* take it out of overlay flow */
            transform: none !important;    /* no slide-in transform */
            visibility: visible !important;
            background: transparent;       /* match page bg */
            border: 0;
            width: 100%;                   /* let parent layout control width */
            box-shadow: none;
        }
        .responsive-sidebar .offcanvas-header .btn-close {
            display: none;                 /* no close button on desktop */
        }
        /* Optional: If a backdrop ever gets injected, hide it on desktop */
        .offcanvas-backdrop {
            display: none !important;
        }
    }
</style>
@endpush
