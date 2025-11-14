@extends('welcome')
@section('title', 'dashboard')
<style>

</style>
@section('content')
    <div class="dashboard-wrap">
        @include('customer.sidebar')
        {{-- MAIN --}}
        <main class="main-content container-fluid profile-layout" style="background-color: #F7DBB7;">
            @include('components.toast')
            <div class="row">
                <div class="col-12 col-md-8 col-lg-8 col-xl-8 col-xxl-9 ">
                    <div class="profile-card p-5 p-md-4">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <span class="badge profile-badge">Profile</span>
                            {{-- <a href="#" class="profile-edit-link">Edit</a> --}}
                        </div>

                        <div class="row align-items-center g-4">
                            <div class="col-auto">
                                <div class="avatar-circle">
                                    <i class="bi bi-person-circle"></i>
                                </div>
                            </div>
                            <div class="col">
                                <h4 class="profile-name mb-1">Name</h4>
                                <p class="mb-0 profile-email">{{ Auth::user()->email }}</p>
                                <p class="mb-0 profile-phone">{{ Auth::user()->phone }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Event cart style wrapper for bookings --}}
            <section class="event-cart mt-4">
                <div class="align-items-center mb-2">
                    {{-- <h5 class="mb-0 event-cart-title" style="font-weight:1000;font-size:30px;">Event cart</h5> --}}
                    {{-- Category select under services or where you like --}}
                    {{-- <div class="category-select-wrap py-4">
                        <select id="redirection" class="form-select shadow-sm category-select">
                            <option value="">-- Choose Category --</option>
                            <option value="{{ url('/customer/login_form') }}">Venues</option>
                            <option value="{{ url('/customer/professional') }}">Professionals</option>
                        </select>
                    </div> --}}
                    {{-- your estimation etc. can go here later if needed --}}
                </div>

                <div class="row">
                        <div class="row">
        <div class="col-12 col-md-8 col-lg-6">
            <h3 class="mt-4 mb-4 title-with-underline">YOUR LIKED VENUES</h3>

            <div class="row row-cols-1 row-cols-md-3 g-4">
                @forelse($likedprofessionals as $venue)
                    <div class="col d-flex">
                        <div class="card shadow-sm w-100 d-flex flex-column h-100">
                            <a href="{{ route('card.venue', $venue) }}" class="text-decoration-none text-dark">
                                @if ($venue['prof_logo'])
                                    <img src="{{ asset($venue['prof_logo']) }}" class="card-img-top"
                                        alt="{{ $venue['name'] }}">
                                @else
                                    <img src="{{ asset('images/no-image.png') }}" class="card-img-top"
                                        alt="No image available">
                                @endif

                                <div class="card-body flex-grow-1">
                                    <h5 class="card-title">{{ $venue['companyname'] }}</h5>
                                    <p class="card-text text-muted mb-1"><strong>City:</strong> {{ $venue['address'] }}
                                    </p>
                                    <p class="card-text">{{ $venue['experience'] ?? 'No description available.' }}</p>
                                </div>
                            </a>

                            <div class="card-footer text-center mt-auto bg-white border-0 pb-3">
                                <button class="heartt btn btn-outline-danger btn-sm" data-id="{{ $venue['id'] }}">👎
                                    Unlike</button>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-info text-center">
                            No professionals found.
                        </div>
                    </div>
                @endforelse
            </div>




        </div>
    </div>
                </div>
            </section>
        </main>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('manual_css/profile.css') }}">
@endpush

@push('scripts')
    <script>
        function toggleSidebar() {
            document.getElementById("sidebar").classList.toggle("show");
        }
        $(document).ready(function() {
            $('#redirection').change(function() {
                const url = $(this).val()
                if (url) {
                    window.location.href = url;
                }
            })
        })
    </script>
@endpush
