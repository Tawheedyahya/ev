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
                </div>

                <div class="row">
                    <div class="col-12 col-md-8 col-lg-6">
                        <h3 class="mt-4 mb-4 title-with-underline">YOUR LIKED VENUES</h3>
                        @include('customer.card')
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
