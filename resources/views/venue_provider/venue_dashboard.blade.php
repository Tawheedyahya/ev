@extends('venue_provider.venue_app')
@push('styles')
    <style>
        /* Purple button override */
        .btn-purple {
            background-color: #6f42c1 !important;
            /* Deep purple */
            border-color: #6f42c1 !important;
            color: #fff !important;
            /* White text for visibility */
        }

        /* Glow animation (deep, premium yellow) */
        .button-glow {
            animation: deepYellowGlow 1.2s ease-in-out 4;
        }

        @keyframes deepYellowGlow {
            0% {
                transform: scale(1);
                box-shadow: 0 0 0px 0 rgba(255, 193, 7, 0.7);
            }

            50% {
                transform: scale(1.08);
                box-shadow: 0 0 25px 12px rgba(255, 193, 7, 1);
            }

            100% {
                transform: scale(1);
                box-shadow: 0 0 0px 0 rgba(255, 193, 7, 0.7);
            }
        }
    </style>
@endpush
@section('title', 'venue')
@section('content')
    <div class="container-fluid">
        <!-- @include('venue_provider.layouts.header') -->

        <div class="add-venue mb-3" style="text-align:right;">
            <a href="{{ route('vp.venue.add') }}" class="add-venue-tile" aria-label="Add a new venue">
                <span class="btn btn-warning rounded-pill">
                    <i class="bi bi-plus-lg me-1"></i> Add venue
                </span>
            </a>
        </div>
        @include('components.toast')
        <div class="table-start container-fluid table-responsive">
            <table class="table align-middle" id="my_table" style="width:100%">
                <thead>
                    <tr>
                        <th class="phone-device">V.NO</th>
                        <th class="phone-device">V.ID</th>
                        <th>VENUE NAME</th>
                        <th>VENUE DESCRIPTION</th>
                        <th>VENUE AMOUNT</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($venues as $venue)
                        <tr>
                            <td class="phone-device">{{ $loop->iteration }}</td>
                            <td class="phone-device">{{ $venue['id'] }}</td>
                            <td>{{ $venue['venue_name'] }}</td>
                            <td>{{ $venue['description'] }}</td>
                            <td>{{ $venue['amount'] }}</td>
                            <td class="text-end" style="white-space:nowrap;width:1%;">
                                <div class="d-inline-flex align-items-center gap-2">
                                    <a href="{{ route('vp.venue.edit', $venue['id']) }}"
                                        class="btn btn-sm btn-outline-primary">
                                        Edit
                                    </a>

                                    {{-- Prefer DELETE via form (cleaner than GET for deletes) --}}
                                    <form action="{{ route('vp.venue.delete', $venue['id']) }}" method="POST"
                                        class="d-inline" onsubmit="return confirm('Are you sure you want to delete?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                            Delete
                                        </button>
                                    </form>

                                    <a href="{{ route('rooms.dashboard', $venue['id']) }}"
                                        class="btn btn-sm btn-outline-secondary room-btn" data-id="{{ $venue['id'] }}">
                                        Rooms
                                    </a>
                                </div>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @if (session('highlight_id'))
        <script>
            window.hightlight = "{{ session('highlight_id') }}"
            console.log(window.hightlight)
        </script>
    @endif
@endsection
@include('components.cdn.jquery')
@push('styles')
    <link rel="stylesheet"
        href="{{ asset('manual_css/datatables.css') }}?v={{ filemtime(public_path('manual_css/datatables.css')) }}">
@endpush

@push('scripts')
    <script src="{{ asset('manual_js/datatables.js') }}"></script>
    <script>
        $(document).ready(function() {
            if (window.hightlight) {
                const btn = document.querySelector(`.room-btn[data-id="${window.hightlight}"]`);
                if (btn) {
                    console.log("Button found, applying animation");
                    // Add animation class
                    btn.classList.add("button-glow");
                    setTimeout(() => {
                        btn.classList.remove("button-glow");
                    }, 9000);
                }
            }
        })
    </script>
@endpush

<!-- <style>
  #my_table .btn { padding: .25rem .5rem; line-height: 1.2; }
</style> -->
