@extends('welcome')
@section('title', 'eventscappe dashboard')
@push('styles')
    <link rel="stylesheet" href="{{ asset('manual_css/text.css') }}">
      <style>
        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba%28255,255,255,1%29' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
        }

        @media(min-width:770px) {
            .venue-full {
                display: flex;
                align-items: flex-start;
            }

            /* Sidebar (Filter) */
            .filter {
                position: sticky;
                /* stick in viewport */
                top: 80px;
                /* adjust for navbar height */
                height: calc(100vh - 100px);
                overflow-y: auto;
                /* scroll inside filter if it’s tall */
                border-right: 1px solid #eee;
            }

            /* Content (Venue Show) */
            .venue_show {
                flex: 1;
                /* take remaining width */
                height: calc(100vh - 100px);
                overflow-y: auto;
                /* this part scrolls */
                padding-left: 20px;
            }
        }
    </style>
    <link rel="stylesheet" href="{{ asset('manual_css/navigatore.css') }}">
@endpush
@section('content')

    @include('components.navigator', [
        'action' => 'ser.location',
    ])
    <div class="container-fluid " style="margin-top: 50px;">
        <!-- Sidebar Toggle (Hamburger Button) -->
        <!-- Sidebar Toggle Button (mobile only) -->
        <button class="btn btn-primary m-3 d-md-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar"
            aria-controls="sidebar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="venue-full row">
            <div class="filter col-md-4 col-lg-4">
                @include('eventscape.service_providers.filter_form')
            </div>
            <div class="venue_show  col-sm-12">
                <div class="venue-show">
                    @include('eventscape.service_providers.prof_show')
                </div>
            </div>
        </div>
    </div>

@endsection
@push('scripts')
    <script src="{{ asset('manual_js/navigator.js') }}" defer></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js" async></script>
@endpush
@if (request()->routeIs('serpro.dashboard'))
    <style>
        a {
            text-decoration: none;
            color: black;
        }
    </style>
@endif
<style>
    .venues-wrap {
        display: flex;
        /* grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); */
        /* gap: 16px;
   */
        flex-direction: column;
    }

    .venue-card {
        display: flex;
        gap: 16px;
        border: 1px solid #eee;
        border-radius: 12px;
        background: #fff;
        padding: 12px;
    }

    .venue-img .v-img {
        width: 250px;
        height: 183px;
        border-radius: 8px;
        object-fit: cover;
    }

    .venue-body {
        flex: 1;
    }

    /* Mobile */
    @media (max-width: 768px) {
        .venue-card {
            flex-direction: column;
            /* stack image above text on small screens */
            gap: 12px;
        }

        .venue-img .v-img {
            width: 100%;
            height: 180px;
        }
    }
</style>
