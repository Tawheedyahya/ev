{{-- img laziness --}}

<div class="venues-wrap">
    @forelse ($professionals as $prof)
    @php
    $Profession=ucwords($prof->professionlist->name??$prof['profession_name'])
    @endphp
        <a href="{{route('prof.professional',$prof['id'])}}" class="underline-no">
            <div class="venue-card mb-2">
                <div class="venue-img">
                    <img data-src="{{ $prof['prof_logo'] ? asset($prof['prof_logo']) : asset('images/placeholder.jpg') }}"
                        alt="{{ $prof['name'] }} image" class="v-img img-fluid lazyload" loading="lazy" decoding="async" fetchpriority="low">
                </div>

                <div class="venue-body">
                    <div class="venue-name">
                        <h3  class="com-name">{{ ucwords(strtolower($prof->companyname??$prof['companyname'])) }}</h3>
                    </div>

                    <div class="venue-location">
                        <p style="font-size: 14px;">
                            <i class="bi bi-geo-alt-fill text-danger"></i>
                            {{ ucwords(strtolower($prof->address??$prof['address'])) }}
                        </p>
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
@if (request()->routeIs('prof.dashboard'))
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
