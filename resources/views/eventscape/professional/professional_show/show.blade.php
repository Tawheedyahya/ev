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
    <div class="container-fluid " style="margin-top: 50px;">
        @include('components.toast')
        <div class="prof-details">
            @include('eventscape.professional.professional_show.prof_details')
        </div>
        <div class="prof-places">
            @include('eventscape.professional.professional_show.prof_places')
        </div>
        <div class="suggest mt-4 mt-5" style="margin-top: 50px">
            <h5 class="fw-bold mb-3">Related professional</h5>

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
                                    {{$s->professionlist->name}}
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

    </div>
@endsection
