@extends('welcome')
@section('title', 'dashboard')
<style>
    /* Page background & layout */
    body {
        background-color: #fbe3c3;
        /* warm beige like screenshot */
    }

    .dashboard-wrap {
        display: flex;
        min-height: 100vh;
    }

    /* SIDEBAR */
    .sidebar {
        width: 240px;
        background-color: #f3fbff;
        padding: 24px 18px;
        border-right: 1px solid #e3edf4;
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .sidebar a {
        display: block;
        padding: 10px 14px;
        border-radius: 999px;
        color: #333;
        text-decoration: none;
        font-weight: 500;
        font-size: 0.95rem;
    }

    .sidebar a.active {
        background-color: #00bcd4;
        color: #fff;
    }

    .sidebar a:hover {
        background-color: #e1f7fb;
    }

    .sidebar-toggle {
        border: none;
        background: #00bcd4;
        color:black;
        padding: 6px 10px;
        border-radius: 999px;
        margin-bottom: 10px;
    }

    /* MAIN CONTENT */
    /* .main-content.profile-layout {
        padding-top: 30px;
        padding-bottom: 40px;
    } */

    /* PROFILE CARD */
    .profile-card {
        background-color:white;
        border-radius: 22px;
        border: none;
        /* width: 100%; */
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.04);
    }

    .profile-badge {
        background-color: #e6f8ff;
        color: #007b8f;
        border-radius: 999px;
        font-weight: 600;
        padding: 4px 10px;
        font-size: 0.8rem;
    }

    .profile-edit-link {
        font-size: 0.9rem;
        color: #ff9800;
        font-weight: 600;
        text-decoration: none;
    }

    .profile-edit-link:hover {
        text-decoration: underline;
    }

    .avatar-circle {
        width: 90px;
        height: 90px;
        border-radius: 999px;
        overflow: hidden;
        background: #ffe0b2;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .avatar-circle i {
        font-size: 60px;
        color: #ff9800;
    }

    .profile-name {
        font-weight: 700;
        font-size: 1.2rem;
    }

    .profile-email,
    .profile-phone {
        font-size: 0.95rem;
        color: #444;
    }

    /* EVENT CART SECTION */
    .event-cart {
        margin-top: 28px;
        /* background-color: #fffaf0; */
        border-radius: 22px;
        padding: 20px 20px 10px;
        /* box-shadow: 0 10px 25px rgba(0, 0, 0, 0.04); */
    }

    .event-cart-title {
        font-weight: 700;
        font-size: 1.1rem;
    }

    /* BOOKINGS inside event cart */
    .orders {
        margin-top: 10px;
    }

    .orders h4 {
        font-weight: 700;
        margin-bottom: 12px;
    }

    /* Booking cards look like mini tiles */
    .orders .card {
        border-radius: 18px;
        border: none;
        overflow: hidden;
        box-shadow: 0 8px 18px rgba(0, 0, 0, 0.05);
    }

    .orders .card-img-top {
        border-radius: 18px 18px 0 0;
    }

    .orders .card-body h6 {
        font-weight: 700;
    }

    .orders .badge {
        border-radius: 999px;
        text-transform: capitalize;
    }

    /* Category select */
    .category-select-wrap {
        max-width: 320px;
    }

    .category-select {
        border-radius: 999px;
        border: 2px solid #ffc107;
        font-weight: 500;
        color: #333;
        background-color: #fffef7;
    }

    /* Flatpickr on top of modal */
    .flatpickr-calendar {
        z-index: 1060;
    }

    /* RESPONSIVE */
    @media (max-width: 991.98px) {
        .dashboard-wrap {
            flex-direction: column;
        }

        .sidebar {
            width: 100%;
            border-right: none;
            border-bottom: 1px solid #e3edf4;
        }

        /* .main-content.profile-layout {
            padding-top: 16px;
        } */
    }
</style>
@section('content')
    <div class="dashboard-wrap">
        @include('customer.sidebar')
        {{-- MAIN --}}
        <main class="main-content container-fluid profile-layout" style="background-color: #F7DBB7;">
            @include('components.toast')
            <div class="row mt-5">
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
                    <h5 class="mb-0 event-cart-title" style="font-weight:1000;font-size:30px;">Event cart</h5>
                    {{-- Category select under services or where you like --}}
                    <div class="category-select-wrap py-4">
                        <select id="redirection" class="form-select shadow-sm category-select">
                            <option value="">-- Choose Category --</option>
                            <option value="{{ url('/customer/login_form') }}">Venues</option>
                            <option value="{{ url('/customer/professional') }}">Professionals</option>
                        </select>
                    </div>
                    {{-- your estimation etc. can go here later if needed --}}
                </div>

                @include('customer.bookings')
            </section>
        </main>
    </div>
@endsection

@push('styles')
    {{-- <link rel="stylesheet" href="{{ asset('manual_css/profile.css') }}">    --}}
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
