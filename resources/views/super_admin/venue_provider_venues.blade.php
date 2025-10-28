@extends('super_admin.app')
@section('title', 'admin')
@section('content')
<div class="container">
    <div class="row">

    @foreach($venues as $venue)
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm border-0">

                @if(!empty($venue['image']))
                    <img src="{{ asset(''.$venue['image']) }}"
                         class="card-img-top"
                         alt="{{ $venue['venue_name'] }}"
                         style="height:200px; object-fit:cover;">
                @endif

                <div class="card-body">
                    <h5 class="card-title text-primary mb-2">
                        {{ $venue['venue_name'] }}
                    </h5>

                    <p class="mb-1">
                        <strong>Address:</strong> {{ $venue['venue_address'] }}
                    </p>

                    <p class="mb-1">
                        <strong>City:</strong> {{ $venue['venue_city'] }}
                    </p>

                    <p class="text-muted mb-2" style="font-size: 0.9rem;">
                        {{ Str::limit($venue['description'], 120) }}
                    </p>

                    <p class="fw-bold text-success">
                        ₹ {{ number_format($venue['amount'], 2) }}
                    </p>

                    @if(!empty($venue['vr']))
                        <a href="{{ $venue['vr'] }}"
                           class="btn btn-sm btn-outline-primary"
                           target="_blank">
                            View VR Tour
                        </a>
                    @endif
                </div>
            </div>
        </div>
    @endforeach

    </div>
</div>
@endsection
