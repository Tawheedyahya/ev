<footer style="background:#12151F;" class="container-fluid pt-5">
  <div class="container-fluid px-3 px-md-5">
    <div class="row gy-4 text-center text-md-start">

      <!-- EV.ASIA BRAND -->
      <div class="col-12 col-md-3">
        <h5 class="fw-bold text-light mb-3">EV.asia</h5>
        <p class="small opacity-75 text-light mb-4">
          Your trusted platform for discovering exceptional venues and
          planning unforgettable events across Asia.
        </p>

        <!-- Social Icons -->
        <div class="d-flex gap-3 justify-content-center justify-content-md-start footer-social">
          <a href="{{ $footer['fb'] ?? '#' }}"><i class="bi bi-facebook"></i></a>
          <a href="{{ $footer['ins'] ?? '#' }}"><i class="bi bi-instagram"></i></a>
          <a href="{{ $footer['x'] ?? '#' }}"><i class="bi bi-x"></i></a>
          <a href="{{ $footer['linkedin'] ?? '#' }}"><i class="bi bi-linkedin"></i></a>
        </div>
      </div>

      <!-- EVENT TYPES -->
      <div class="col-12 col-md-3">
        <h6 class="fw-bold text-light mb-3">Event Types</h6>
        <ul class="list-unstyled small opacity-75">
          <li class="mb-2">Weddings</li>
          <li class="mb-2">Corporate Events</li>
          <li class="mb-2">Birthday Parties</li>
          <li class="mb-2">Conferences</li>
          <li class="mb-2">Private Dinners</li>
        </ul>
      </div>

      <!-- QUICK LINKS (KEEPING YOUR EXISTING CONTENT) -->
      <div class="col-12 col-md-3">
        <h6 class="fw-bold text-light mb-3">Quick Links</h6>
        <ul class="list-unstyled small opacity-75">
          <li class="mb-2"><a href="{{route('eventspace.dashboard')}}">Browse Venues</a></li>
          <li class="mb-2"><a href="{{url('/aboutus')}}">About Us</a></li>
          <li class="mb-2"><a href="{{url('/list-your-venue')}}">List Your Venue</a></li>
          <li class="mb-2"><a href="{{url('/vendor/venue_login_form')}}">Become a Vendor</a></li>
        </ul>
      </div>

      <!-- CONTACT US -->
      <div class="col-12 col-md-3">
        <h6 class="fw-bold text-light mb-3">Contact Us</h6>

        <div class="d-flex align-items-start mb-2">
          <i class="bi bi-geo-alt-fill me-2 text-warning"></i>
          <span class="small opacity-75 text-light">
            Level 10, Menara KL,<br>Kuala Lumpur, Malaysia
          </span>
        </div>

        <div class="d-flex align-items-center mb-2">
          <i class="bi bi-telephone-fill me-2 text-warning"></i>
          <span class="small opacity-75 text-light">+603 1234 5678</span>
        </div>

        <div class="d-flex align-items-center">
          <i class="bi bi-envelope-fill me-2 text-warning"></i>
          <span class="small opacity-75 text-light">hello@ev.asia</span>
        </div>
      </div>

    </div>

    <!-- BOTTOM BAR -->
  <div class="footer-divider footer-bottom d-flex justify-content-between align-items-center flex-wrap">
  <p class="mb-0 small">© {{ date('Y') }} EV.asia. All rights reserved.</p>

  <div>
    <a href="{{url('/privacy')}}">Privacy Policy</a>
    <a href="{{url('/terms')}}">Terms of Service</a>
    <a href="{{url('/cookies')}}">Cookie Policy</a>
  </div>
</div>

  </div>
</footer>
<style>
  /* FOOTER BASE */
footer {
  background: linear-gradient(180deg, #0f1424 0%, #0b0f1a 100%);
  color: #cbd5e1;
  font-size: 14px;
}

/* SECTION HEADINGS */
footer h5,
footer h6 {
  color: #ffffff;
  font-weight: 600;
  letter-spacing: 0.3px;
  margin-bottom: 18px;
}

/* BODY TEXT */
footer p,
footer li,
footer span {
  color: #aab1c3;
  line-height: 1.7;
}

/* LINKS */
footer a {
  color: #aab1c3;
  text-decoration: none;
  transition: color 0.25s ease, transform 0.25s ease;
}

footer a:hover {
  color: #ffffff;
  transform: translateX(2px);
}

/* QUICK LINKS LIST */
footer ul {
  padding-left: 0;
}

footer ul li {
  margin-bottom: 10px;
}

/* SOCIAL ICONS */
.footer-social a {
  width: 36px;
  height: 36px;
  border-radius: 10px;
  background: #151a2e;
  display: flex;
  align-items: center;
  justify-content: center;
  box-shadow: inset 0 0 0 1px rgba(255,255,255,0.04);
}

.footer-social i {
  font-size: 1rem;
  color: #cbd5e1;
}

.footer-social a:hover {
  background: #1d2440;
}

/* CONTACT ICONS */
footer .bi {
  font-size: 1rem;
  color: #EB4D4B;
}

/* DIVIDER */
.footer-divider {
  border-top: 1px solid rgba(255,255,255,0.08);
  margin-top: 40px;
  padding-top: 18px;
}

/* BOTTOM LINKS */
.footer-bottom a {
  margin-left: 18px;
  font-size: 13px;
  color: #9aa3b2;
}

.footer-bottom a:hover {
  color: #ffffff;
}

/* MOBILE REFINEMENT */
@media (max-width: 768px) {
  footer {
    text-align: center;
  }

  .footer-social {
    justify-content: center !important;
  }

  footer h5,
  footer h6 {
    margin-top: 20px;
  }

  .footer-bottom {
    flex-direction: column;
    gap: 10px;
  }

  .footer-bottom a {
    margin-left: 0;
  }
}

</style>
