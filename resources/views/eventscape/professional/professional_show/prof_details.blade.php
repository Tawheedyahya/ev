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
            <h4 class="text-muted">Profession: {{ ucfirst($p_c) }}</h4>
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
                <button id="prof_heart" class="heart" aria-label="Like" data-id="{{Auth::id()}}"></button><span class="heart_m"></span>
        </div>
    </div>
</div>

<!-- Modal Section -->
@extends('components.modal')

@section('modal_title','Select Date & Time')

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
    <script>
    const heartBtn = document.querySelector(".heart");
    const heart_msg=document.querySelector('.heart_m');
    const url=window.location.href
    const parts=url.split('/').filter(Boolean)
    const v_id=parts[parts.length-1]
    // console.log(v_id);
    heartBtn.addEventListener("click", async() => {
     heart_msg.textContent=''
    if(heartBtn.dataset.id=='' || heartBtn.dataset.id==null){
        heart_msg.textContent='Need to Login'
        return
    }
    heartBtn.classList.add("active");

    const origin=window.location.href+'/heart'
    console.log(origin);
    const response=await fetch(origin,{
        method:"POST",
        headers:{
            'Content-Type':'application/json'
        },
        body:JSON.stringify({
            professional_id:v_id,
            user_id:heartBtn.dataset.id,
            like:'yes'
        })
    })
    const data=await response.json();
    console.log(data)
});

    </script>

@endsection
