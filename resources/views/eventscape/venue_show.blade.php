{{-- img laziness --}}
     <script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js" async></script>
<div class="venues-wrap">
    @forelse ($venues as $venue)
    @php
    $company_name=ucwords($venue['venue_name']);
    $location=ucwords($venue['venue_city']);
    $description1=ucfirst($venue['description']);
    @endphp
        <a href="{{ route('card.venue', $venue) }}" class="underline-no">
            <div class="venue-card mb-2">
                <div class="venue-img">
                    <img data-src="{{ $venue['doc'] ? asset($venue['doc']) : asset('images/placeholder.jpg') }}"
                        alt="{{ $venue['venue_name'] }} image" class="v-img img-fluid lazyload" loading="lazy" decoding="async" fetchpriority="low">
                </div>

                <div class="venue-body">
                    <div class="venue-name">
                        <h3 style="com-nmae">{{ $company_name }}</h3>
                    </div>

                    <div class="venue-location">
                        <p>
                            <i class="bi bi-geo-alt-fill text-danger" style="font-size:25px;"></i>
                            {{ $location }}
                        </p>
                    </div>

                    <div class="venue-description">
                        <p>{{ $description1 }}</p>
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
    @else
        {{-- <div class="mt-3">
            {{ $venues->links('pagination::bootstrap-5') }}
        </div> --}}
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
    .com-name{
        font-family: Poppins;
font-weight: 600;
font-style: SemiBold;
font-size: 28px;
leading-trim: NONE;
line-height: 100%;
letter-spacing: 0%;
vertical-align: bottom;

    }
    .venues-wrap {
        display: flex;
        /* grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); */
        /* gap: 16px;
   */
        flex-direction: column;
    }

    .venue-card {
        display: flex;
        gap: 16px;
        border: 1px solid #eee;
        border-radius: 12px;
        background: #fff;
        padding: 12px;
    }

    .venue-img .v-img {
        width: 250px;
        height: 183px;
        border-radius: 8px;
        object-fit: cover;
    }

    .venue-body {
        flex: 1;
    }
    .underline-no:hover{
        text-decoration: none;
    }
    /* Mobile */
    @media (max-width: 768px) {
        .venue-card {
            flex-direction: column;
            /* stack image above text on small screens */
            gap: 12px;
        }

        .venue-img .v-img {
            width: 100%;
            height: 180px;
        }
    }
</style>
