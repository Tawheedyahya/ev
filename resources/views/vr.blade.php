@extends('welcome')
@section('title','about us')

@section('content')

<style>
  * {
    font-family: "Poppins", sans-serif;
  }

  /* HERO */
  .hero-about {
    position: relative;
    width: 100%;
    height: 350px;
    overflow: hidden;
  }

  .hero-about img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    filter: brightness(80%);
  }

  .hero-about-text {
    position: absolute;
    inset: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
  }

  .hero-about-text h1 {
    font-size: 28px;
    font-weight: 700;
    letter-spacing: 2px;
  }

  /* GENERIC CONTAINER */
.about-container {
    width: 100%;      /* use full screen width */
    max-width: none;  /* remove the 1100px limit */
    margin: 30px 0 0 0;
    padding-bottom: 5px;       /* or e.g. 0 20px if you want a little inner spacing */
    box-sizing: border-box;
    border-spacing: 50px;
}

  /* ABOUT TEXT */
  .about-text h2 {
    font-size: 20px;
    color: #111;
    margin-bottom: 5px;
  }

  .about-text p {
    font-size: 14px;
    color: #555;
    margin: 0px;
    line-height: 1.7;
  }

  /* WHAT SETS US APART */
  .what-sets-us-apart {
    padding: 60px 20px 80px;
    background-color: #ffffff;
  }

  .what-sets-us-apart h2 {
    text-align: center;
    font-size: 20px;
    font-weight: 700;
    letter-spacing: 1px;
    margin-bottom: 45px;
  }

  .wsua-wrapper {
    max-width: 1100px;
    margin: 0 auto;
    display: flex;
    justify-content: center;
    gap: 50px;
    flex-wrap: wrap;
  }

  /* Each side (left/right) */
  .wsua-column {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 14px;
  }

  /* The grey rounded card */
.wsua-card {
    background-color: #f7f7f7;
    border-radius: 18px;
    padding: 35px 40px;
    width: 320px;
    margin-bottom: 20px;

    /* medium visible border */

    /* stronger but still soft shadow */
    /* box-shadow: 0 10px 28px rgba(0,0,0,0.12); */
}


  .wsua-card h3 {
    text-align: center;
    font-size: 13px;
    font-weight: 700;
    color: #2f3a4a;
    text-transform: uppercase;
    margin-bottom: 18px;
    letter-spacing: 0.5px;
  }

  .wsua-box {
    background-color: #ffffff;
    border-radius: 6px;
    padding: 10px 12px;
    font-size: 13px;
    font-weight: 500;
    color: #000;
    margin-bottom: 10px;
    text-align: center;
  }

  /* Button under each card */
  .wsua-cta {
    background-color: #bfe9f5;
    color: #000;
    padding: 10px 30px;
    border-radius: 6px;
    font-weight: 700;
    font-size: 13px;
    text-decoration: none;
    box-shadow: 0 8px 18px rgba(0,0,0,0.18);
    cursor: pointer;
    min-width: 190px;
    text-align: center;
  }

  .wsua-cta:hover {
    filter: brightness(0.95);
  }

  @media (max-width: 768px) {
    .hero-about {
      height: 260px;
    }

    .hero-about-text h1 {
      font-size: 22px;
    }

    .wsua-wrapper {
      flex-direction: column;
      align-items: center;
      gap: 30px;
    }

    .wsua-card {
      width: 100%;
      max-width: 320px;
    }
  }
</style>

{{-- HERO --}}
<section class="hero-about">
  <img src="{{ asset('ev_photos/about banner.jpg') }}" alt="About Us Banner">
  <div class="hero-about-text">
    <h1>ABOUT US</h1>
  </div>
</section>

{{-- ABOUT TEXT --}}
<section class="about-container">
  <div class="about-text">
    <h2>Lorem Ipsum</h2>
    <p>
      We provide a comprehensive platform dedicated to showcasing event venues across all industries. Our mission is to help venue owners enhance their visibility and connect with clients seeking spaces for weddings, corporate functions, private events, and specialised gatherings.
Our platform is designed to present venues with clarity, structure, and professional consistency. Through high-quality profiling and streamlined discovery pathways, we ensure that clients are able to evaluate venues efficiently while venue owners benefit from broadened reach and strengthened market positioning.
By bringing diverse event spaces into a single, trusted portal, we support informed decision-making and provide a seamless connection between venue providers and their potential clients
    </p>
  </div>
</section>

{{-- WHAT SETS US APART --}}
<section class="what-sets-us-apart">
  <h2>WHAT SETS US APART</h2>

  <div class="wsua-wrapper">

    {{-- LEFT COLUMN --}}
    <div class="wsua-column">
      <div class="wsua-card">
        <h3 style="font-size: 16px; font: weight 200px;">FOR COUPLES</h3>
        <div class="wsua-box">PERSONALIZED WEDDING</div>
        <div class="wsua-box">SMART VENDOR MATCHING</div>
        <div class="wsua-box">TRUSTED SERVICES</div>
      </div>
      <a href="{{url('/eventspace/venues_provider/dashboard')}}" class="wsua-cta">START PLANNING</a>
    </div>

    {{-- RIGHT COLUMN --}}
    <div class="wsua-column">
      <div class="wsua-card">
        <h3 style="font-size: 16px; font: weight 200px;">FOR VENDOR PARTNERS</h3>
        <div class="wsua-box">YEAR-ROUND LEADS</div>
        <div class="wsua-box">SMART CRM TOOLS</div>
        <div class="wsua-box">FOCUS ON CREATIVITY</div>
      </div>
      <a href="{{url('/vendor/venue_login_form')}}" class="wsua-cta">REGISTER AS VENDOR</a>
    </div>

  </div>
</section>

@endsection
