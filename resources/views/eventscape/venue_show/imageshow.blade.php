<div id="venueCarousel" class="carousel slide" data-bs-ride="false">
  <div class="carousel-inner">
    @foreach ($images as $idx => $img)
      <div class="carousel-item {{ $idx === 0 ? 'active' : '' }}">
        <div class="card shadow-lg border-0 rounded-4 overflow-hidden mx-auto">
          <div class="ratio ratio-16x9">
            <img
              data-src="{{ asset($img['doc'] ?? $img['room_doc']) }}"
              class="card-img-top object-fit-cover img-fluid lazyload"
              alt="Venue image"
              loading="lazy">
          </div>
        </div>
      </div>
    @endforeach
  </div>

  <!-- Prev / Next buttons -->
  <button class="carousel-control-prev custom-arrow" type="button" data-bs-target="#venueCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next custom-arrow" type="button" data-bs-target="#venueCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>

{{-- VR SHOW --}}
<div class="vr-show">
  <div class="vrr">
    <a href="javascript:void(0)" class="btn btn-warning vr-card" onclick="vr()">
      <img data-src="{{ asset('ev_photos/vr.png') }}" alt="" style="margin-right:5px;" class="lazyload">
      <span id="title">VR</span>
    </a>

    @php
      use Illuminate\Support\Facades\Auth;
      @$u_id = Auth::id();
      if (!$u_id || $u_id == '') { $u_id = null; }
    @endphp

    <!-- Heart Button -->
    <button id="heartBtn" class="heart" aria-label="Like" data-id="{{ $u_id }}"></button>
    <span id="heart_msg" class="heart_m"></span>

    <div class="venue-content">
      <div class="venue-header">
        <h1 class="mt-3">
          <i class="bi bi-building me-2"></i>
          {{ $venue['venue_name'] }}
        </h1>
      </div>

      <div class="venue-description">
        <p style="color: rgba(135,135,135,1);">{{ $venue['description'] }}</p>
      </div>

      <div class="venue-specifications">
        <h5 class="mt-3 mb-3 fw-semibold">Venue Specification</h5>

        <div class="spec-list d-flex flex-wrap gap-3">
          @forelse (array_slice($images, 1) as $im)
            <button type="button" class="spec-card btn text-start" data-name="{{ $im['room_name'] }}">
              <div class="spec-name text-warning fw-semibold">{{ $im['room_name'] }}</div>
              <div class="spec-cap text-muted small">Seating: {{ $im['room_capacity'] }}</div>
            </button>
          @empty
            <div class="text-muted">No rooms</div>
          @endforelse
        </div>
      </div>

      @if ($venue['food_provide'] == 'yes')
      <div class="venue-food">
        <h5 class="mt-3 mb-3 fw-semibold">Food card</h5>
        <div class="spec-list d-flex flex-wrap gap-3">
          <button type="button" class="spec-card btn text-start">
            <div class="spec-name text-warning fw-semibold">Breakfast</div>
            <div class="spec-cap text-muted small">
              {{ $venue['breakfast'] == null ? 'Not provided' : 'Per person MYR: '.$venue['breakfast'] }}
            </div>
          </button>

          <button type="button" class="spec-card btn text-start">
            <div class="spec-name text-warning fw-semibold">Lunch</div>
            <div class="spec-cap text-muted small">
              {{ $venue['lunch'] == null ? 'Not provided' : 'Per person MYR: '.$venue['lunch'] }}
            </div>
          </button>

          <button type="button" class="spec-card btn text-start">
            <div class="spec-name text-warning fw-semibold">Dinner</div>
            <div class="spec-cap text-muted small">
              {{ $venue['dinner'] == null ? 'Not provided' : 'Per person MYR: '.$venue['dinner'] }}
            </div>
          </button>

          @if (!empty($venue['halal']) && $venue['halal'] == true)
            <div class="d-flex align-items-center mt-2 halal-badge">
              <i class="bi bi-patch-check-fill text-success me-2 fs-5"></i>
              <span class="fw-semibold text-success">Halal Certified</span>
            </div>
          @endif
        </div>
      </div>
      @endif
    </div>
  </div>

  <!-- ACTION CARD -->
  <div class="request">
    <div class="card p-3" style="border-radius:12px;">
      <div class="actions d-flex flex-nowrap align-items-stretch gap-3">
        <a href="javascript:void(0)"
           id="see_price"
           class="btn btn-warning fw-semibold py-3"
           style="border-radius:8px;"
           data-amount="{{ $venue['amount'] }}">
          See Price
        </a>

        <a href="javascript:void(0)"
           class="btn btn-outline-warning fw-semibold py-3"
           style="border-radius:8px;"
           data-bs-toggle="modal"
           data-bs-target="#eventModal">
          Check Availability
        </a>
      </div>

      @include('eventscape.venue_show.form')
    </div>
  </div>
