@extends('welcome')
@section('title', 'dashboard')

<style>
    /* Page background */
    .profile-layout {
        min-height: 100vh;
        background-color: #F7DBB7;
    }

    /* Liked professionals grid: make all cards same size */
    .liked-professionals-grid .col {
        display: flex;
    }

    .liked-professionals-grid .card {
        display: flex;
        flex-direction: column;
        width: 100%;
        border-radius: 16px;
        overflow: hidden;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .liked-professionals-grid .card:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 30px rgba(15, 23, 42, 0.18);
    }

    .liked-professionals-grid .card-img-top {
        height: 180px;            /* fixed height for all images */
        object-fit: cover;
    }

    .liked-professionals-grid .card-body {
        flex-grow: 1;             /* pushes footer to bottom */
    }

    .liked-professionals-grid .card-footer {
        border-top: 0;
    }

    .title-with-underline {
        position: relative;
        display: inline-block;
        font-weight: 700;
    }

    .title-with-underline::after {
        content: "";
        position: absolute;
        left: 0;
        bottom: -6px;
        width: 40%;
        height: 3px;
        background: #e67e22;
        border-radius: 999px;
    }
</style>

@section('content')
    <div class="dashboard-wrap">
        @include('customer.sidebar')

        {{-- MAIN --}}
        <main class="main-content container-fluid profile-layout">
            @include('components.toast')

            <div class="row">
                <div class="col-12 col-md-8 col-lg-8 col-xl-8 col-xxl-9">
                    <div class="profile-card p-5 p-md-4">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <span class="badge profile-badge">Profile</span>
                            {{-- <a href="#" class="profile-edit-link">Edit</a> --}}
                        </div>

                        <div class="row align-items-center g-4">
                            <div class="col-auto">
                                <div class="avatar-circle">
                                    <i class="bi bi-person-circle"></i>
                                </div>
                            </div>
                            <div class="col">
                                <h4 class="profile-name mb-1">Name</h4>
                                <p class="mb-0 profile-email">{{ Auth::user()->email }}</p>
                                <p class="mb-0 profile-phone">{{ Auth::user()->phone }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Event cart style wrapper for bookings --}}
            <section class="event-cart mt-4">
                <div class="align-items-center mb-2">
                    {{-- extra header content if needed --}}
                </div>

                <div class="row">
                    <div class="col-12 col-md-8 col-lg-6">
                        <h3 class="mt-4 mb-4 title-with-underline">YOUR LIKED PROFESSIONALS</h3>

                        <div class="row row-cols-1 row-cols-md-3 g-4 liked-professionals-grid">
                            @forelse($likedprofessionals as $venue)
                                <div class="col">
                                    <div class="card shadow-sm h-100">
                                        <a href="{{ route('card.venue', $venue) }}" class="text-decoration-none text-dark">
                                            @if ($venue['prof_logo'])
                                                <img src="{{ asset($venue['prof_logo']) }}" class="card-img-top"
                                                     alt="{{ $venue['name'] }}">
                                            @else
                                                <img src="{{ asset('images/no-image.png') }}" class="card-img-top"
                                                     alt="No image available">
                                            @endif

                                            <div class="card-body">
                                                <h5 class="card-title">{{ $venue['companyname'] }}</h5>
                                                <p class="card-text text-muted mb-1">
                                                    <strong>City:</strong> {{ $venue['address'] }}
                                                </p>
                                                <p class="card-text">
                                                    {{ $venue['experience'] ?? 'No description available.' }}
                                                </p>
                                            </div>
                                        </a>

                                        <div class="card-footer text-center mt-auto bg-white pb-3">
                                            <button class="heartt btn btn-outline-danger btn-sm"
                                                    data-id="{{ $venue['id'] }}">
                                                👎 Unlike
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12">
                                    <div class="alert alert-info text-center">
                                        No professionals found.
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('manual_css/profile.css') }}">
@endpush

@push('scripts')
    <script>
        function toggleSidebar() {
            document.getElementById("sidebar").classList.toggle("show");
        }

        document.addEventListener("DOMContentLoaded", () => {
            const heartButtons = document.querySelectorAll(".heartt");

            heartButtons.forEach((btn) => {
                btn.addEventListener("click", async () => {
                    const v_id = btn.dataset.id;
                    const url = window.location.origin + `/eventspace/prof/professional/${v_id}/heart`;

                    btn.disabled = true;
                    btn.innerText = "Removing...";

                    try {
                        const response = await fetch(url, {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                                "X-CSRF-TOKEN": "{{ csrf_token() }}"
                            },
                            body: JSON.stringify({
                                professional_id: v_id,
                                like: 'no',
                            })
                        });

                        const data = await response.json();
                        console.log(data);

                        const col = btn.closest(".col");
                        if (col) col.remove();
                    } catch (err) {
                        console.error("Error:", err);
                        btn.innerText = "Error";
                        btn.disabled = false;
                    }
                });
            });
        });
    </script>
@endpush
