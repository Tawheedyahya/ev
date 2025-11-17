<style>
    .categoryy {
        width: 100%;
    }

    .category-pic {
        display: grid;
        grid-template-columns: 2fr 1fr;
        grid-auto-rows: 260px;        /* same row height = same ratio */
        gap: 15px;
    }
    .fetch{
        margin-bottom: 10px;
    }

    .venue-card {
        position: relative;
        border-radius: 18px;
        overflow: hidden;
        display: block;
        background: #000;
        text-decoration: none;
    }

    .venue-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;           /* stretch image nicely */
        display: block;
        transition: transform 0.3s ease;
    }

    .venue-card:hover img {
        transform: scale(1.03);
    }

    .venue-card .overlay {
        position: absolute;
        inset: auto 0 0 0;
        padding: 12px 14px;
        color: #fff;
        background: linear-gradient(to top, rgba(0,0,0,0.65), transparent 60%);
    }

    .venue-card .overlay h4 {
        margin: 0 0 4px;
        font-size: 1rem;
        font-weight: 600;
    }

    .venue-card .overlay p {
        margin: 0;
        font-size: 0.85rem;
        display: flex;
        align-items: center;
        gap: 4px;
    }

    .venue-card .overlay i {
        font-size: 0.9rem;
    }

    /* First card becomes the big one (like "Wedding Venues") */
    .category-pic .venue-card:first-child {
        grid-row: span 2;
    }

    /* Responsive: stack into 1 column on mobile */
    @media (max-width: 768px) {
        .category-pic {
            grid-template-columns: 1fr;
            grid-auto-rows: 220px;
        }

        .category-pic .venue-card:first-child {
            grid-row: auto;
        }
    }
</style>
<div class="fetch">
<div class="categoryy">
    <div class="category-pic">
        @foreach ($venues as $venue)
            <a href="{{ route($action, $venue['id']) }}" class="venue-card">
                <img data-src="{{ asset($venue['doc']) }}"
                     alt="{{ $venue['venue_name'] ?? 'Venue' }}" class="lazyload" loading="lazy" decoding="async">

                <div class="overlay">
                    <h4>{{ $venue['venue_name'] ?? 'Venue' }}</h4>
                    <p><i class="bi bi-geo-alt-fill"></i> {{ $venue['venue_city'] ?? 'Location' }}</p>
                </div>
            </a>
        @endforeach
    </div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/lazysizes/lazysizes.min.js" async></script>

