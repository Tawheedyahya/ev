{{-- img laziness --}}

<div class="venues-wrap">
    @forelse ($professionals as $prof)
        <a href="{{route('ser.service_provider',$prof['id'])}}">
            <div class="venue-card mb-2">
                <div class="venue-img">
                    <img data-src="{{ $prof['logo'] ? asset($prof['logo']) : asset('images/placeholder.jpg') }}"
                        alt="{{ $prof['name'] }} image" class="v-img img-fluid lazyload" loading="lazy" decoding="async" fetchpriority="low">
                </div>

                <div class="venue-body">
                    <div class="venue-name">
                        <h3>Company name:{{ $prof->companyname??$prof['companyname'] }}</h3>
                    </div>

                    <div class="venue-location">
                        <p>
                            <i class="bi bi-geo-alt-fill text-danger"></i>
                            {{ $prof->city??$prof['city'] }}
                        </p>
                    </div>

                    {{-- <div class="venue-description">
                        <p>Exp:{{ $prof->experience??$prof['experience'] }} years</p>
                    </div> --}}
                    <div class="venue-profession">
                        {{-- <p>Provider:{{$prof->categories->name??$prof->profession_name}}</p> --}}
                    </div>
                </div>
            </div>
        </a>
    @empty
        <p class="text-muted">No professions found for this location.</p>
    @endforelse
    @if ($paginate)
        <div class="mt-3">
            {{ $professionals->links('pagination::bootstrap-5') }}
        </div>
    @endif

</div>
@if (request()->routeIs('serpro.dashboard'))
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
