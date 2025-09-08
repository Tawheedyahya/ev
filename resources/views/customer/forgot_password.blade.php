@extends('welcome')

@section('title')
    Forgot password
@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset('manual_css/form.css') }}">
@endpush
@section('content')
    @include('components.toast')
    <div class="container form-container">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card form-card">
                    <div class="card-header form-header">
                        Forgot password
                    </div>

                    <div class="card-body form-body">
                        <form action="{{route('customer.password_resend')}}" method="POST">
                            @csrf
                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Enter email" value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="return-error" id="email-error">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Submit -->
                            <div class="mt-3 form-end">
                                <button type="submit" class="btn form-submit-btn">
                                    Send resend link
                                </button>
                                <a href="{{ url()->previous() }}"><i class="bi bi-arrow-left"></i>back</a>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
