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
</style>
@section('content')
    <div class="" style="margin-top: 50px;">
        @include('components.toast')
        <div class="venue-rooms">
            @include('eventscape.venue_show.imageshow',['images'=>$images,'venue'=>$venue])
        </div>
        <div class="venue-address">
            @include('eventscape.venue_show.address')
        </div>
        <section id="venue_suggestion" style="margin-top: 50px;" class="ms-lg-5 ms-md-5 ms-xl-5 ms-xxl-5">
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
    </div>
@endsection
