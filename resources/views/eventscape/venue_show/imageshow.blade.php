<div id="venueCarousel" class="carousel slide" data-bs-ride="false">
    <div class="carousel-inner">
        @foreach ($images as $idx => $img)
            <div class="carousel-item {{ $idx === 0 ? 'active' : '' }}">
                <div class="card shadow-lg border-0 rounded-4 overflow-hidden mx-auto">
                    <div class="ratio ratio-16x9">
                        <img data-src="{{ asset($img['doc'] ?? $img['room_doc']) }}"
                            class="card-img-top object-fit-cover img-fluid lazyload" alt="venue image " loading="lazy">
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Prev / Next buttons -->
    <button class="carousel-control-prev custom-arrow" type="button" data-bs-target="#venueCarousel"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next custom-arrow" type="button" data-bs-target="#venueCarousel"
        data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>
{{-- VR SHOW --}}
<div class="vr-show">
    <div class="vrr">
        <a href="javascript:void(0)" class="btn btn-warning vr-card" onclick="vr()"><img data-src="{{ asset('ev_photos/vr.png') }}"
                alt="" style="margin-right:5px;" class="lazyload" ><span id="title">VR</span></a>
                @php
                use Illuminate\Support\Facades\Auth;
                    @$u_id=Auth::id();
                    if(!$u_id || $u_id==''){
                        $u_id=null;
                    }
                @endphp
        <!-- Heart Button -->
        <button id="heartBtn" class="heart" aria-label="Like" data-id="{{$u_id}}"></button><span id="heart_msg" class="heart_m"></span>

        <div class="venue-content">
            <div class="venue-header">
                <h1 class="mt-3">
                    <i class="bi bi-building me-2"></i>
                    {{ $venue['venue_name'] }}
                </h1>
            </div>
            <div class="venue-description">
                <p style="color: rgba(135, 135, 135, 1);">{{ $venue['description'] }}</p>
            </div>
            <div class="venue-specifications">
                <h5 class="mt-3 mb-3 fw-semibold">Venue Specification</h5>

                <div class="spec-list d-flex flex-wrap flex-lg-wrap gap-3">
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
            @if($venue['food_provide']=='yes')
            <div class="venue-food">
                <h5 class="mt-3 mb-3 fw-semibold">Food card</h5>
                <div class="spec-list d-flex flex-wrap flex-lg-wrap gap-3">
                     <button type="button" class="spec-card btn text-start" >
                    <div class="spec-name text-warning fw-semibold">breakfast</div>
                    <div class="spec-cap text-muted small">{{ $venue['breakfast']==null?'not provide':'per person MYR:'.$venue['breakfast'] }}</div>
                     </button>
                     <button type="button" class="spec-card btn text-start" >
                    <div class="spec-name text-warning fw-semibold">lunch</div>
                    <div class="spec-cap text-muted small">{{ $venue['lunch']==null?'not provide':'per person MYR:'.$venue['lunch'] }}</div>
                     </button>
                      <button type="button" class="spec-card btn text-start" >
                    <div class="spec-name text-warning fw-semibold">dinner</div>
                    <div class="spec-cap text-muted small">{{ $venue['dinner']==null?'not provide':'per person MYR:'.$venue['dinner'] }}</div>
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
    <div class="request">
        <div class="card p-3 d-inline-block text-center" style="border-radius: 12px; ">
            <div class="mb-2">
                <a href="javascript:void(0)" class="btn btn-warning w-100 fw-semibold py-2 padd " id="see_price"
                    style="border-radius: 8px;" data-amount="{{ $venue['amount'] }}" >See Price</a>
            </div>
            <div>
                <!-- Trigger Button -->
                <a href="javascript:void(0)" class="btn padd btn-outline-warning w-100 fw-semibold py-2"
                    style="border-radius: 8px;" data-bs-toggle="modal" data-bs-target="#eventModal">
                    Add to Event
                </a>
                @include('eventscape.venue_show.form')
            </div>
        </div>
    </div>
</div>

@push('styles')
    <style>
        .fac {

            background: rgba(248, 248, 248, 1);
            border-radius: 11px;


        }

        .vr-card {
            display: inline-block;
            /* background: orange; */
            position: relative;

            margin-top: -20PX;
            z-index: 999;
            box-shadow: 5px 10px 3px rgba(67, 64, 64, 0.2);
        }

        .vr-show {
            display: flex;
            justify-content: space-between;
        }

        .spec-card {
            background: rgba(248, 248, 248, 1);

        }

        .add_color {
            background-color: #3f51b5 !important;
            /* Indigo (contrasts well with orange) */
            color: #fff !important;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        @media(min-width:600px) {
            .vr-show {
                margin-left: 50px;
            }

            .padd {
                padding: 100px;
            }
        }
    </style>
    <link rel="stylesheet" href="{{ asset('manual_css/carousel.css') }}">
@endpush

<script src="{{ asset('manual_js/eventspace/imageshow.js') }}"></script>
<script>
function vr() {
  const url = @json($venue['vr']);

  // Validate URL
  if (!url || typeof url !== 'string' || !/^https?:\/\//i.test(url)) {
    // Keep carousel intact; just warn
    alert('There is no valid VR link for this venue.');
    return;
  }

  // Build a sandboxed iframe to block frame-busting on mobile
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

  // Replace carousel only after validation
  $('.carousel-inner').html(iframeHtml);
  $('.custom-arrow').hide()
  // Update controls
  $('#title').text('Close VR').attr('onclick','close_vr()');
  $('.vr-card').attr('onclick','close_vr()'); // FIX: removed stray quote

  // Optional: If the provider forbids embedding, show a graceful fallback
  // after a short delay (can't reliably detect cross-origin errors).
  setTimeout(() => {
    // If user still on this page and we see no user interaction, offer open-in-new-tab
    // (You can also add a visible fallback block in the DOM instead of alert)
    // NOTE: This won't detect all cases, but improves UX.
    const opened = document.getElementById('tour');
    if (opened) {
      // You can check for a CSS computed size as a weak signal:
      const rect = opened.getBoundingClientRect();
      if (rect.height < 50) {
        // Fallback CTA
        if (confirm('Your browser blocked the embedded VR. Open it in a new tab?')) {
          window.open(url, '_blank', 'noopener,noreferrer');
        }
      }
    }
  }, 1200);
}

function close_vr() {
  // Light reset so you don’t reload the whole page on mobile
//   window.location.reload();
//   Alternatively (no reload):
  $('.carousel-inner').load(location.href + ' .carousel-inner>*', '');
  $('#title').text('VR').attr('onclick', 'vr()');
//   $()
 $('.custom-arrow').show()
  $('.vr-card').attr('onclick','vr()');
}
</script>