</div>

@push('styles')
<style>
  /* Core layout */
  .vr-show {
    display:flex;
    justify-content:space-between;
    gap:24px;
  }
  @media (max-width:992px){
    .vr-show { flex-direction:column; }
  }

  /* VR button style */
  .vr-card {
    display:inline-block;
    position:relative;
    margin-top:-20px;
    z-index:999;
    box-shadow:5px 10px 3px rgba(67,64,64,0.2);
  }

  /* Card background */
  .spec-card, .fac {
    background:rgba(248,248,248,1);
    border-radius:11px;
  }

  /* ACTION BUTTONS */
  .request .card {
    display:flex;
    justify-content:center;
    align-items:center;
  }
  .actions {
    width:100%;
    min-width:0;
  }
  .actions .btn {
    flex:1 1 0;
    text-align:center;
    white-space:normal;
  }
  .actions .btn.w-100 { width:auto !important; }


  .vr-show{
  display:flex; gap:24px; align-items:flex-start;
}

/* give the right panel real space */
.request{ flex: 1 1 420px; }          /* or flex:0 0 420px if you want fixed width */
.request .card{ width:100%; }         /* stop shrink-to-fit */

/* the buttons row */
.actions{ display:flex; gap:12px; width:100%; min-width:0; }
.actions .btn{
  flex:1 1 0;                         /* equal width */
  display:flex; align-items:center; justify-content:center;
  padding:14px 18px;                  /* consistent height */
  white-space:nowrap;                 /* keep on one line */
}

/* stack on phones */
@media (max-width: 576px){
  .vr-show{ flex-direction:column; }
  .actions{ flex-wrap:wrap; }
}

  @media (max-width:576px){
    .actions { flex-wrap:wrap; }
  }

  /* Halal badge style */
  .halal-badge {
    background:#f6fff6;
    padding:6px 10px;
    border-radius:8px;
  }
</style>
<link rel="stylesheet" href="{{ asset('manual_css/carousel.css') }}">
@endpush

<script src="{{ asset('manual_js/eventspace/imageshow.js') }}"></script>
<script>
function vr(){
  const url = @json($venue['vr']);
  if (!url || typeof url !== 'string' || !/^https?:\/\//i.test(url)) {
    alert('There is no valid VR link for this venue.');
    return;
  }

  const iframeHtml = `
    <div id="tour" style="display:block; margin-top:10px;">
      <iframe
        src="${url}"
        width="100%"
        height="600"
        frameborder="0"
        allow="autoplay; fullscreen; xr-spatial-tracking; accelerometer; gyroscope"
        allowfullscreen
        sandbox="allow-scripts allow-same-origin allow-forms allow-pointer-lock"
        referrerpolicy="no-referrer-when-downgrade"
        style="border:0; display:block;">
      </iframe>
    </div>
  `;

  document.querySelector('#venueCarousel .carousel-inner').innerHTML = iframeHtml;
  document.querySelectorAll('.custom-arrow').forEach(el => el.style.display = 'none');
  document.getElementById('title').textContent = 'Close VR';
  document.querySelector('.vr-card').setAttribute('onclick', 'close_vr()');
}

function close_vr(){
  fetch(location.href, { headers: { 'X-Requested-With': 'XMLHttpRequest' } })
    .then(r => r.text())
    .then(html => {
      const tmp = document.createElement('div');
      tmp.innerHTML = html;
      const freshInner = tmp.querySelector('#venueCarousel .carousel-inner');
      if (freshInner) {
        document.querySelector('#venueCarousel .carousel-inner').innerHTML = freshInner.innerHTML;
      }
      document.querySelectorAll('.custom-arrow').forEach(el => el.style.display = '');
      document.getElementById('title').textContent = 'VR';
      document.querySelector('.vr-card').setAttribute('onclick','vr()');
    })
    .catch(() => location.reload());
}
</script>
