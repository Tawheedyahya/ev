{{-- =========================
STYLES
========================= --}}
@push('styles')
<style>
/* ============================= */
/* GRID – 4 CARDS IN ONE ROW */
/* ============================= */
.venue-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 26px;
    padding: 15px 0;
}

/* Tablet */
@media (max-width: 1024px) {
    .venue-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

/* Mobile */
@media (max-width: 600px) {
    .venue-grid {
        grid-template-columns: repeat(1, 1fr);
    }
}

/* ============================= */
/* CARD WRAPPER (CRITICAL FIX) */
/* ============================= */
.venue-card-wrapper {
    width: 100%;
    max-width: 340px;
    margin: 0 auto;
}

/* ============================= */
/* MAIN CARD */
/* ============================= */
.venue-card {
    background: #fff;
    border-radius: 14px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0,0,0,0.08);
    transition: 0.3s ease;
    text-decoration: none;
    display: block;
    color: inherit;
    position: relative;
}

.venue-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.12);
}

/* ============================= */
/* IMAGE */
/* ============================= */
.venue-card-img-container {
    position: relative;
    height: 210px;
    width: 100%;
}

.venue-card-img-container img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* Gradient */
.overlay-layer {
    position: absolute;
    inset: 0;
    background: linear-gradient(to top, rgba(0,0,0,.30), rgba(0,0,0,.05));
}

