@extends('welcome')
@section('title')
    venue login
@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset('manual_css/form.css') }}">
@endpush
@section('content')
    @include('components.toast')
    <div class="container form-container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                @include('vendor.header')
                <div class="card form-card">
                    <div class="card-header form-header">
                        Venue providers Login
                    </div>
                    <div class="card-body form-body">
                       @include('components.login_form',[
                        'action'=>'venue.login',
                        'register'=>'/vendor/venue_register_form',
                        'forgot'=>'/password_resend/1'
                       ])
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="{{ asset('manual_js/customer/customer_login.js') }}" defer></script>
    @endpush
@endsection
