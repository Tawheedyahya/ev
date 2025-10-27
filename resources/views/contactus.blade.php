@extends('welcome')
@section('title','about us')
@section('content')
{{-- resources/views/vr.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Grow Your Event Business</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      color: #333;
      background: #fff;
    }

    /* Hero Section */

    /* body {
    margin: 0;
    font-family: 'Poppins', sans-serif;
  } */

    .hero {
      position: relative;
      background: url('{{ asset('ev_photos/contacts_us.jpg') }}') no-repeat center center/cover;
      height: 90vh;
      display: flex;
      align-items: center;
      justify-content: flex-start;
      overflow: hidden;
      padding-left: 0px;
      padding-right: 50px;
    }

    .hero-box {
      background: rgba(255, 255, 255, 0.92);
      border-radius: 0 25px 25px 0;
      padding: 60px 70px;
      max-width: 600px;
      /* margin-right: auto; */
      box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    }

    .hero-box h1 {
      font-size: 36px;
      font-weight: 800;
      line-height: 1.2;
      margin: 0 0 10px 0;
      color: #1a1a1a;
    }

    .hero-box p {
      font-size: 22px;
      font-weight: 400;
      color: #444;
      margin-bottom: 25px;
    }

    .register-btn {
      display: inline-block;
      background: #F7931E;
      color: #ffffff;
      font-weight: 700;
      padding: 12px 25px;
      border-radius: 6px;
      font-size: 16px;
      border: none;
      cursor: pointer;
      text-decoration: none;
      box-shadow: 0 4px 10px rgba(0,0,0,0.15);
      transition: 0.25s ease-in-out;
    }

    .register-btn:hover {
      background: #e67c10;
    }

    .floating-icon {
      position: absolute;
      bottom: -15px;
      left: 48%;
      transform: translateX(-50%);
      background: #f25c26;
      color: #fff;
      border-radius: 50%;
      width: 40px;
      height: 40px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 700;
      font-size: 18px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    }

    @media (max-width: 768px) {
      .hero {
        height: 70vh;
        padding: 30px;
        justify-content: center;
      }
      .hero-box {
        padding: 30px;
        max-width: 100%;
      }
      .hero-box h1 {
        font-size: 26px;
      }
      .hero-box p {
        font-size: 18px;
      }
    }

    /* Why Choose Us */
    .why-choose-us {
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 80px 100px;
      gap: 60px;
    }

    .image-stack {
      position: relative;
      width: 320px;
      height: 250px;
    }

    .image-stack img:first-child {
      width: 230px;
      height: 160px;
      object-fit: cover;
      position: absolute;
      top: 0;
      left: 0;
      border-radius: 8px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    }

    .image-stack img:last-child {
      width: 230px;
      height: 160px;
      object-fit: cover;
      position: absolute;
      bottom: 0;
      right: 0;
      border-radius: 8px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    }

    .text-content {
      max-width: 500px;
    }

    .text-content h2 {
      font-size: 28px;
      font-weight: 700;
      color: #000;
      margin-bottom: 15px;
    }

    .text-content p {
      color: #555;
      font-size: 16px;
      line-height: 1.7;
      margin: 0;
    }

    /* Responsive */
    @media (max-width: 900px) {
      .why-choose-us {
        flex-direction: column;
        text-align: center;
        padding: 50px 30px;
      }
      .image-stack {
        margin-bottom: 30px;
      }
    }

    /* Why Join Us */
    .why-join-us {
      background: #f9f9f9;
      padding: 80px 20px;
      text-align: center;
    }

    .why-join-us h2 {
      font-size: 24px;
      font-weight: 700;
      margin-bottom: 50px;
      color: #1a1a1a;
    }

    .why-join-wrapper {
      display: flex;
      justify-content: center;
      gap: 120px;
      flex-wrap: wrap;
    }

    .join-item {
      text-align: center;
      width: 200px;
    }

    .join-icon {
      width: 110px;
      height: 110px;
      background: #f7931d; /* same orange circle */
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 20px auto;
    }

    .join-icon i {
      color: #fff;
      font-size: 38px;
    }

    .join-item p {
      color: #3a3a3a;
      font-size: 16px;
      font-weight: 500;
    }

    /* Mobile responsive */
    @media(max-width:768px) {
      .why-join-wrapper {
        gap: 40px;
      }
    }

    /* Testimonials */
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    /* ===== Testimonials Slider (CSS-only) ===== */
    .testimonials { padding: 70px 20px; text-align: center; }
    .testimonials h2 { font-size: 26px; font-weight: 700; letter-spacing: .5px; margin: 0 0 28px; text-align: center; padding: 40px; }

    .t-slider { position: relative; max-width: 1200px; margin: 0 auto; }

    /* Horizontal scroll track with snap */
    .t-track {
      display: flex;
      gap: 22px;
      overflow-x: auto;
      padding: 10px 10px 24px;
      scroll-snap-type: x mandatory;
      scroll-behavior: smooth;
      -webkit-overflow-scrolling: touch;
    }

    /* Hide scrollbars (Chrome/Safari/Firefox) */
    .t-track::-webkit-scrollbar { display: none; }
    .t-track { scrollbar-width: none; }

    /* Cards */
    .t-card {
      flex: 0 0 clamp(260px, 28vw, 320px);
      background: #fff;
      border-radius: 14px;
      box-shadow: 0 10px 28px rgba(0,0,0,.06);
      padding: 18px;
      scroll-snap-align: start;
      text-align: left;
    }

    .t-head { display: flex; align-items: center; gap: 12px; margin-bottom: 8px; }
    .t-head img { width: 46px; height: 46px; border-radius: 50%; object-fit: cover; }
    .t-head h4 { margin: 0; font-size: 18px; font-weight: 700; color: #1c1c1c; }
    .t-stars { color: #f5a623; font-size: 12px; margin-top: 3px; }
    .t-card p { color: #5b5b5b; font-size: 14px; line-height: 1.6; margin: 8px 0 0; }

    /* Edge fades to hint scrolling */
    .t-fade {
      position: absolute; top: 0; bottom: 0; width: 56px; pointer-events: none;
      background: linear-gradient(to right, rgba(255,255,255,1), rgba(255,255,255,0));
    }

    .t-left { left: 0; }
    .t-right { right: 0; transform: scaleX(-1); }

    @media(max-width:768px) {
      .t-card { flex-basis: 78%; } /* ~1.2 cards on mobile */
    }

    /* How It Works */
    /* .how {
      text-align: center;
      padding: 60px 20px;
      background: #fafafa;
    }
    .how h2 {
      margin-bottom: 10px;
    }
    .steps {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
      gap: 20px;
      margin-top: 30px;
    }
    .step {
      background: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }
    .step i {
      font-size: 28px;
      color: #0091ff;
      margin-bottom: 10px;
    } */

    /* Easy Section */
    .easy {
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 80px 100px;
      gap: 60px;
      background: #fff;
    }

    .easy-text {
      max-width: 420px;
    }

    .easy-text h2 {
      font-size: 28px;
      font-weight: 700;
      color: #000;
      margin-bottom: 15px;
      line-height: 1.3;
    }

    .easy-text p {
      color: #555;
      font-size: 16px;
      line-height: 1.7;
      margin-bottom: 25px;
    }

    @media (max-width: 900px) {
      .easy {
        flex-direction: column-reverse;
        text-align: center;
        padding: 50px 30px;
      }
      .easy img {
        width: 100%;
        max-width: 350px;
      }
    }

    /* Responsive */
    @media (max-width: 768px) {
      .choose, .easy {
        flex-direction: column;
        text-align: center;
      }
      .hero {
        padding: 30px;
      }
      .hero-content {
        max-width: 100%;
      }
    }
  </style>
</head>
<body>

  <!-- Hero -->
  <section class="hero">
    <div class="hero-box">
      <h1>GROW YOUR<br>EVENT BUSINESS</h1>
      <p>Get more bookings</p>
      <div style="position: relative; display: inline-block;">
        <a href="#" class="register-btn">REGISTER AS VENDOR</a>
        <!-- <div class="floating-icon">T</div> -->
      </div>
    </div>
  </section>

  <!-- Why Choose Us -->
  <section class="why-choose-us">
    <div class="image-stack">
      <img src="{{ asset('ev_photos/ytoimg.jpg') }}" alt="Event Image 1">
      <img src="{{ asset('ev_photos/ytoimg.jpg') }}" alt="Event Image 2">
    </div>
    <div class="text-content">
      <h2>Why Choose Us?</h2>
      <p>We help event professionals like you connect directly with thousands of potential clients — from weddings and parties to corporate events. Showcase your best work, get discovered easily, and grow your brand with confidence.</p>
    </div>
  </section>

  <!-- Why Join Us -->
  <section class="why-join-us">
    <h2>WHY JOIN US</h2>
    <div class="why-join-wrapper">
      <div class="join-item">
        <div class="join-icon">
          <i class="fas fa-search"></i>
        </div>
        <p>Reach more Clients</p>
      </div>
      <div class="join-item">
        <div class="join-icon">
          <i class="fas fa-arrow-up"></i>
        </div>
        <p>Higher Visibility</p>
      </div>
      <div class="join-item">
        <div class="join-icon">
          <i class="fas fa-chart-bar"></i>
        </div>
        <p>Grow your brand</p>
      </div>
    </div>
  </section>

  <!-- Testimonials -->
  <section class="testimonials" id="testimonials">
    <h2>TESTIMONIALS</h2>
    <div class="t-slider">
      <span class="t-fade t-left"></span>
      <div class="t-track">
        <!-- Card 1 -->
        <article class="t-card">
          <header class="t-head">
            <img src="https://randomuser.me/api/portraits/women/65.jpg" alt="Reviewer">
            <div>
              <h4>Lorem Ipsum</h4>
              <div class="t-stars">
                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
              </div>
            </div>
          </header>
          <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it...</p>
        </article>

        <!-- Card 2 -->
        <article class="t-card">
          <header class="t-head">
            <img src="https://randomuser.me/api/portraits/men/12.jpg" alt="Reviewer">
            <div>
              <h4>Lorem Ipsum</h4>
              <div class="t-stars">
                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
              </div>
            </div>
          </header>
          <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it...</p>
        </article>

        <!-- Card 3 -->
        <article class="t-card">
          <header class="t-head">
            <img src="https://randomuser.me/api/portraits/men/77.jpg" alt="Reviewer">
            <div>
              <h4>Lorem Ipsum</h4>
              <div class="t-stars">
                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
              </div>
            </div>
          </header>
          <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it...</p>
        </article>

        <!-- Card 4 -->
        <article class="t-card">
          <header class="t-head">
            <img src="https://randomuser.me/api/portraits/women/22.jpg" alt="Reviewer">
            <div>
              <h4>Lorem Ipsum</h4>
              <div class="t-stars">
                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
              </div>
            </div>
          </header>
          <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it...</p>
        </article>

        <!-- Card 5 -->
        <article class="t-card">
          <header class="t-head">
            <img src="https://randomuser.me/api/portraits/men/28.jpg" alt="Reviewer">
            <div>
              <h4>Lorem Ipsum</h4>
              <div class="t-stars">
                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
              </div>
            </div>
          </header>
          <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it...</p>
        </article>

        <!-- Card 6 -->
        <article class="t-card">
          <header class="t-head">
            <img src="https://randomuser.me/api/portraits/women/5.jpg" alt="Reviewer">
            <div>
              <h4>Lorem Ipsum</h4>
              <div class="t-stars">
                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
              </div>
            </div>
          </header>
          <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it...</p>
        </article>
      </div>
      <span class="t-fade t-right"></span>
    </div>
  </section>

  <!-- How It Works -->
  <section style="background:#f7f7f7; border-radius:18px; padding:80px 40px; width:95%; margin:80px auto;">
    <div style="max-width:1050px; margin:auto; padding:80px 20px; display:flex; align-items:center; justify-content:space-between; gap:40px; flex-wrap:wrap;">
      <!-- Left Text -->
      <div style="flex:1; min-width:320px;">
        <h2 style="font-size:32px; font-weight:800; color:#000; margin-bottom:15px; line-height:1.3;">
          How It Works?<br>Your Journey to<br>More Event Bookings
        </h2>
        <p style="font-size:16px; color:#555; line-height:1.6; margin-top:20px;">
          Let your services shine and connect with the right clients, here’s how
        </p>
      </div>

      <!-- Right Steps -->
      <div style="flex:1; min-width:320px; display:grid; grid-template-columns:repeat(2, 1fr); gap:25px;">
        <div style="background:#fff; border-radius:12px; padding:35px 20px; text-align:center; box-shadow:0 3px 20px rgba(0,0,0,0.08);">
          <i class="fas fa-edit" style="font-size:38px; color:#f7931d; margin-bottom:15px;"></i>
          <p style="font-size:16px; font-weight:600; margin:0;">Sign Up<br>for Free</p>
        </div>

        <div style="background:#fff; border-radius:12px; padding:35px 20px; text-align:center; box-shadow:0 3px 20px rgba(0,0,0,0.08);">
          <i class="fas fa-address-card" style="font-size:38px; color:#f7931d; margin-bottom:15px;"></i>
          <p style="font-size:16px; font-weight:600; margin:0;">Build Your<br>Profile</p>
        </div>

        <div style="background:#fff; border-radius:12px; padding:35px 20px; text-align:center; box-shadow:0 3px 20px rgba(0,0,0,0.08);">
          <i class="fas fa-eye" style="font-size:38px; color:#f7931d; margin-bottom:15px;"></i>
          <p style="font-size:16px; font-weight:600; margin:0;">Appear in<br>Searches</p>
        </div>

        <div style="background:#fff; border-radius:12px; padding:35px 20px; text-align:center; box-shadow:0 3px 20px rgba(0,0,0,0.08);">
          <i class="fas fa-calendar-check" style="font-size:38px; color:#f7931d; margin-bottom:15px;"></i>
          <p style="font-size:16px; font-weight:600; margin:0;">Get<br>Bookings</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Easy Section -->
  <section class="easy">
    <div class="easy-text">
      <h2>We Know You’re Busy,<br>That’s Why We Made It Easy</h2>
      <p>We know you're juggling multiple clients, setups, and timelines. That's why our platform makes it easy to manage inquiries and convert them into confirmed bookings — all in one place.</p>
      <a href="#" class="register-btn" style="background:#f7941d; color:white; text-decoration:none; padding:12px 25px; border-radius:6px; font-weight:600; display:inline-block;">REGISTER AS VENDOR</a>
    </div>

    <div style="flex-shrink:0;">
      <img src="{{ asset('ev_photos/eventlady.jpg') }}" alt="Event Lady" style="width:350px; border-radius:20px; box-shadow:0 4px 20px rgba(0,0,0,0.1);">
    </div>
  </section>

</body>
</html>
@endsection
