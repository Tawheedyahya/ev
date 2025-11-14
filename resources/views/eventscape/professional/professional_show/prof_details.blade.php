{{-- PAGE STYLES JUST FOR THIS VIEW --}}
@push('styles')
<style>
    .professional-wrapper {
        max-width: 820px;
        margin: 0 auto;
    }

    .professional-card {
        border: 0;
        border-radius: 28px;
        overflow: hidden;
        box-shadow: 0 20px 60px rgba(0,0,0,.08);
        background: #ffffff;
    }

    .professional-header {
        padding: 32px 32px 24px;
        text-align: center;
    }

    .professional-header h1 {
        font-size: 2.1rem;
        margin-bottom: .3rem;
    }

    .professional-header h4 {
        font-size: 1.05rem;
        margin-bottom: .1rem;
    }

    .pro-avatar {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        object-fit: cover;
        box-shadow: 0 8px 24px rgba(0,0,0,.18);
        border: 4px solid #ffffff;
    }

    .professional-body {
        padding: 22px 32px 26px;
    }

    .professional-body p {
        font-size: 1.05rem;
        margin-bottom: .4rem;
    }

    .professional-body strong {
        font-weight: 600;
    }

    .price-text {
        font-size: 1.15rem;
        margin-top: .3rem;
    }

    .price-text span {
        color: #16a34a; /* green */
        font-weight: 700;
    }

    .actions-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-top: 22px;
        gap: 16px;
    }

    .book-btn {
        border-radius: 999px;
        padding: 10px 26px;
        font-weight: 600;
        font-size: 1rem;
        box-shadow: 0 8px 20px rgba(255,193,7,.45);
    }

    /* keep heart styling separate; just position it nicely */
    #prof_heart {
        margin: 0;
    }

    .heart_m {
        font-size: 0.9rem;
        color: #888;
        margin-left: 6px;
    }

    @media (max-width: 575.98px) {
        .professional-card {
            border-radius: 20px;
        }

        .professional-header,
        .professional-body {
            padding: 20px 20px 18px;
        }

        .pro-avatar {
            width: 120px;
            height: 120px;
        }

        .actions-row {
            flex-direction: column-reverse;
            align-items: stretch;
        }

        .actions-row .book-btn {
            width: 100%;
            justify-content: center;
        }
    }
</style>
@endpush

{{-- MAIN CONTENT --}}
<div class="container py-5 professional-wrapper">
    <div class="card professional-card">

        {{-- TOP SECTION --}}
        <div class="professional-header">
            <img src="{{ asset($professional->prof_logo ?? 'default.jpg') }}"
                 alt="{{ $professional->name }} logo"
                 class="pro-avatar mb-3">

            <h1 class="fw-bold text-dark">{{ ucfirst($professional->name) }}</h1>
            <h4 class="text-muted">
                Company: {{ ucfirst($professional->company_name) }}
            </h4>
            <h4 class="text-muted">
                Profession: {{ ucfirst($p_c) }}
            </h4>
        </div>

        <hr class="m-0">

        {{-- DETAILS + ACTIONS --}}
        <div class="professional-body">
            <p><strong>Experience:</strong> {{ $professional->experience }} years</p>

            <p class="price-text">
                <strong>Price per hour:</strong>
                <span>RM {{ number_format($professional->price, 2) }}</span>
            </p>

            <div class="actions-row">
                <div class="d-flex align-items-center">
                    <button id="prof_heart"
                            class="heart"
                            aria-label="Like"
                            data-id="{{ Auth::id() }}">
                    </button>
                    <span class="heart_m"></span>
                </div>

                <a class="btn btn-warning book-btn d-inline-flex align-items-center"
                   href="#"
                   data-bs-toggle="modal"
                   data-bs-target="#exampleModal">
                    <i class="bi bi-calendar-check me-2"></i>
                    Book Event
                </a>
            </div>
        </div>
    </div>
</div>

{{-- MODAL SECTION --}}
@extends('components.modal')

@section('modal_title','Select Date & Time')

@section('modal_body')
    @php
        $route = Request::segment(4);
    @endphp
    <form action="{{ route('prof.book', $route) }}" method="POST"
          class="p-3 border rounded-3 shadow-sm bg-light">
        @csrf

        <div class="mb-3">
            <label for="s" class="form-label fw-semibold text-primary">
                Start Date & Time
            </label>
            <input type="text" name="order_date" id="s"
                   class="form-control border-primary shadow-sm s"
                   placeholder="Select start"
                   required
                   style="height:45px; border-radius:10px;">
        </div>

        <div class="mb-3">
            <label for="e" class="form-label fw-semibold text-primary">
                End Date & Time
            </label>
            <input type="text" name="upto_date" id="e"
                   class="form-control border-primary shadow-sm e"
                   placeholder="Select end"
                   required
                   style="height:45px; border-radius:10px;">
        </div>

        <div class="d-grid mt-4">
            <button type="submit"
                    class="btn btn-success fw-semibold py-2"
                    style="border-radius:10px; font-size:16px;">
                <i class="bi bi-check-circle me-1"></i>
                Submit Booking
            </button>
        </div>
    </form>

    {{-- flatpickr --}}
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/material_blue.css">
    <script src="{{ asset('manual_js/flatpicker.js') }}" defer></script>

    <script>
        const heartBtn = document.querySelector("#prof_heart");
        const heart_msg = document.querySelector('.heart_m');

        if (heartBtn) {
            const url = window.location.href;
            const parts = url.split('/').filter(Boolean);
            const v_id = parts[parts.length - 1];

            heartBtn.addEventListener("click", async () => {
                heart_msg.textContent = '';

                if (!heartBtn.dataset.id) {
                    heart_msg.textContent = 'Need to login';
                    return;
                }

                heartBtn.classList.add("active");

                const origin = window.location.href + '/heart';

                const response = await fetch(origin, {
                    method: "POST",
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        professional_id: v_id,
                        user_id: heartBtn.dataset.id,
                        like: 'yes'
                    })
                });

                try {
                    const data = await response.json();
                    console.log(data);
                } catch (e) {
                    console.error('Invalid JSON from heart endpoint', e);
                }
            });
        }
    </script>
@endsection
