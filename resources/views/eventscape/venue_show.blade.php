{{-- img laziness --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js" async></script>

<div class="venues-wrap">
    @forelse ($venues as $venue)
@php
    // Capitalizing venue details
    $company_name = ucwords($venue['venue_name']);
    $location     = ucwords($venue['venue_city']);
    $description1 = ucfirst($venue['description']);
    $halal        = ucfirst($venue['halal']);

    // Determine the food-related message and symbol
    if ($halal == 1) {
        $msg = "Food with halal";
        $icon = "bi-check-circle"; // Green check symbol for halal
        $color = "green"; // Add a green color class
    } elseif ($venue['food_provide'] == 'yes') {
        $msg = "Food";
        // $icon = "✔"; // Regular check mark
        $color = "orange"; // Default color
    } else {
        $msg = "";
        $icon = ""; // No icon for "No food provided"
        $color = ""; // No color for this case
    }
@endphp


        <a href="{{ route('card.venue', $venue) }}" class="underline-no">
            <div class="venue-card mb-2">
                <div class="venue-img">
                    <img data-src="{{ $venue['doc'] ? asset($venue['doc']) : asset('images/placeholder.jpg') }}"
                         alt="{{ $venue['venue_name'] }} image"
                         class="v-img img-fluid lazyload"
                         loading="lazy"
                         decoding="async"
                         fetchpriority="low">
                </div>

                <div class="venue-body">
                    <div class="venue-name">
                        {{-- use class instead of inline style (typo) --}}
                        <h3 class="com-name">{{ ucwords(strtolower($company_name)) }}  <span style="color: {{$color}};font-size:16px;" class="{{ $icon }}">{{ $msg }} </span></h3>
                    </div>

                    <div class="venue-location">
                        <p class="mb-1" style="font-size: 14px;">
                            <i class="bi bi-geo-alt-fill text-danger"></i>
                            {{ ucwords(strtolower($location)) }}
                        </p>
                    </div>
                    <div class="venue-description">
                        <p class="venue-desc-text mb-0">{{ strtolower($description1) }}</p>
                    </div>
                </div>
            </div>
        </a>
    @empty
        <p class="text-muted">No venues found for this location.</p>
    @endforelse

    @if ($paginate)
        <div class="mt-3">
            {{ $venues->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>

@if (request()->routeIs('eventspace.dashboard'))
<style>
    a {
        text-decoration: none;
        color: black;
    }
</style>
@endif

<style>
    .venues-wrap {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .venue-card {
        display: flex;
        gap: 10px;
        border: 1px solid #eee;
        border-radius: 10px;
        background: #fff;
        padding: 8px 10px;          /* smaller padding = shorter card */
    }

    .venue-img .v-img {
        width: 200px;
        height: 120px;              /* was 183px – big reduction */
        border-radius: 8px;
        object-fit: cover;
    }

    .venue-body {
        flex: 1;
        min-width: 0;
    }

    .com-name {
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
        font-size: 20px;            /* was 28px */
        line-height: 1.2;
        letter-spacing: 0;
        color: #000;
        margin-bottom: 4px;
    }

    .venue-desc-text {
        font-size: 0.85rem;
        color: #555;
        /* Optional: clamp to 2 lines so card doesn’t become too tall */
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .underline-no:hover {
        text-decoration: none;
    }

    /* Mobile – keep it nice & big */
    @media (max-width: 768px) {
        .venue-card {
            flex-direction: column;
            gap: 12px;
        }

        .venue-img .v-img {
            width: 100%;
            height: 180px;
        }

        .com-name {
            font-size: 20px;
        }
    }
</style>
