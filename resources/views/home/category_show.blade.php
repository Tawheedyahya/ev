<style>
    /* ==================================== */
    /* GENERAL LAYOUT (Grid) */
    /* ==================================== */
    .categoryy {
        width: 100%;
    }

    /* UPDATED: Changed to a uniform 3-column grid */
    .category-pic {
        display: grid;
        grid-template-columns: repeat(3, 1fr); /* Three equal columns */
        grid-auto-rows: auto;
        gap: 20px;
    }

    .fetch {
        margin-bottom: 20px;
        padding: 10px;
    }

    /* REMOVED: Styling for the first card to be large (grid-row: span 2) */
    .category-pic .venue-card:first-child {
        grid-row: auto;
    }

    /* ==================================== */
    /* VENUE CARD STYLES */
    /* ==================================== */
    .venue-card {
        border-radius: 8px;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        background: #fff;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        transition: box-shadow 0.3s ease, transform 0.3s ease;
        text-decoration: none;
        color: #333;
        height: 100%; /* Ensures all cards stretch to the same height */
    }

    .venue-card:hover {
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        transform: translateY(-3px);
    }

    /* Image Container */
    .venue-card-img-container {
        position: relative;
        padding-top: 60%;
        overflow: hidden;
    }

    .venue-card img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        transition: transform 0.3s ease;
        border-radius: 8px 8px 0 0;
    }

    .venue-card:hover img {
        transform: scale(1.05);
    }

    /* === TAG BASE STYLES === */
    .venue-tag {
        position: absolute;
        top: 0;
        left: 0;
        color: white;
        padding: 6px 12px;
        font-size: 0.85rem;
        font-weight: 600;
        z-index: 10;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        line-height: 1;
        display: flex;
        align-items: center;
        gap: 5px;
        /* Matches the card's top-left corner radius */
        border-top-left-radius: 8px;
        /* Custom clip path for the slanted bottom-right edge */
        clip-path: polygon(0 0, 100% 0, 90% 100%, 0 100%);
    }

    /* === NEW CLASS: EV VISA TAG (Light Blue Gradient) - CORRECT STYLE === */
    .ev-visa-tag {
        background: linear-gradient(135deg, #00BFFF, #1E90FF); /* Light blue to a slightly darker blue */
    }

    /* The existing tag styles (kept for reference) */
    .new-venue-tag {
        background: linear-gradient(135deg, #8a48ff, #007bff);
    }
    .super-venue-tag {
        background: linear-gradient(135deg, #FF69B4, #8a48ff);
    }
    .most-viewed-tag {
        background: linear-gradient(135deg, #FFA500, #FF4500);
    }

    /* Content Area */
    .venue-card-content {
        padding: 15px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .venue-card-content h4 {
        margin: 0 0 5px;
        font-size: 1.1rem;
        font-weight: 700;
        color: #000;
    }

    .venue-card-content p.location {
        margin: 0 0 10px;
        font-size: 0.9rem;
        color: #666;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    /* Tags/Labels */
    .venue-card-tag {
        display: inline-block;
        font-size: 0.75rem;
        font-weight: 600;
        padding: 4px 10px;
        border-radius: 4px;
        margin-right: 5px;
        margin-bottom: 5px;
        background-color: #e0f7fa;
        color: #007bb5;
    }

    /* Remove the old overlay styles */
    .venue-card .overlay {
        display: none;
    }

    /* ==================================== */
    /* Responsive: Adjust layout for smaller screens */
    /* ==================================== */
    @media (max-width: 992px) {
        .category-pic {
            grid-template-columns: repeat(2, 1fr);
        }
        .venue-card-img-container {
            padding-top: 55%;
        }
    }

    @media (max-width: 768px) {
        .category-pic {
            grid-template-columns: 1fr;
            gap: 15px;
        }
        .venue-card-img-container {
            padding-top: 50%;
        }
    }
</style>

<div class="fetch">
    <div class="categoryy">
        <div class="category-pic">
            @foreach ($venues as $index => $venue)
                <a href="{{ route($action, $venue['id']) }}" class="venue-card">

                    <div class="venue-card-img-container">

                        {{-- TEMPORARILY UNCONDITIONAL: Check if the tag appears at all --}}

                            <span class="venue-tag ev-visa-tag">
                                EV Visa Approved
                            </span>


                        {{-- The original "New Venue" tag logic should be restored here if needed,
                             but for "EV Visa Approved" this block is now correct. --}}

                        {{-- Assuming $venue['doc'] holds the image path --}}
                        <img data-src="{{ asset($venue['doc']) }}"
                            alt="{{ $venue['venue_name'] ?? 'Venue' }}" class="lazyload" loading="lazy" decoding="async">

                    </div>

                    <div class="venue-card-content">
                        {{-- Top content block (name and location) --}}
                        <div>
                            <h4>{{ $venue['venue_name'] ?? 'Venue' }}</h4>
                            <p class="location"><i class="bi bi-geo-alt-fill"></i> {{ $venue['venue_city'] ?? 'Location' }}</p>

                            {{-- Example for tags --}}
                            {{-- You'll need an array of tags in your $venue data --}}
                            {{-- @if (!empty($venue['tags']))
                                <div style="margin-bottom: 10px;">
                                @foreach ($venue['tags'] as $tag)
                                    <span class="venue-card-tag">{{ $tag }}</span>
                                @endforeach
                                </div>
                            @endif --}}
                        </div>

                        {{-- Bottom content block (pricing and capacity) --}}
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 10px; border-top: 1px solid #eee; padding-top: 10px;">
                            <span style="font-weight: bold; color: #d9534f; font-size: 1.1rem;">
                                RM{{ $venue['amount'] ?? 'N/A' }}
                                {{-- <!-- {{ $venue['unit'] ?? '/hour' }} --> --}}
                            </span>
                            {{-- Example capacity details --}}
                            <!-- <div style="font-size: 0.85rem; color: #666; display: flex; gap: 10px;">
                                <span title="Capacity"><i class="bi bi-people-fill"></i> {{ $venue['capacity'] ?? '100' }}</span>
                                <span title="Rooms Available"><i class="bi bi-house-fill"></i> {{ $venue['rooms'] ?? '3' }}</span>
                            </div> -->
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/lazysizes/lazysizes.min.js" async></script>
