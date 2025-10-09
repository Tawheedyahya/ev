<div id="venueCarousel" class="carousel slide" data-bs-ride="false">
    <div class="carousel-inner">
        @foreach ($images as $idx => $img)
            <div class="carousel-item {{ $idx === 0 ? 'active' : '' }}">
                <div class="card shadow-lg border-0 rounded-4 overflow-hidden mx-auto">
                    <div class="ratio ratio-16x9">
                        <img data-src="{{ asset($img['doc'] ?? $img['room_doc']) }}"
                            class="card-img-top object-fit-cover img-fluid lazyload" alt="venue image " loading="lazy">
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Prev / Next buttons -->
    <button class="carousel-control-prev custom-arrow" type="button" data-bs-target="#venueCarousel"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next custom-arrow" type="button" data-bs-target="#venueCarousel"
        data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>
{{-- VR SHOW --}}
<div class="vr-show">
    <div class="vrr">
        <a href="#" class="btn btn-warning" class="vr-card"><img data-src="{{ asset('ev_photos/vr.png') }}"
                alt="" style="margin-right:5px;" class="lazyload">VR</a>
                @php
                use Illuminate\Support\Facades\Auth;
                    @$u_id=Auth::id();
                    if(!$u_id || $u_id==''){
                        $u_id=null;
                    }
                @endphp
        <!-- Heart Button -->
        <button id="heartBtn" class="heart" aria-label="Like" data-id="{{$u_id}}"></button><span id="heart_msg" class="heart_m"></span>

        <div class="venue-content">
            <div class="venue-header">
                <h1 class="mt-3">
                    <i class="bi bi-building me-2"></i>
                    {{ $venue['venue_name'] }}
                </h1>
            </div>
            <div class="venue-description">
                <p style="color: rgba(135, 135, 135, 1);">{{ $venue['description'] }}</p>
            </div>
            <div class="venue-specifications">
                <h5 class="mt-3 mb-3 fw-semibold">Venue Specification</h5>

                <div class="spec-list d-flex flex-wrap flex-lg-wrap gap-3">
                    @forelse (array_slice($images, 1) as $im)
                        <button type="button" class="spec-card btn text-start" data-name="{{ $im['room_name'] }}">
                            <div class="spec-name text-warning fw-semibold">{{ $im['room_name'] }}</div>
                            <div class="spec-cap text-muted small">Seating: {{ $im['room_capacity'] }}</div>
                        </button>
                    @empty
                        <div class="text-muted">No rooms</div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    <div class="request">
        <div class="card p-3 d-inline-block text-center" style="border-radius: 12px; ">
            <div class="mb-2">
                <a href="javascript:void(0)" class="btn btn-warning w-100 fw-semibold py-2 padd " id="see_price"
                    style="border-radius: 8px;" data-amount="{{ $venue['amount'] }}" >See Price</a>
            </div>
            <div>
                <!-- Trigger Button -->
                <a href="javascript:void(0)" class="btn padd btn-outline-warning w-100 fw-semibold py-2"
                    style="border-radius: 8px;" data-bs-toggle="modal" data-bs-target="#eventModal">
                    Add to Event
                </a>
                @include('eventscape.venue_show.form')
            </div>
        </div>
    </div>
</div>

@push('styles')
    <style>
        .fac {

            background: rgba(248, 248, 248, 1);
            border-radius: 11px;


        }

        .vr-card {
            display: inline-block;
            /* background: orange; */
            position: relative;

            margin-top: -20PX;
            z-index: 999;
            box-shadow: 5px 10px 3px rgba(67, 64, 64, 0.2);
        }

        .vr-show {
            display: flex;
            justify-content: space-between;
        }

        .spec-card {
            background: rgba(248, 248, 248, 1);

        }

        .add_color {
            background-color: #3f51b5 !important;
            /* Indigo (contrasts well with orange) */
            color: #fff !important;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        @media(min-width:600px) {
            .vr-show {
                margin-left: 50px;
            }

            .padd {
                padding: 100px;
            }
        }
    </style>
    <link rel="stylesheet" href="{{ asset('manual_css/carousel.css') }}">
@endpush

<script src="{{ asset('manual_js/eventspace/imageshow.js') }}"></script>
