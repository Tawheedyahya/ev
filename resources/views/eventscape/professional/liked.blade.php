@extends('welcome')
@section('title', 'dashboard')
<style>
    .card {
        border: none;
        border-radius: 1rem;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .card:hover {
        transform: translateY(-4px);
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
    }

    .card-img-top {
        height: 180px;
        object-fit: cover;
        border-top-left-radius: 1rem;
        border-top-right-radius: 1rem;
    }

    .heartt {
        font-size: 14px;
        border-radius: 20px;
        padding: 5px 12px;
        transition: all 0.2s ease;
    }

    .heartt:hover {
        transform: scale(1.05);
    }
</style>
@section('content')
    <div class="dashboard-wrap">
        @include('components.toast')
        @include('customer.sidebar')


        <main class="main-content container">
            <div class="row">
                <div class="col-12 col-md-8 col-lg-6">
                    <div class="profile-card p-3 p-md-4 border rounded bg-white">
                        <div class="row align-items-center g-5">
                            <div class="col-auto">
                                <i class="bi bi-person-circle" style="font-size:100px;"></i>
                            </div>
                            <div class="col">
                                <h5 class="mb-1">Name</h5>
                                <p class="mb-0">{{ Auth::user()->name }}</p>
                                <p class="mb-0">{{ Auth::user()->phone }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <div class="row">
        <div class="col-12 col-md-8 col-lg-6">
            <h3 class="mt-4 mb-4 title-with-underline">YOUR LIKED VENUES</h3>

            <div class="row row-cols-1 row-cols-md-3 g-4">
                @forelse($likedprofessionals as $venue)
                    <div class="col d-flex">
                        <div class="card shadow-sm w-100 d-flex flex-column h-100">
                            <a href="{{ route('card.venue', $venue) }}" class="text-decoration-none text-dark">
                                @if ($venue['prof_logo'])
                                    <img src="{{ asset($venue['prof_logo']) }}" class="card-img-top"
                                        alt="{{ $venue['name'] }}">
                                @else
                                    <img src="{{ asset('images/no-image.png') }}" class="card-img-top"
                                        alt="No image available">
                                @endif

                                <div class="card-body flex-grow-1">
                                    <h5 class="card-title">{{ $venue['companyname'] }}</h5>
                                    <p class="card-text text-muted mb-1"><strong>City:</strong> {{ $venue['address'] }}
                                    </p>
                                    <p class="card-text">{{ $venue['experience'] ?? 'No description available.' }}</p>
                                </div>
                            </a>

                            <div class="card-footer text-center mt-auto bg-white border-0 pb-3">
                                <button class="heartt btn btn-outline-danger btn-sm" data-id="{{ $venue['id'] }}">👎
                                    Unlike</button>
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
@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset('manual_css/profile.css') }}">
@endpush
@push('scripts')
    <script>
        function toggleSidebar() {
            document.getElementById("sidebar").classList.toggle("show");
        }
        // $(document).ready(function() {
        //     $('#redirection').change(function() {
        //         const url = $(this).val()
        //         if (url) {
        //             window.location.href = url;
        //         }
        //     })
        // })

        document.addEventListener("DOMContentLoaded", () => {
            const heartButtons = document.querySelectorAll(".heartt");

            heartButtons.forEach((btn) => {
                btn.addEventListener("click", async () => {
                    const v_id = btn.dataset.id;
                    // console.log(v_id)
                    const url = window.location.origin + `/eventspace/prof/professional/${v_id}/heart`;
                    console.log(url);
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
                                like:'no',
                            })
                        })

                        const data = await response.json()
                        console.log(data);

                        const card = btn.closest(".col");
                        if (card) card.remove();
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
