@extends('welcome')
@section('title', 'event booking')
<style>
    .cards-rail {
  display: flex;
  gap: 12px;
  overflow-x: auto;
  padding: 4px 4px 12px;
  -webkit-overflow-scrolling: touch;
}

/* Each card in the rail */
.item-card {
  width: 220px;           /* desktop default width */
  flex: 0 0 220px;        /* prevents wrapping */
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
    scroll-snap-type: x mandatory;   /* snap between cards */
    gap: 16px;
    padding-left: 8px;
  }
  .item-card {
    flex: 0 0 90%;   /* ~one card per screen */
    max-width: 90%;
  }
}


/* end ratings */
  /* Ratings track */
  /* ===== RATINGS SECTION ===== */
/* ===============================
   RATINGS – PROFESSIONAL STYLE
   =============================== */

.ratings-track {
    display: flex;
    flex-direction: column;
    gap: 18px;
}

/* Card */
.rating-box {
    background: #ffffff;
    border: 1px solid #e6e9ee;
    border-radius: 16px;
    padding: 18px 20px;
    box-shadow: 0 8px 24px rgba(0,0,0,0.04);
}

/* Header row */
.rating-box-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
}

/* Name */
.rating-name {
    margin: 0;
    font-size: 15px;
    font-weight: 600;
    color: #1f2937;
}

/* Stars */
.rating-stars {
    display: flex;
    gap: 3px;
    font-size: 15px;
}

.rating-stars .star {
    color: #e5e7eb;
}

.rating-stars .star.filled {
    color: #fbbf24;
}

/* Description */
.rating-desc {
    margin-top: 10px;
    font-size: 14px;
    line-height: 1.65;
    color: #4b5563;
    max-width: 90%;
}
</style>
@section('content')
    <div class="container" style="margin-top: 50px;" >
        @include('components.toast')
        <div class="venue-rooms">
            @include('eventscape.venue_show.imageshow',['images'=>$images,'venue'=>$venue])
        </div>
        <div class="venue-address">
            @include('eventscape.venue_show.address')
        </div>
        <section id="venue_suggestion" style="margin-top: 50px;" class="">
            <h5 class="fw-bold mb-3">Related Venue providers</h5>

            <div class="cards-rail">
                @forelse ($suggest as $s)
                @php
                     $logo = data_get($s, 'venueimages.0.doc');
                @endphp
                    <div class="card border-0 shadow-sm text-center rounded-3 item-card">
                        <a href="{{ route('card.venue', $s->id) }}" class="text-decoration-none text-dark">
                            <img src="{{ asset($logo ?? 'images/default.jpg') }}" alt="{{ $s->companyname }}"
                                class="card-img-top rounded-top" style="object-fit: cover; height: 160px;"
                                loading="lazy">

                            <div class="card-body p-2">
                                <p class="fw-semibold mb-1 text-truncate" title="{{ $s->venue_name }}">
                                    {{ $s->venue_name }}
                                </p>
                                <p class="text-muted small mb-1">
                                    {{-- {{ $s->venue_city }} --}}
                                </p>
                                @if (!empty($s->venue_city))
                                    <p class="small text-secondary mb-0">
                                        <i class="bi bi-geo-alt"></i>
                                        {{ $s->venue_city }}
                                    </p>
                                @endif
                            </div>
                        </a>
                    </div>
                @empty
                    <p class="text-muted">No other venue provider found for this category.</p>
                @endforelse
            </div>
        </section>
        {{-- related service provider --}}
                <section id="venue_suggestion" style="margin-top: 50px;" class="">
            <h5 class="fw-bold mb-3">Related Service provider</h5>

            <div class="cards-rail">
                @forelse ($suggest_service_providers as $s)
                {{-- @php
                     $logo = data_get($s, 'venueimages.0.doc');
                @endphp --}}
                    <div class="card border-0 shadow-sm text-center rounded-3 item-card">
                        <a href="" class="text-decoration-none text-dark">
                            <img src="{{ asset($s['logo'] ?? 'images/default.jpg') }}" alt="{{ $s['companyname'] }}"
                                class="card-img-top rounded-top" style="object-fit: cover; height: 160px;"
                                loading="lazy">

                            <div class="card-body p-2">
                                <p class="fw-semibold mb-1 text-truncate" title="{{ $s['name'] }}">
                                    {{ $s['name'] }}
                                </p>
                                <p class="text-muted small mb-1">
                                    {{-- {{ $s->venue_city }} --}}
                                </p>
                                @if (!empty($s['companyname']))
                                    <p class="small text-secondary mb-0">
                                            <i class="bi bi-building-fill"></i>
                                            {{ $s['companyname'] }}
                                    </p>
                                @endif
                            </div>
                        </a>
                    </div>
                @empty
                    <p class="text-muted">No other venue provider found for this category.</p>
                @endforelse
            </div>
        {{-- </section>
        <section id="venue_ratings" class="mt-5">
            <h5 class="fw-bold mb-3">Ratings</h5>

            @if(isset($rating) && $rating->count())
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
                <p class="no-rating">This venue has no ratings yet.</p>
            @endif
        </section> --}}
          <div class="section-body">
    @if (isset($rating) && $rating->count())
      <div class="ratings-track">
        <h5 class="fw-bold mb-3 mt-5">Ratings</h5>
        @foreach ($rating as $r)
          <div class="rating-box">

            <div class="rating-box-header">
              <p class="rating-name">{{ ucfirst($r->user->name) }}</p>

              <div class="rating-stars">
                @for ($i = 1; $i <= 5; $i++)
                  <span class="star {{ $i <= $r->ratings ? 'filled' : '' }}">&#9733;</span>
                @endfor
              </div>
            </div>

            <p class="rating-desc">{{ ucfirst($r->description) }}</p>
          </div>
        @endforeach
      </div>
    @else
      <p class="text-muted mb-0">This professional has no ratings yet.</p>
    @endif
  </div>


    </div>
@endsection
