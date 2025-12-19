{{-- resources/views/eventscape/professional/professional_show/show.blade.php --}}
@extends('welcome')
@section('title', 'Professional')

@push('styles')
<link rel="stylesheet" href="{{ asset('manual_css/ckeditor.css') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<style>
  :root{
    --brand-warn: #f59e0b;
    --ink: #0f172a;
    --muted: #64748b;
    --card: #ffffff;
    --soft: #f8fafc;
    --line: #e5e7eb;
  }

  /* Page container */
  .pro-page{
    max-width: 1200px;
    margin: 0 auto;
    /* padding: 22px 16px 80px; */
  }

  /* HERO */
  .pro-hero{
    border-radius: 26px;
    background: radial-gradient(900px 280px at 30% 10%, rgba(245,158,11,.22), transparent 60%),
                linear-gradient(135deg, #ffffff 0%, #fffaf1 55%, #ffffff 100%);
    box-shadow: 0 26px 70px rgba(2,6,23,.10);
    border: 1px solid rgba(15,23,42,.06);
    overflow: hidden;
  }

  .pro-hero-inner{
    display: grid;
    grid-template-columns: 220px 1fr;
    gap: 22px;
    padding: 26px;
    align-items: center;
  }

  .pro-avatar-wrap{
    display:flex;
    justify-content:center;
  }

  .pro-avatar{
    width: 180px;
    height: 180px;
    border-radius: 999px;
    object-fit: cover;
    border: 6px solid #fff;
    box-shadow: 0 14px 34px rgba(2,6,23,.22);
    background: #fff;
  }

  .pro-title{
    display:flex;
    gap: 12px;
    flex-wrap: wrap;
    align-items: center;
    margin-bottom: 6px;
  }

  .pro-name{
    font-size: 2.05rem;
    line-height: 1.1;
    letter-spacing: -0.6px;
    color: var(--ink);
    margin: 0;
    font-weight: 800;
  }

  .pro-badge{
    display:inline-flex;
    align-items:center;
    gap: 8px;
    padding: 8px 12px;
    border-radius: 999px;
    background: rgba(245,158,11,.12);
    color: #92400e;
    font-weight: 700;
    font-size: .92rem;
    border: 1px solid rgba(245,158,11,.22);
  }

  .pro-meta{
    color: var(--muted);
    margin: 0;
    font-size: 1rem;
  }

  .pro-meta strong{
    color: #334155;
    font-weight: 700;
  }

  .pro-stats{
    margin-top: 14px;
    display:flex;
    flex-wrap: wrap;
    gap: 10px;
  }

  .stat-pill{
    background: #ffffff;
    border: 1px solid rgba(15,23,42,.08);
    border-radius: 14px;
    padding: 10px 12px;
    box-shadow: 0 10px 22px rgba(2,6,23,.06);
    display:flex;
    align-items:center;
    gap: 10px;
  }

  .stat-pill i{
    color: var(--brand-warn);
  }

  .stat-label{
    font-size: .85rem;
    color: var(--muted);
    line-height: 1.1;
  }

  .stat-value{
    font-weight: 800;
    color: var(--ink);
    font-size: 1.05rem;
    line-height: 1.1;
  }

  /* Action bar inside hero */
  .pro-actions{
    margin-top: 18px;
    display:flex;
    gap: 12px;
    align-items:center;
    flex-wrap: wrap;
  }

  .pro-book-btn{
    border-radius: 999px;
    padding: 12px 22px;
    font-weight: 800;
    box-shadow: 0 12px 26px rgba(245,158,11,.35);
  }

  .pro-like{
    display:flex;
    align-items:center;
    gap: 8px;
    padding: 10px 14px;
    border-radius: 999px;
    border: 1px solid rgba(15,23,42,.10);
    background: rgba(255,255,255,.9);
    box-shadow: 0 10px 20px rgba(2,6,23,.06);
  }

  /* ===== HEART BUTTON ===== */
  .heart-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 10px 16px;
    border-radius: 999px;
    border: 1px solid rgba(15,23,42,.15);
    background: #ffffff;
    color: #475569;
    font-weight: 600;
    cursor: pointer;
    transition: all .25s ease;
    box-shadow: 0 8px 20px rgba(2,6,23,.08);
  }

  .heart-btn i {
    font-size: 1.1rem;
    transition: transform .25s ease;
  }

