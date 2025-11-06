@extends('welcome')
@section('title')
home dashboard
@endsection
@push('styles')
    <link rel="stylesheet" href="{{asset('manual_css/text.css')}}">
@endpush
@section('content')
    {{-- Banner Section --}}
    <div class="position-relative text-center">
        <img src="{{ asset('ev_photos/home_page.png') }}" class="img-fluid w-100" alt="Banner"
            style="height: 614px; object-fit: cover;">

        <div class="position-absolute top-50 start-50 translate-middle text-white">
            <h1 class="fw-bold">YOUR ONE-STOP DESTINATION FOR EVENT PLANNING EXCELLENCE</h1>
            <p>Explore verified venues, trusted service providers, and skilled professionals all in one place</p>
        </div>
    </div>

        {{-- Search Section --}}
    <div class="container position-absolute translate-middle start-50 top-30 " style="height: 83px">
        <div class="custom-search-bar d-flex align-items-center shadow-lg rounded-pill overflow-hidden">


            <button class="btn btn-warning d-flex align-items-center px-4 py-3 border-0 rounded-0 rounded-start-pill "
                id="locationplace">
                <i class="bi bi-geo-alt-fill me-2 location-place"></i>
            </button>

            <input type="text" class="form-control border-0 px-3 py-3" placeholder="Search..." style="flex: 1;"
                name="location" id="location">


            <button class="btn btn-warning d-flex align-items-center px-4 py-3 border-0 rounded-0 rounded-end-pill"
                id="search">
                <i class="bi bi-search me-2"></i> SEARCH
            </button>

        </div>
    </div>
    <div class="occasions mt-5">
        <div class="occasion-heading mb-5">
              <h2>Most Viewed Occasions</h2>
        </div>
        <div class="occasions-body">
            @include('components.occasions')
        </div>
    </div>
    <div class="category">
        @include('home.category')
    </div>
    <div class="category-show">
        @include('home.category_show',['category'=>$venues])
    </div>
    <div class="work">
        @include('home.work')
    </div>
    <div class="testimonials">
        @include('home.testimonials')
    </div>
    @push('scripts')
    <script src="{{asset('manual_js/navigator.js')}}" defer></script>
    @endpush
@endsection
