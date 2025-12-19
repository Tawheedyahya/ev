@extends('welcome')
@section('title','Eventscape – Service Providers')

@push('styles')
<link rel="stylesheet" href="{{ asset('manual_css/text.css') }}">
<link rel="stylesheet" href="{{ asset('manual_css/navigatore.css') }}">
<link rel="stylesheet" href="{{ asset('manual_css/eventscape_checkbox.css') }}">

<style>
/* =============================== */
/* DASHBOARD TABS – SERVICE PAGE   */
/* =============================== */

.dashboard-tabs{
    display:flex;
    gap:10px;
    align-items:center;
    flex-wrap:wrap;
}

/* Tab buttons */
.dashboard-tabs .tab-btn{
    padding:10px 18px;
    border-radius:999px;
    border:1px solid #e5e5e5;
    background:#fff;
    color:#111;
    font-weight:600;
    font-size:0.95rem;
    text-decoration:none;
    display:inline-flex;
    align-items:center;
    justify-content:center;
    transition:all .2s ease;
}

/* Hover */
.dashboard-tabs .tab-btn:hover{
    background:#f8f8f8;
    transform:translateY(-1px);
}

/* Active (RED) */
.dashboard-tabs .tab-btn.active{
    background:#ef5350;
    border-color:#ef5350;
    color:#fff;
    box-shadow:0 6px 16px rgba(239,83,80,.35);
}

/* Filter button */
.dashboard-tabs .filter-btn{
    margin-left:auto;
    padding:10px 18px;
    border-radius:12px;
    border:1px solid #e5e5e5;
    background:#fff;
    color:#111;
    font-weight:600;
    font-size:0.95rem;
    display:inline-flex;
    align-items:center;
    gap:8px;
    transition:all .2s ease;
}

/* Filter hover */
.dashboard-tabs .filter-btn:hover{
    background:#f8f8f8;
    transform:translateY(-1px);
}

/* Mobile tweaks */
@media(max-width:768px){
    .dashboard-tabs{
        gap:8px;
    }
    .dashboard-tabs .tab-btn,
    .dashboard-tabs .filter-btn{
        padding:9px 14px;
        font-size:.9rem;
    }
}
</style>
@endpush

@section('content')

@include('components.navigator',['action'=>'ser.location'])

<div class="container-fluid mt-4">

    {{-- ACTION BUTTONS --}}
    <div class="dashboard-tabs mb-4">

        <a href="{{ route('eventspace.dashboard') }}"
           class="tab-btn">
            Venues
        </a>

        <a href="{{ route('serpro.dashboard') }}"
           class="tab-btn active">
            Service Providers
        </a>

        <a href="{{ route('prof.dashboard') }}"
           class="tab-btn">
            Professionals
        </a>

        <button class="filter-btn"
                data-bs-toggle="offcanvas"
                data-bs-target="#sidebar">
            <i class="bi bi-funnel"></i>
            Filter
        </button>

    </div>

    {{-- RESULTS --}}
    @include('eventscape.service_providers.prof_show')

</div>

{{-- FILTER --}}
@include('eventscape.service_providers.filter_form')
    @push('scripts')
        <script src="{{ asset('manual_js/navigator.js') }}" defer></script>
    @endpush
@endsection
