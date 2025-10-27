@extends('welcome')

@section('title', 'Service Provider')

@section('content')
<div class="container py-4">

    {{-- Breadcrumb / Header --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h4 mb-0">
            Service Provider
            @if(($provider['status'] ?? null) === 'approved')
                <span class="badge bg-success ms-2">Approved</span>
            @endif
        </h1>
        <a href="{{ url()->previous() }}" class="btn btn-outline-secondary btn-sm">Back</a>
    </div>

    <div class="row g-4">

        {{-- Left: Provider Card --}}
        <div class="col-lg-8">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <div class="d-flex align-items-start gap-3">

                        {{-- Logo --}}
                        <div class="flex-shrink-0">
                            @php
                                $logo = $provider['logo'] ?? null;
                            @endphp
                            <img
                                src="{{ $logo ? asset($logo) : asset('images/no-logo.png') }}"
                                alt="Logo"
                                class="rounded"
                                style="width:100px;height:100px;object-fit:cover;"
                            >
                        </div>

                        {{-- Basic Info --}}
                        <div class="flex-grow-1">
                            <h2 class="h5 mb-1">{{ $provider['name'] ?? '-' }}</h2>
                            <div class="text-muted small mb-2">
                                {{ $provider['companyname'] ?? '-' }}
                            </div>

                            <div class="row g-2 small">
                                <div class="col-md-6">
                                    <strong>City:</strong> {{ $provider['city'] ?? '-' }}
                                </div>
                                <div class="col-md-6">
                                    <strong>Category:</strong>
                                    {{ $category['name'] ?? '-' }}
                                </div>
                                <div class="col-md-6">
                                    <strong>Phone:</strong> {{ $provider['phone'] ?? '-' }}
                                </div>
                                <div class="col-md-6">
                                    <strong>Email:</strong> {{ $provider['email'] ?? '-' }}
                                </div>
                            </div>

                            {{-- Socials --}}
                            <div class="mt-3 d-flex flex-wrap gap-2">
                                @if(!empty($provider['facebook']))
                                    <a href="{{ Str::startsWith($provider['facebook'], ['http://','https://']) ? $provider['facebook'] : 'https://'.$provider['facebook'] }}"
                                       target="_blank" rel="noopener"
                                       class="btn btn-sm btn-outline-primary">
                                        Facebook
                                    </a>
                                @endif
                                @if(!empty($provider['instagram']))
                                    <a href="{{ Str::startsWith($provider['instagram'], ['http://','https://']) ? $provider['instagram'] : 'https://'.$provider['instagram'] }}"
                                       target="_blank" rel="noopener"
                                       class="btn btn-sm btn-outline-danger">
                                        Instagram
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>

                    {{-- Places (chips) --}}
                    <div class="mt-4">
                        <h3 class="h6 mb-2">Service Places</h3>
                        @php
                            // $places is an array like: [ [id=>.., name=>.., pivot=>[...] ], ... ]
                        @endphp
                        @if(!empty($places) && is_iterable($places))
                            <div class="d-flex flex-wrap gap-2">
                                @foreach($places as $pl)
                                    <span class="badge bg-light text-dark border">
                                        {{ $pl['name'] ?? '-' }}
                                    </span>
                                @endforeach
                            </div>
                        @else
                            <div class="text-muted small">No places listed.</div>
                        @endif
                    </div>

                    {{-- Meta --}}
                    <div class="mt-4 small text-muted">
                        {{-- <div><strong>Email Verified At:</strong> {{ $provider['email_verified_at'] ?? '-' }}</div> --}}
                        {{-- <div><strong>Created:</strong> {{ $provider['created_at'] ?? '-' }}</div>
                        <div><strong>Updated:</strong> {{ $provider['updated_at'] ?? '-' }}</div> --}}
                    </div>
                </div>
            </div>
        </div>

        {{-- Right: Actions / Contact --}}
        <div class="col-lg-4">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h3 class="h6 mb-3">Quick Actions</h3>
                    {{-- @if(!empty($provider['email']))
                        <a href="mailto:{{ $provider['email'] }}" class="btn btn-warning w-100 mb-2">Email Provider</a>
                    @endif --}}
                    @if(!empty($provider['phone']))
                        <a href="https://wa.me/{{ preg_replace('/\D/','',$provider['phone']) }}"
                           target="_blank" rel="noopener"
                           class="btn btn-outline-success w-100">
                           WhatsApp
                        </a>
                    @endif
                </div>
            </div>
        </div>

    </div>
     <div class="blogs mt-5">
         @include('service_providers.f_card',[
        'form'=>false
    ])
     </div>
</div>
@endsection
