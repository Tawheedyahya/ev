@extends('service_providers.service_app')

@section('title', 'Dashboard')
<link rel="stylesheet" href="{{asset('manual_css/ckeditor.css')}}">
@section('content')
    <div class="container-fluid">
        @include('venue_provider.layouts.header')
        <div class="card shadow-sm mt-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center justify-content-between gap-3">
                    <h4 class="mb-0">My Profile</h4>
                    <img src="{{ Auth::guard('ser')->user()->logo ? asset(Auth::guard('ser')->user()->logo) : asset('prof_logo/5.png') }}"
                        alt="Profile" class="rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
                </div>
                <a href="{{ route('ser.prof.edit') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-edit"></i> Edit
                </a>
            </div>

            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <strong>Name:</strong>
                        <p>{{ Auth::guard('ser')->user()->name }}</p>
                    </div>
                    <div class="col-md-6">
                        <strong>Company Name:</strong>
                        <p>{{ Auth::guard('ser')->user()->companyname }}</p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <strong>Phone:</strong>
                        <p>{{ Auth::guard('ser')->user()->phone ?? 'Not provided' }}</p>
                    </div>
                    <div class="col-md-6">
                        <strong>Email:</strong>
                        <p>{{ Auth::guard('ser')->user()->email }}</p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <strong>Instagram:</strong>
                        <p>
                            @if (Auth::guard('ser')->user()->instagram)
                                <a href="{{ Auth::guard('ser')->user()->instagram }}" target="_blank">
                                    {{ Auth::guard('ser')->user()->instagram }}
                                </a>
                            @else
                                Not linked
                            @endif
                        </p>
                    </div>
                    <div class="col-md-6">
                        <strong>Facebook:</strong>
                        <p>
                            @if (Auth::guard('ser')->user()->facebook)
                                <a href="{{ Auth::guard('ser')->user()->facebook }}" target="_blank">
                                    {{ Auth::guard('ser')->user()->facebook }}
                                </a>
                            @else
                                Not linked
                            @endif
                        </p>
                    </div>
                </div>
                @if(isset($info->about_us))
                <div class="row mb-3">
                    <strong>About us:</strong>{!! $info->about_us !!}
                </div>
                @endif
                @if(isset($info->long_description))
                <div class="row mb-3">

                    <div class="col-12 editor-output">
                        <strong>Description:</strong>
                        {!! $info->long_description !!}
                    </div>
                </div>
                @endif
        </div>
    </div>
    </div>
@endsection
