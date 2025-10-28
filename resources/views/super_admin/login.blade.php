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
                {{-- @include('vendor.header') --}}
                <div class="card form-card">
                    <div class="card-header form-header">
                        admin login
                    </div>
                    <div class="card-body form-body">
                       @include('components.login_form',[
                        'action'=>'admin.login',
                        'register'=>'#',
                        'forgot'=>'#'
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
