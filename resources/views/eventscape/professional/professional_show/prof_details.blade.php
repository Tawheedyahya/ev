<!-- Displaying Professional Details -->
<div class="container py-4">
    <h1>Name: {{ $professional->name }}</h1>
    <h2>Company: {{ $professional->company_name }}</h2>
    <img src="{{ asset($professional->prof_logo ?? 'default.jpg') }}" alt="{{ $professional->name }} logo"
        class="img-fluid rounded-circle mx-auto d-block mb-3" style="width: 120px; height: 120px; object-fit: cover;">
    <h3>Experience: {{ $professional->experience }} years</h3>
    <h3>Price per hour: RM {{ $professional->price }}</h3>

    <!-- Book Event Button -->
    <a class="btn btn-warning" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Book Event</a>
</div>

@extends('components.modal')

@section('modal_title', 'Date & Time for booking')

@section('modal_body')
    @php
        $route = Request::segment(4);
    @endphp
    <form action="{{ route('prof.book', $route) }}" method="POST" class="p-3 border rounded-3 shadow-sm bg-light">
        @csrf
        <div class="mb-3">
            <label for="s" class="form-label fw-semibold text-primary">Start Date & Time</label>
            <input type="text" name="order_date" id="s" class="form-control border-primary shadow-sm s"
                placeholder="Select start" required style="height:45px; border-radius:10px;">
        </div>

        <div class="mb-3">
            <label for="e" class="form-label fw-semibold text-primary">End Date & Time</label>
            <input type="text" name="upto_date" id="e" class="form-control border-primary shadow-sm e"
                placeholder="Select end" required style="height:45px; border-radius:10px;">
        </div>

        <div class="d-grid mt-4">
            <button type="submit" class="btn btn-success fw-semibold py-2" style="border-radius:10px; font-size:16px;">
                <i class="bi bi-check-circle me-1"></i> Submit Booking
            </button>
        </div>
    </form>


    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/material_blue.css">
    <script src="{{ asset('manual_js/flatpicker.js') }}" defer></script>
@endsection
