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
    /* MAIN VENUE CARD */
    /* ============================= */
    .venue-card {
        background: #fff;
        border-radius: 14px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        transition: 0.3s ease;
        text-decoration: none;
        display: block;
        color: inherit;
        position: relative;
    }

    .venue-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
    }

    /* IMAGE */
    .venue-card-img-container {
        position: relative;
        height: 210px;
        width: 100%;
    }

    .venue-card-img-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    /* Dark gradient overlay */
    .overlay-layer {
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(0, 0, 0, 0.30), rgba(0, 0, 0, 0.05));
    }

    /* EV Tag */
    .venue-tag {
        position: absolute;
        top: 12px;
        left: 12px;
        padding: 6px 12px;
        background: linear-gradient(135deg, #FF6B6B, #FF4B4B);
        border-radius: 10px;
        font-size: 0.75rem;
        font-weight: 700;
        color: #fff;
        z-index: 3;
    }

    /* PRICE OVERLAY */
    .price-overlay {
        position: absolute;
        bottom: 14px;
        right: 14px;
        padding: 9px 14px;
        background: rgba(0, 0, 0, 0.55);
        color: white;
        font-weight: 800;
        font-size: 1.1rem;
        border-radius: 12px;
        z-index: 4;
        backdrop-filter: blur(5px);
    }

    /* CONTENT */
    .venue-card-content {
        padding: 15px 16px 18px;
    }

    /* Title */
    .venue-card-content h4 {
        font-size: 1.00rem;
        font-weight: 600;
        margin-bottom: 2px;
        color: #1e293b;
    }

    /* Description */
    /* TITLE */
    .venue-card-content h4 {
        font-size: 1.05rem;
        font-weight: 800;
        line-height: 1.3;
        margin-bottom: 6px;

        display: -webkit-box;
        -webkit-line-clamp: 2;
        /* show max 2 lines */
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }


    /* DESCRIPTION (Subtitle) */
    .venue-desc {
        font-size: 0.88rem;
        padding-top: 5px;
        color: #6b7280;
        line-height: 1.35;

        max-height: 2.4rem;
        /* keep to 2 lines */
        overflow: hidden;
        text-overflow: ellipsis;

        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        margin-bottom: 10px;
    }


    /* LOCATION */
    .location {
        margin-top: 4px;
        padding-bottom: 5px;
        margin-bottom: 6px;
        font-size: 0.92rem;
        display: flex;
        align-items: center;
        gap: 6px;
        color: #374151;
    }



    /* VALUES */
    .value-badge {
        background: #eef2f7;
        padding: 5px 10px;
        border-radius: 8px;
        font-size: 0.75rem;
        color: #4d5c75;
        font-weight: 600;
    }

    .venue-values {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
        margin-bottom: 10px;
    }

    /* LOCATION */
    .location {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 0.88rem;
        color: #4b5563;
        margin-top: 6px;
    }

    .location i {
        color: #6b7280;
    }

    .venue-price-below {
        font-size: 1rem;
        font-weight: 800;
        color: #1e293b;
        margin-top: 4px;
    }
</style>



<div class="fetch">
    <div class="categoryy">
        <div class="category-pic container">

            <div class="venue-grid">

                @foreach ($venues as $venue)
                    <a href="{{ route($action, $venue['id']) }}" class="venue-card">

                        <!-- IMAGE BLOCK -->
                        <div class="venue-card-img-container">

                            <img data-src="{{ asset($venue['doc']) }}" class="lazyload" alt="{{ $venue['venue_name'] }}">

                            <div class="overlay-layer"></div>
                            @if ($venue['new_venue'] == 'yes')
                                <span class="venue-tag">New Venue</span>
                            @endif
                            <br>
                            <!-- <span class="price-overlay">RM{{ $venue['amount'] }}</span> -->
                        </div>

                        <!-- CONTENT BLOCK -->
                        <div class="venue-card-content">

                            <!-- TITLE -->
                            <h4>{{ ucwords($venue['venue_name']) }}</h4>

                            <!-- DESCRIPTION -->
                            <p class="venue-desc">
                                {{ $venue['description'] ?? 'Beautiful multipurpose event venue for all occasions.' }}
                            </p>

                            <!-- VALUES -->
                            <div class="venue-values">
                                @if (!empty($venue['rooms_available']))
                                    <span class="value-badge">{{ $venue['rooms_available'] }} rooms available</span>
                                @endif

                                @if (!empty($venue['category']))
                                    <span class="value-badge">{{ ucwords($venue['category']) }}</span>
                                @endif
                            </div>

                            <!-- LOCATION -->
                            <p class="location">
                                <i class="bi bi-geo-alt-fill"></i>
                                {{ ucwords($venue['venue_city']) }}
                            </p>


                            <!-- PRICE BELOW LOCATION -->
                            <p class="venue-price-below">
                                RM{{ number_format($venue['amount'], 2) }}
                            </p>


                        </div>

                    </a>
                @endforeach

            </div>
        </div>
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/lazysizes/lazysizes.min.js" async></script>
