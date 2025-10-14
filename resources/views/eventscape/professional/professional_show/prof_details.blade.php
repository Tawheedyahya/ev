<!-- Displaying Professional Details -->
<div class="container py-5" style="max-width: 800px;">
    <div class="card shadow-lg border-0 rounded-4 p-4">
        <div class="text-center mb-4">
            <img src="{{ asset($professional->prof_logo ?? 'default.jpg') }}"
                 alt="{{ $professional->name }} logo"
                 class="rounded-circle shadow-sm mb-3"
                 style="width: 150px; height: 150px; object-fit: cover;">
            <h1 class="fw-bold text-dark mb-2">{{ ucfirst($professional->name) }}</h1>
            <h4 class="text-muted">Company: {{ ucfirst($professional->company_name) }}</h4>
        </div>

        <div class="border-top pt-3">
            <p class="fs-5 mb-1"><strong>Experience:</strong> {{ $professional->experience }} years</p>
            <p class="fs-5 mb-3"><strong>Price per hour:</strong> <span class="text-success fw-bold">RM {{ $professional->price }}</span></p>

            <!-- Book Event Button -->
            <div class="text-center mt-4">
                <a class="btn btn-warning btn-lg rounded-pill shadow-sm px-4" 
                   href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="bi bi-calendar-check"></i> Book Event
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Modal Section -->
@extends('components.modal')

@section('modal_title','Select Date & Time')

@section('modal_body')
<form action="">
    <label class="form-label fw-semibold">Start Time</label>
    <input type="text" name="start" id="s" placeholder="Select start" class="form-control mb-3">

    <label class="form-label fw-semibold">End Time</label>
    <input type="text" name="end" id="e" placeholder="Select end" class="form-control mb-4">

    <div class="text-end">
        <button class="btn btn-success px-4 rounded-pill">Submit</button>
    </div>
</form>

<script>
const modalEl = document.getElementById('exampleModal');
modalEl.addEventListener('shown.bs.modal', function () {
    // Start picker
    const startPicker = flatpickr('#s', {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
        altInput: true,
        altFormat: "F j, Y (h:i K)",
        minuteIncrement: 5,
        minDate: "today",
        allowInput: true,
        disableMobile: true,
        onChange(selectedDates) {
            if (selectedDates[0] && endPicker) endPicker.set('minDate', selectedDates[0]);
        }
    });

    // End picker
    const endPicker = flatpickr('#e', {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
        altInput: true,
        altFormat: "F j, Y (h:i K)",
        minuteIncrement: 5,
        minDate: "today",
        allowInput: true,
        disableMobile: true,
        onOpen() {
            const startDate = startPicker.selectedDates[0];
            if (startDate) this.set('minDate', startDate);
        }
    });
});
</script>
@endsection

<!-- Flatpickr Styles -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/material_blue.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
