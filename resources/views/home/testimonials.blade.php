<style>
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
</style>

<div class="testimonial-body mt-4">
    <!-- <h5 class="title-shadow-outline text-center">TESTIMONIALS</h5> -->
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
</div>
