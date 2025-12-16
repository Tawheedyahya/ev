@extends('welcome')
@section('title')
    Home Dashboard
@endsection

@push('styles')
<style>

/* =========================================
   HERO BANNER — EXACT WTC LOOK
========================================= */

.hero-banner {
    position: relative;
    width: 100%;
    height: 85vh;
    overflow: hidden;
}

.hero-banner img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.hero-banner .overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.55);
}

/* CENTER CONTENT — PROPER WTC POSITION */
.hero-content {
    position: absolute;
    top: 45%; /* Corrected height */
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    width: 55%; /* WTC uses 50–60% width */
}

/* MAIN HEADING — MATCH WTC SIZE */
.hero-content h1 {
    font-size: 35px; /* Reduced */
    font-weight: 700;
    font-family: Playfair Display;
    color: white;
    line-height: 1.25;
    margin-bottom: 18px;
    text-transform: none; /* Remove all caps */
}

/* SUBTEXT */
.hero-content p {
    font-size: 18px;
    color: #e6e6e6;
    margin-bottom: 28px;
}

/* BUTTONS ROW */
.cta-buttons {
    display: flex;
    justify-content: center;
    gap: 14px;
}

/* BUTTON STYLE EXACT LIKE WTC */
.outline-btn1 {
    text-align: center;
    background: #EB4D4B;
    color: white !important;
    padding: 8px 20px;
    border-radius: 30px;
    font-weight: 600;
    text-transform: uppercase;
    margin-right: 15px;
    border: none;
    display: flex;
    justify-content: center;
    align-items: center;
}

.outline-btn {
    border: 2px solid #fff;
    padding: 10px 28px; /* Reduced */
    border-radius: 30px;
    color: #fff !important;
    font-weight: 600;
    font-size: 14px;
    letter-spacing: 0.5px;
    transition: 0.3s ease-in-out;
}

.outline-btn:hover {
    background: #fff;
    color: #000 !important;
}

/* Remove the bottom "Why Choose Us?" spacing problem */
.extra-content {
    margin-top: 40px;
}

.extra-content h3 {
    font-size: 24px;
    font-weight: 600;
}
</style>
@endpush

@section('content')

{{-- ===============================
     HERO BANNER SECTION
================================= --}}
<div class="hero-banner">

    <img src="{{ asset('ev_photos/view-white-guest-chairs-decorated-ceremonial-archway-open-air-sunny-day.jpg') }}"
         alt="Banner" loading="lazy">

    <div class="overlay"></div>

    <div class="hero-content">

        <h1>Plan Exceptional Events With Confidence and Convenience</h1>

        <p>Discover verified venues, reliable vendors, and skilled event specialists all in one seamless platform.</p>

        <div class="cta-buttons">
            <a class="outline-btn" href="{{ url('/eventspace/venues_provider/dashboard') }}">PLAN YOUR EVENT</a>
            <a class="outline-btn1" href="{{ url('/customer/login_form') }}">REGISTER YOUR PROFILE</a>
        </div>

    </div>

</div>



{{-- EVERYTHING BELOW THIS = UNTOUCHED CONTENT --}}
<div class="occasions mt-3 section-padding fade-in-section" style="width: 95%; margin: 0 auto;padding-top: 1px;">
    {{-- <div class="occasion-heading mb-5">
        <h2 class="mt-5 title-with-underline title-animated">Most Viewed Occasions</h2>
    </div> --}}
    <div class="occasions-body mb-5">
        @include('components.occasions')
    </div>
</div>

<div class="category fade-in-section">
    @include('home.category')
</div>

<div class="category-show section-padding fade-in-section" style="width: 95%; margin: 0 auto;padding-top: 1px;">
    @include('home.category_show', ['category' => $venues])
</div>

<div class="work fade-in-section">
    @include('home.work')
</div>

@endsection