/* Hover */
  .heart-btn:hover {
    transform: translateY(-1px);
    box-shadow: 0 12px 26px rgba(2,6,23,.12);
  }

/* Liked state */
  .heart-btn.liked {
    background: #fee2e2;
    border-color: #fecaca;
    color: #b91c1c;
  }

  .heart-btn.liked i {
    color: #dc2626;
  }

/* Loading */
  .heart-btn.loading {
    pointer-events: none;
    opacity: .6;
  }

/* Pop animation */
  .heart-btn.animate i {
    transform: scale(1.35);
  }


  /* MAIN GRID */
  .pro-grid{
    margin-top: 22px;
    display:grid;
    grid-template-columns: 1fr 360px;
    gap: 18px;
    align-items: start;
  }

  /* Section cards */
  .section-card{
    background: var(--card);
    border-radius: 18px;
    border: 1px solid rgba(15,23,42,.06);
    box-shadow: 0 14px 30px rgba(2,6,23,.06);
    overflow:hidden;
  }

  .section-head{
    padding: 16px 18px;
    border-bottom: 1px solid rgba(15,23,42,.06);
    display:flex;
    align-items:center;
    justify-content: space-between;
    gap: 10px;
    background: linear-gradient(180deg, rgba(248,250,252,.9), rgba(255,255,255,1));
  }

  .section-title{
    margin:0;
    font-weight: 900;
    font-size: 1.05rem;
    color: var(--ink);
    display:flex;
    align-items:center;
    gap: 10px;
  }

  .section-body{
    padding: 18px;
  }

  /* CKEditor output polish */
  .editor-output{
    line-height: 1.75;
    color: #334155;
    font-size: 1rem;
  }
  .editor-output p{ margin-bottom: .65rem; }
  .editor-output ul, .editor-output ol{ padding-left: 1.2rem; }
  .editor-output img{ max-width: 100%; height: auto; border-radius: 14px; }

  .muted{
    color: var(--muted);
  }

  /* Sticky booking card (desktop) */
  .sticky-col{
    position: sticky;
    top: 90px;
  }

  .book-card{
    padding: 18px;
  }

  .book-card .price-big{
    font-size: 1.55rem;
    font-weight: 900;
    color: #0f172a;
  }

  .price-box{
    background: #ecfdf5;
    border: 1px solid rgba(34,197,94,.18);
    padding: 12px 14px;
    border-radius: 14px;
    display:flex;
    justify-content: space-between;
    align-items:center;
    gap: 10px;
  }

  /* Service places buttons */
  .spec-card{
    transition: all .18s ease;
  }
  .spec-card:hover{
    transform: translateY(-2px);
    box-shadow: 0 10px 24px rgba(2,6,23,.12);
  }

  /* Related rail */
  .cards-rail{
    display:flex;
    gap: 14px;
    overflow-x:auto;
    padding: 6px 4px 14px;
    -webkit-overflow-scrolling: touch;
  }
  .item-card{
    width: 240px;
    flex: 0 0 240px;
    border-radius: 16px;
    overflow:hidden;
    transition: transform .18s ease;
  }
  .item-card:hover{ transform: translateY(-4px); }

  /* Ratings track */
  .ratings-track{
    display:flex;
    gap: 18px;
    overflow-x:auto;
    padding-bottom: 10px;
    scroll-snap-type: x mandatory;
    -webkit-overflow-scrolling: touch;
  }
  .rating-box{
    scroll-snap-align:start;
    min-width: 290px;
    max-width: 360px;
    background: radial-gradient(circle at top left, #f97316 0, #1f2937 45%, #020617 100%);
    color:#f9fafb;
    border-radius: 16px;
    padding: 14px 16px;
    box-shadow: 0 18px 40px rgba(15,23,42,.30);
    position:relative;
    overflow:hidden;
  }
  .rating-box::before{
    content:"";
    position:absolute;
    inset:-40%;
    background: radial-gradient(circle at top right, rgba(251,191,36,.18), transparent 60%);
    opacity:.9;
    pointer-events:none;
  }
  .rating-box > *{ position:relative; z-index:1; }
  .rating-name{
    font-weight:700;
    font-size:.95rem;
    margin: 0 0 6px;
    display:inline-flex;
    align-items:center;
    gap: 8px;
  }
  .rating-name::before{
    content:"";
    width: 26px; height: 26px;
    border-radius: 999px;
    background: linear-gradient(135deg, #fbbf24, #f97316);
    display:inline-block;
  }
  .rating-stars{ margin-bottom: 6px; }
  .rating-stars .star{
    font-size: 1.15rem;
    color: rgba(148,163,184,.6);
    margin-right: 2px;
    display:inline-block;
  }
  .rating-stars .star.filled{ color:#fde047; }
  .rating-desc{
    font-size:.92rem;
    line-height:1.55;
    color:#e5e7eb;
    margin:0;
  }

  /* Responsive */
  @media (max-width: 992px){
    .pro-grid{ grid-template-columns: 1fr; }
    .sticky-col{ position: static; }
  }

  @media (max-width: 576px){
    .pro-hero-inner{
      grid-template-columns: 1fr;
      padding: 18px;
      text-align:center;
    }
    .pro-actions{
      justify-content:center;
    }
    .pro-avatar{ width: 140px; height: 140px; }
    .pro-name{ font-size: 1.65rem; }
    .item-card{ flex: 0 0 86%; width: 86%; }
    .rating-box{ min-width: 86%; max-width: 86%; }
  }
</style>
@endpush

@section('content')
<div class="pro-page">
  @include('components.toast')

  {{-- HERO --}}
  <div class="pro-hero">
    <div class="pro-hero-inner">
      <div class="pro-avatar-wrap">
        <img
          src="{{ asset($professional->prof_logo ?? 'images/default.jpg') }}"
          alt="{{ $professional->name }} logo"
          class="pro-avatar"
          loading="lazy"
        >
      </div>

      <div>
        <div class="pro-title">
          <h1 class="pro-name">{{ ucfirst($professional->name) }}</h1>
          <span class="pro-badge">
            <i class="bi bi-patch-check-fill"></i>
            Verified Professional
          </span>
        </div>

        <p class="pro-meta mb-1">
          <strong>Company:</strong> {{ ucfirst($professional->company_name) }}
        </p>
        <p class="pro-meta mb-0">
          <strong>Profession:</strong> {{ ucfirst($p_c) }}
        </p>

        <div class="pro-stats">
          <div class="stat-pill">
            <i class="bi bi-briefcase-fill"></i>
            <div>
              <div class="stat-label">Experience</div>
              <div class="stat-value">{{ $professional->experience }} yrs</div>
            </div>
          </div>

          <div class="stat-pill">
            <i class="bi bi-cash-coin"></i>
            <div>
              <div class="stat-label">Price / hour</div>
              <div class="stat-value">RM {{ number_format($professional->price, 2) }}</div>
            </div>
          </div>
        </div>

        <div class="pro-actions">

    {{-- Like --}}
    <button
        id="prof_heart"
        class="heart-btn"
        aria-label="Save professional"
        data-id="{{ Auth::id() }}"
        data-liked="{{ $isLiked ?? '0' }}">
        <i class="bi bi-heart"></i>
        <span class="heart-text"></span>
    </button>

    {{-- Book --}}
    <a class="btn btn-warning pro-book-btn d-inline-flex align-items-center"
       href="#"
       data-bs-toggle="modal"
       data-bs-target="#exampleModal" style="background-color: #ef5350; color: fff; font-family: 'Poppins', sans-serif; font-size: 15px;">
        <i class="bi bi-calendar-check me-2"></i>
        Book Event
    </a>

    {{-- Secure --}}
    <span class="muted d-flex align-items-center">
        <i class="bi bi-shield-check text-warning me-1"></i>
        Secure booking request
    </span>

</div>

        </div>
      </div>
    </div>
  </div>

  {{-- MAIN GRID --}}
  <div class="pro-grid">

    {{-- LEFT: Details, places, ratings, related --}}
    <div>

      {{-- ABOUT + DESCRIPTION --}}
      <div class="section-card mt-3">
        <div class="section-head">
          <h5 class="section-title">
            <i class="bi bi-info-circle-fill text-warning"></i>
            About & Description
          </h5>
        </div>
        <div class="section-body">
          @include('eventscape.professional.professional_show.prof_details')
        </div>
      </div>

      {{-- SERVICE PLACES --}}
      <div class="section-card mt-3">
        <div class="section-head">
          <h5 class="section-title">
            <i class="bi bi-geo-alt-fill text-warning"></i>
            Service Places
          </h5>
        </div>
        <div class="section-body">
          @include('eventscape.professional.professional_show.prof_places')
        </div>
      </div>

      {{-- RELATED --}}
      <div class="section-card mt-3">
        <div class="section-head">
          <h5 class="section-title">
            <i class="bi bi-people-fill text-warning"></i>
            Related Professionals
          </h5>
        </div>
        <div class="section-body">
          <div class="cards-rail">
            @forelse ($suggest as $s)
              <div class="card border-0 shadow-sm text-center item-card">
                <a href="{{ route('prof.professional', $s->id) }}" class="text-decoration-none text-dark">
                  <img src="{{ asset($s->prof_logo ?? 'images/default.jpg') }}"
                       alt="{{ $s->companyname }}"
                       class="card-img-top"
                       style="object-fit: cover; height: 160px;"
                       loading="lazy">

                  <div class="card-body p-3 text-start">
                    <div class="fw-bold text-truncate" title="{{ $s->companyname }}">
                      {{ $s->companyname }}
                    </div>
                    <div class="text-muted small mb-1">{{ $s->professionlist->name }}</div>

                    @if (!empty($s->proserviceplace))
                      <div class="small text-secondary">
                        <i class="bi bi-geo-alt"></i>
                        {{ collect($s->proserviceplace)->pluck('name')->join(', ') }}
                      </div>
                    @endif
                  </div>
                </a>
              </div>
            @empty
              <p class="text-muted mb-0">No other professionals found for this category.</p>
            @endforelse
          </div>
        </div>
      </div>

      {{-- RATINGS --}}
      <div class="section-card mt-3" id="venue_ratings">
        <div class="section-head">
          <h5 class="section-title">
            <i class="bi bi-star-fill text-warning"></i>
            Client Reviews
          </h5>
        </div>
        <div class="section-body">
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
            <p class="text-muted mb-0">This professional has no ratings yet.</p>
          @endif
        </div>
      </div>

    </div>

    {{-- RIGHT: Sticky booking summary --}}
    <div class="sticky-col mt-3">
      <div class="section-card">
        <div class="section-head">
          <h5 class="section-title">
            <i class="bi bi-calendar2-check-fill text-warning"></i>
            Booking Summary
          </h5>
        </div>
        <div class="section-body book-card">
          <div class="price-box mb-3">
            <div>
              <div class="stat-label">Price per hour</div>
              <div class="price-big">RM {{ number_format($professional->price, 2) }}</div>
            </div>
            <i class="bi bi-cash-coin" style="font-size: 1.5rem; color: var(--brand-warn);"></i>
          </div>

          <div class="muted mb-3">
            <i class="bi bi-info-circle me-1"></i>
            Submit your preferred date & time. The professional will follow up for confirmation.
          </div>

          <a class="btn btn-warning w-100 pro-book-btn d-inline-flex align-items-center justify-content-center"
             href="#"
             data-bs-toggle="modal"
             data-bs-target="#exampleModal" style="background-color: #ef5350; color: fff;">
            <i class="bi bi-calendar-check me-2"></i>
            Book This Professional
          </a>

          <hr class="my-3">

          <div class="small text-secondary">
            <div class="d-flex gap-2 mb-2">
              <i class="bi bi-shield-lock-fill text-warning"></i>
              <span>Secure booking request</span>
            </div>
            <div class="d-flex gap-2">
              <i class="bi bi-chat-dots-fill text-warning"></i>
              <span>Quick response recommended</span>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

{{-- MODAL --}}
@extends('components.modal')
@section('modal_title','Select Date & Time')

@section('modal_body')
  @php $route = Request::segment(4); @endphp

  <form action="{{ route('prof.book', $route) }}" method="POST"
        class="p-3 border rounded-3 shadow-sm bg-light">
    @csrf

    <div class="mb-3">
      <label for="s" class="form-label fw-semibold text-primary">Start Date & Time</label>
      <input type="text" name="order_date" id="s"
             class="form-control border-primary shadow-sm s"
             placeholder="Select start"
             required
             style="height:45px; border-radius:10px;">
    </div>

    <div class="mb-3">
      <label for="e" class="form-label fw-semibold text-primary">End Date & Time</label>
      <input type="text" name="upto_date" id="e"
             class="form-control border-primary shadow-sm e"
             placeholder="Select end"
             required
             style="height:45px; border-radius:10px;">
    </div>

    <div class="d-grid mt-4">
      <button type="submit"
              class="btn btn-success fw-semibold py-2"
              style="border-radius:10px; font-size:16px;">
        <i class="bi bi-check-circle me-1"></i>
        Submit Booking
      </button>
    </div>
  </form>
@endsection

@push('scripts')
{{-- flatpickr --}}
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/material_blue.css">
<script src="{{ asset('manual_js/flatpicker.js') }}" defer></script>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const heartBtn = document.querySelector("#prof_heart");
    if (!heartBtn) return;

    const userId = heartBtn.dataset.id;
    const isLikedInitial = heartBtn.dataset.liked === "1";

    // Init state
    if (isLikedInitial) {
        heartBtn.classList.add("liked");
        heartBtn.querySelector("i").classList.replace("bi-heart", "bi-heart-fill");
        heartBtn.querySelector(".heart-text").textContent = "";
    }

    heartBtn.addEventListener("click", async () => {
        if (!userId) {
            alert("Please login to save this professional.");
            return;
        }

        const url = window.location.href + "/heart";
        const liked = heartBtn.classList.contains("liked");

        heartBtn.classList.add("loading");

        try {
            const res = await fetch(url, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({
                    professional_id: "{{ $professional->id }}",
                    like: liked ? "no" : "yes"
                })
            });

            await res.json();

            // Toggle UI
            heartBtn.classList.toggle("liked");
            heartBtn.classList.add("animate");

            const icon = heartBtn.querySelector("i");
            const text = heartBtn.querySelector(".heart-text");

            if (!liked) {
                icon.classList.replace("bi-heart", "bi-heart-fill");
                text.textContent = "";
            } else {
                icon.classList.replace("bi-heart-fill", "bi-heart");
                text.textContent = "";
            }

            setTimeout(() => {
                heartBtn.classList.remove("animate");
            }, 250);

        } catch (e) {
            console.error("Heart action failed", e);
            alert("Something went wrong. Please try again.");
        } finally {
            heartBtn.classList.remove("loading");
        }
    });
});
</script>

@endpush
@endsection
