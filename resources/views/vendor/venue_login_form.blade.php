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
                        <form action="{{route('venue.login')}}" method="POST" id="login_form">
                            @csrf
                            {{-- Email --}}
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="email"
                                    placeholder="Enter your email" required>
                                @error('email')
                                    <div class="return-error">{{ $message }}</div>
                                @enderror
                            </div>
                            {{-- password --}}
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="Enter password">
                                @error('password')
                                    <div class="return-error"></div>
                                @enderror
                            </div>
                            <div class="mt-3 form-end">
                                <button type="submit" class="btn form-submit-btn mb-2">
                                    Login
                                </button>
                                <a href="{{url('/vendor/venue_register_form')}}">Register?</a>
                                <a href="#">Forgot password?</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="{{ asset('manual_js/customer/customer_login.js') }}" defer></script>
    @endpush
@endsection
