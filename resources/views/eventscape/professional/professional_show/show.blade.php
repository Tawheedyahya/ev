@extends('welcome')
@section('title', 'professional')
<style>
    /* Horizontal rail */
    .cards-rail {
        display: flex;
        gap: 12px;
        overflow-x: auto;
        padding: 4px 4px 12px;
        -webkit-overflow-scrolling: touch;
    }

    /* Each card in the rail */
    .item-card {
        width: 220px;
        /* desktop default width */
        flex: 0 0 220px;
        /* prevents wrapping */
        scroll-snap-align: start;
    }

    /* Optional: nicer scrollbar on webkit */
    /* .cards-rail::-webkit-scrollbar { height: 8px; }
.cards-rail::-webkit-scrollbar-thumb {
  background: #d7d7d7; border-radius: 4px;
} */

    /* Mobile: show ONE card per view, full-width feel */
    @media (max-width: 576px) {
        .cards-rail {
            scroll-snap-type: x mandatory;
            /* snap between cards */
            gap: 16px;
            padding-left: 8px;
        }

        .item-card {
            flex: 0 0 90%;
            /* ~one card per screen */
            max-width: 90%;
        }
    }

    /* ratings */
    /* ---- Ratings Section Wrapper ---- */
    #venue_ratings {
        max-width: 1200px;
        margin: 40px auto 0;
        padding: 0 15px;
    }

    #venue_ratings>h5 {
        font-size: 1.25rem;
        font-weight: 700;
        color: #1f2933;
    }

    /* ---- Horizontal Scroll Track ---- */
    .ratings-track {
        display: flex;
        gap: 18px;
        overflow-x: auto;
        padding-bottom: 10px;
        scroll-snap-type: x mandatory;
        -webkit-overflow-scrolling: touch;
    }

    /* nicer scrollbar on desktop */
    .ratings-track::-webkit-scrollbar {
        height: 6px;
    }

    .ratings-track::-webkit-scrollbar-thumb {
        background: rgba(148, 163, 184, 0.7);
        border-radius: 3px;
    }

    /* ---- Individual Rating Card ---- */
    .rating-box {
        scroll-snap-align: start;
        min-width: 280px;
        max-width: 340px;
        background: radial-gradient(circle at top left, #f97316 0, #1f2937 45%, #020617 100%);
        color: #f9fafb;
        border-radius: 16px;
        padding: 14px 16px;
        box-shadow: 0 16px 35px rgba(15, 23, 42, 0.35);
        position: relative;
        overflow: hidden;
    }

    /* subtle glow decoration */
    .rating-box::before {
        content: "";
        position: absolute;
        inset: -40%;
        background: radial-gradient(circle at top right, rgba(251, 191, 36, 0.18), transparent 60%);
        opacity: 0.9;
        pointer-events: none;
    }

    /* place content above glow */
    .rating-box>* {
        position: relative;
        z-index: 1;
    }

    /* ---- Name / header line ---- */
    .rating-name {
        font-weight: 600;
        font-size: 0.95rem;
        margin-bottom: 4px;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .rating-name::before {
        content: "";
        width: 24px;
        height: 24px;
        border-radius: 999px;
        background: linear-gradient(135deg, #fbbf24, #f97316);
        display: inline-block;
    }

    /* ---- Stars ---- */
    .rating-stars {
        margin-bottom: 6px;
    }

    .rating-stars .star {
        font-size: 1.15rem;
        color: rgba(148, 163, 184, 0.6);
        margin-right: 2px;
        display: inline-block;
    }

    .rating-stars .star.filled {
        color: #fde047;
        /* bright gold */
    }

    /* ---- Description ---- */
    .rating-desc {
        font-size: 0.9rem;
        line-height: 1.5;
        color: #e5e7eb;
        margin-bottom: 0;
    }

    /* ---- No rating text ---- */
    .no-rating {
        font-style: italic;
        color: #6b7280;
        margin-top: 10px;
    }

    /* ---- Responsive tweaks ---- */
    @media (max-width: 992px) {
        #venue_ratings {
            padding: 0 12px;
        }
    }

    @media (max-width: 576px) {
        .ratings-track {
            gap: 14px;
        }

        .rating-box {
            min-width: 85%;
            max-width: 85%;
            padding: 12px 14px;
        }

        .rating-stars .star {
            font-size: 1.05rem;
        }

        .rating-desc {
            font-size: 0.85rem;
        }
    }
</style>
@section('content')
    <div class="container" style="margin-top: 50px;">
        @include('components.toast')
        <div class="prof-details">
            @include('eventscape.professional.professional_show.prof_details')
        </div>
        <div class="prof-places">
            @include('eventscape.professional.professional_show.prof_places')
        </div>
        <div class="suggest mt-4 mt-5 ms-5">
            <h5 class="fw-bold mb-3 mt-5">Related professional</h5>

            <div class="cards-rail">
                @forelse ($suggest as $s)
                    <div class="card border-0 shadow-sm text-center rounded-3 item-card">
                        <a href="{{ route('prof.professional', $s->id) }}" class="text-decoration-none text-dark">
                            <img src="{{ asset($s->prof_logo ?? 'images/default.jpg') }}" alt="{{ $s->companyname }}"
                                class="card-img-top rounded-top" style="object-fit: cover; height: 160px;" loading="lazy">

                            <div class="card-body p-2">
                                <p class="fw-semibold mb-1 text-truncate" title="{{ $s->companyname }}">
                                    {{ $s->companyname }}
                                </p>
                                <p class="text-muted small mb-1">
                                    {{ $s->professionlist->name }}
                                </p>
                                @if (!empty($s->proserviceplace))
                                    <p class="small text-secondary mb-0">
                                        <i class="bi bi-geo-alt"></i>
                                        {{ collect($s->proserviceplace)->pluck('name')->join(', ') }}
                                    </p>
                                @endif
                            </div>
                        </a>
                    </div>
                @empty
                    <p class="text-muted">No other professionals found for this category.</p>
                @endforelse
            </div>
        </div>
        <section id="venue_ratings" class="mt-5">
            <h5 class="fw-bold mb-3">Ratings</h5>

            @if (isset($rating) && $rating->count())
                <div class="ratings-track">
                    @foreach ($rating as $r)
                        <div class="rating-box">
                            <p class="rating-name">{{ $r->user->name }}</p>

                            <div class="rating-stars">
                                @for ($i = 1; $i <= 5; $i++)
                                    <span class="star {{ $i <= $r->ratings ? 'filled' : '' }}">&#9733;</span>
                                @endfor
                            </div>

                            <p class="rating-desc">{{ $r->description }}</p>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="no-rating">This professional has no ratings yet.</p>
            @endif
        </section>

    </div>
@endsection
