@extends('welcome')
@section('title', 'dashboard')

@section('content')
    <div class="dashboard-wrap">
        @include('components.toast')
        @include('customer.sidebar')


        <main class="main-content container">
            <div class="row">
                <div class="col-12 col-md-8 col-lg-6">
                    <div class="profile-card p-3 p-md-4 border rounded bg-white">
                        <div class="row align-items-center g-5">
                            <div class="col-auto">
                                <i class="bi bi-person-circle" style="font-size:100px;"></i>
                            </div>
                            <div class="col">
                                <h5 class="mb-1">Name</h5>
                                <p class="mb-0">{{ Auth::user()->name }}</p>
                                <p class="mb-0">{{ Auth::user()->phone }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <div class="row">
        <div class="col-12 col-md-8 col-lg-6">
            <h3 class="mt-4 mb-4 title-with-underline">YOUR LIKED VENUES</h3>
            @include('customer.card')
        </div>
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