/* Tag */
.venue-tag {
    position: absolute;
    top: 12px;
    left: 12px;
    padding: 6px 12px;
    background: linear-gradient(135deg, #FF6B6B, #FF4B4B);
    border-radius: 10px;
    font-size: .75rem;
    font-weight: 700;
    color: #fff;
    z-index: 3;
}

/* ============================= */
/* CONTENT */
/* ============================= */
.venue-card-content {
    padding: 15px 16px 18px;
}

.venue-card-content h4 {
    font-size: 1.05rem;
    font-weight: 800;
    line-height: 1.3;
    margin-bottom: 6px;

    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.venue-desc {
    font-size: .88rem;
    color: #6b7280;
    line-height: 1.35;
    margin-bottom: 10px;

    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.location {
    display: flex;
    align-items: center;
    gap: 6px;
    font-size: .88rem;
    color: #4b5563;
}

.venue-price-below {
    font-size: 1rem;
    font-weight: 800;
    color: #1e293b;
    margin-top: 6px;
}

/* ============================= */
/* CAROUSEL FIX */
/* ============================= */
.carousel,
.carousel-inner,
.carousel-item {
    height: 100%;
}

.carousel-control-prev,
.carousel-control-next {
    width: 36px;
    height: 36px;
    top: 35%;
    transform: translateY(-50%);
    opacity: 1;
    z-index: 10;
}

.carousel-control-prev {
    left: 12px;
}

.carousel-control-next {
    right: 12px;
}

.carousel-control-prev-icon,
.carousel-control-next-icon {
    width: 36px;
    height: 36px;
    background-color: #EB4D4B;
    border-radius: 50%;
    background-image: none;
    display: flex;
    align-items: center;
    justify-content: center;
}

.carousel-control-prev-icon::after,
.carousel-control-next-icon::after {
    content: '';
    border: solid #fff;
    border-width: 0 2px 2px 0;
    padding: 5px;
}

.carousel-control-prev-icon::after {
    transform: rotate(135deg);
}

.carousel-control-next-icon::after {
    transform: rotate(-45deg);
}
</style>
@endpush

{{-- =========================
HALAL VERIFIED VENUES
========================= --}}
<div class="container">
    <h5 class="mt-5 d-flex align-items-center gap-2 fw-semibold fs-3">
        <i class="bi bi-patch-check-fill text-success"></i>
        <span>Halal Verified Venues</span>
    </h5>

    <div class="venue-grid">
        @foreach ($verified_venues as $venue)
        <a href="{{ route($action, $venue['id']) }}" class="venue-card">

            <div class="venue-card-img-container">
                <img data-src="{{ asset($venue['venueimages'][0]['doc']) }}" class="lazyload">
                <div class="overlay-layer"></div>
                <span class="venue-tag">Halal Verified</span>
            </div>

            <div class="venue-card-content">
                <h4>{{ ucwords($venue['venue_name']) }}</h4>
                <p class="venue-desc">{{ $venue['description'] }}</p>

                <p class="location">
                    <i class="bi bi-geo-alt-fill"></i>
                    {{ ucwords($venue['venue_city']) }}
                </p>

                <p class="venue-price-below">
                    RM{{ number_format($venue['amount'], 2) }}
                </p>
            </div>

        </a>
        @endforeach
    </div>
</div>

<div class="container my-5">

    <div class="ped-wrapper">

        <!-- LEFT IMAGE CARD -->
        <div class="ped-image">
            <img src="{{ asset('ev_photos/work4.jpg') }}" alt="Event Planning Guide" loading="lazy">

            <div class="ped-image-overlay">
                <h2 class="ped-image-title">
                    Malaysia Event Planning & Venue Marketing Guide:<br>
                    How to Book or Get<br>
                    Booked
                </h2>
            </div>
        </div>

        <!-- RIGHT CONTENT CARD -->
        <div class="ped-content">
            <h3>For Event Planners: How to Book Smart and Save Time</h3>

            <h5>1. Start With the Right Filters on EV.asia</h5>
            <p>
                Planners rarely search for “event venue” without context. You know what you need,
                you just need a fast way to find it. Instead of browsing aimlessly or guessing,
                use EV.asia's filters to match your exact event type, size, and budget.
            </p>

            <p>
                Using EV.asia's smart filter helps you skip the noise, cut your shortlist in half,
                and connect only with venues that match your goals. The “Venue With Packages” toggle
                is especially useful if you want bundled deals without the back-and-forth.
            </p>

            <h5>2. Compare Features, Not Just Price</h5>
            <ul>
                <li>Included amenities (tables, AV, Wi-Fi, air conditioning)</li>
                <li>Rental terms (minimum spend, hourly vs full-day)</li>
                <li>Layout flexibility (workshops vs social events)</li>
            </ul>

            <p>
                Look at the full package. Many event venues are priced low
                but exclude basic needs like audio or setup.
            </p>

            <h5>3. Read Venue Reviews</h5>
            <p>
                Don't just look at ratings. Read how others used the venue.
                A wedding review may not help if you're planning a seminar.
            </p>
        </div>

    </div>

</div>

{{-- =========================
MOST VIEWED OCCASIONS (FIXED)
========================= --}}
<div class="container">
    <h5 class="mt-5 d-flex align-items-center gap-2 fw-semibold fs-3">
        {{-- <i class="bi bi-graph-up-arrow text-primary"></i> --}}
        <span>Most Viewed Occasions</span>
    </h5>

    <div class="venue-grid">
        @foreach ($slidder as $occasion => $venues)
        @if(!empty($venues))
        <div class="venue-card-wrapper">

            <div id="carousel-{{ $occasion }}" class="carousel slide">

                <div class="carousel-inner">
                    @foreach ($venues as $index => $venue)
                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">

                        <a href="{{ route($action, $venue['id']) }}" class="venue-card">

                            <div class="venue-card-img-container">
                                <img data-src="{{ asset($venue['image']) }}" class="lazyload">
                                <div class="overlay-layer"></div>
                                <span class="venue-tag">{{ ucwords($occasion) }}</span>
                            </div>

                            <div class="venue-card-content">
                                <h4>{{ ucwords($venue['venue_name']) }}</h4>
                                <p class="venue-desc">{{ $venue['description'] }}</p>

                                <p class="location">
                                    <i class="bi bi-geo-alt-fill"></i>
                                    {{ ucwords($venue['venue_city']) }}
                                </p>

                                <p class="venue-price-below">
                                    RM{{ number_format($venue['amount'], 2) }}
                                </p>
                            </div>

                        </a>

                    </div>
                    @endforeach
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#carousel-{{ $occasion }}" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>

                <button class="carousel-control-next" type="button" data-bs-target="#carousel-{{ $occasion }}" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>

            </div>

        </div>
        @endif
        @endforeach


    </div>
</div>

{{-- end occasion --}}

<!-- GIRL IMAGE -->
{{-- <div class="girl my-4">
    <img src="{{ asset('ev_photos/girl.png') }}" alt="" class="img-fluid" loading="lazy">
</div> --}}

<!-- HALAL IMAGE -->
<div class="halal my-3">
    <img src="{{ asset('ev_photos/halal.png') }}" alt="" class="img-fluid" loading="lazy">
</div>

<style>
    /* =========================
   MAIN WRAPPER
========================= */
    .ped-wrapper {
        display: flex;
        gap: 24px;
        background: #ffffff;
        padding: 20px;
        height: 500px;
        /* FIXED CARD HEIGHT */
        border-radius: 24px;
        box-shadow: 0 12px 32px rgba(0, 0, 0, 0.08);
        align-items: stretch;
        /* KEY FOR SAME HEIGHT */
    }

    /* =========================
   LEFT IMAGE CARD
========================= */
    .ped-image {
        position: relative;
        flex: 0 0 42%;
        height: 100%;
        border-radius: 18px;
        overflow: hidden;
    }

    .ped-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .ped-image::after {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(to top,
                rgba(0, 0, 0, 0.75) 0%,
                rgba(0, 0, 0, 0.45) 40%,
                rgba(0, 0, 0, 0.15) 100%);
    }

    .ped-image-overlay {
        position: absolute;
        bottom: 28px;
        left: 28px;
        right: 28px;
        z-index: 2;
    }

    .ped-image-title {
        color: #ffffff;
        font-size: 1.5rem;
        font-weight: 800;
        line-height: 1.25;
        margin: 0;
        max-width: 95%;
    }

    /* =========================
   RIGHT CONTENT CARD
========================= */
    .ped-content {
        flex: 1;
        height: 100%;
        background: #ffffff;
        border-radius: 18px;
        padding: 28px;
        overflow-y: auto;
    }

    .ped-content h3 {
        font-weight: 800;
        margin-bottom: 18px;
    }

    .ped-content h5 {
        font-weight: 700;
        margin-top: 22px;
    }

    .ped-content p,
    .ped-content li {
        font-size: 0.95rem;
        line-height: 1.6;
        color: #444;
    }

    /* NICE SCROLLBAR */
    .ped-content::-webkit-scrollbar {
        width: 6px;
    }

    .ped-content::-webkit-scrollbar-thumb {
        background: #cfcfcf;
        border-radius: 10px;
    }

    /* =========================
   EXTRA IMAGES
========================= */
    .girl,
    .halal {
        text-align: center;
    }

    .halal img {
        width: 100%;
        height: auto;
        display: block;
    }

    /* =========================
   MOBILE
========================= */
    /* =========================
   ENHANCED MOBILE RESPONSIVENESS
========================= */
    /* =========================
   MOBILE FIX (CRITICAL)
========================= */
    @media (max-width: 991px) {

        .ped-wrapper {
            flex-direction: column;
            /* STACK IMAGE + CONTENT */
            height: auto;
            /* REMOVE FIXED HEIGHT */
            padding: 16px;
        }

        .ped-image {
            flex: none;
            width: 100%;
            height: 260px;
            /* CONTROL IMAGE HEIGHT */
        }

        .ped-content {
            height: auto;
            overflow: visible;
            /* PAGE SCROLL, NOT CARD SCROLL */
        }
    }

    @media (max-width: 480px) {

        .ped-image {
            height: 200px;
        }

        .ped-image-title {
            font-size: 1.05rem;
            line-height: 1.3;
        }
    }
</style>
