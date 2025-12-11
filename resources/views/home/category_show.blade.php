<style>

/* ============================= */
/* OUTER BACKGROUND */
/* ============================= */
.fetch {
    background: linear-gradient(135deg, #ffffff, #fff7f1);
    padding: 25px;
    border-radius: 18px;
}

/* ============================= */
/* GRID – DESKTOP */
/* ============================= */
.category-pic {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 22px;
}

/* ============================= */
/* CARD BASE */
/* ============================= */
.venue-card {
    position: relative;
    display: flex;
    flex-direction: column;
    border-radius: 16px;
    overflow: hidden;
    background: #000;
    text-decoration: none;
    height: 340px;
    transition: 0.35s ease;
    box-shadow: 0 6px 18px rgba(0,0,0,0.12);
}

.venue-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 14px 32px rgba(0,0,0,0.2);
}

/* ============================= */
/* IMAGE */
/* ============================= */
.venue-card-img-container {
    position: relative;
    width: 100%;
    height: 100%;
}

.venue-card-img-container img {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    object-fit: fill !important; /* FULL STRETCH */
    object-position: top center !important;
    display: block;
    transition: 0.45s ease;
}

.venue-card:hover img {
    transform: scale(1.08);
}

/* ============================= */
/* OVERLAY LAYER */
/* ============================= */
.overlay-layer {
    position: absolute;
    inset: 0;
    background: linear-gradient(
        to top,
        rgba(0,0,0,0.7),
        rgba(0,0,0,0.15)
    );
    z-index: 2;
}

/* ============================= */
/* EV TAG */
/* ============================= */
.venue-tag {
    position: absolute;
    top: 12px;
    left: 12px;
    z-index: 4;
    padding: 7px 12px;
    background: linear-gradient(135deg, #00BFFF, #0074cc);
    border-radius: 10px;
    font-size: 0.75rem;
    font-weight: 700;
    color: #fff;
    box-shadow: 0 4px 10px rgba(0,0,0,0.25);
}

/* ============================= */
/* CARD CONTENT */
/* ============================= */
.venue-card-content {
    position: absolute;
    bottom: 18px;
    left: 18px;
    right: 18px;
    z-index: 5;
    color: #fff;
    padding: 0;
}

.venue-card-content h4 {
    font-size: 1.15rem;
    font-weight: 800;
    margin: 0 0 4px;
    text-transform: capitalize;
    color: #fff;
}

.venue-card-content .location {
    margin: 0;
    font-size: 0.88rem;
    display: flex;
    align-items: center;
    gap: 6px;
    color: #e6e6e6;
}

/* ============================= */
/* PRICE OVERLAY – NEW DESIGN */
/* ============================= */
.price-overlay {
    position: absolute;
    bottom: 14px;
    right: 14px;
    z-index: 6;

    /* Glassmorphism premium badge */
    background: rgba(0, 0, 0, 0.55);
    backdrop-filter: blur(6px);

    padding: 10px 18px;
    border-radius: 14px;

    font-size: 1.25rem;
    font-weight: 900;
    color: #fff;
    letter-spacing: -0.5px;

    box-shadow: 0 6px 18px rgba(0,0,0,0.35);
    border: 1px solid rgba(255,255,255,0.25);
}

/* FIX PRICE OVERLAY POSITION ON MOBILE */
@media (max-width: 768px) {
    .price-overlay {
        bottom: 10px !important;
        right: 10px !important;

        padding: 8px 14px !important;
        font-size: 1.05rem !important;

        border-radius: 12px !important;
        backdrop-filter: blur(5px) !important;
    }
}

/* ============================= */
/* RESPONSIVE – TABLET */
/* ============================= */
@media (max-width: 992px) {
    .category-pic {
        grid-template-columns: repeat(2, 1fr);
    }
}

/* ============================= */
/* MOBILE – HORIZONTAL SCROLL */
/* ============================= */
@media (max-width: 768px) {

    .category-pic {
        display: flex !important;
        overflow-x: auto;
        gap: 14px;
        padding-bottom: 10px;
        scroll-snap-type: x mandatory;
        white-space: nowrap;
    }

    .category-pic::-webkit-scrollbar {
        display: none;
    }

    .venue-card {
        flex: 0 0 82%;
        height: 300px;
        scroll-snap-align: start;
    }
}
</style>



<div class="fetch">
    <div class="categoryy">
        <div class="category-pic">

            @foreach ($venues as $venue)
                <a href="{{ route($action, $venue['id']) }}" class="venue-card">

                    <div class="venue-card-img-container">

                        <img data-src="{{ asset($venue['doc']) }}"
                             class="lazyload"
                             alt="{{ $venue['venue_name'] }}">

                        <div class="overlay-layer"></div>

                        <span class="venue-tag">EV Visa Approved</span>

                    </div>

                    <div class="venue-card-content">
                        <h4>{{ ucwords($venue['venue_name']) }}</h4>
                        <p class="location">
                            <i class="bi bi-geo-alt-fill"></i>
                            {{ ucwords($venue['venue_city']) }}
                        </p>
                    </div>

                    <span class="price-overlay">
                        RM{{ $venue['amount'] }}
                    </span>

                </a>
            @endforeach

        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/lazysizes/lazysizes.min.js" async></script>
