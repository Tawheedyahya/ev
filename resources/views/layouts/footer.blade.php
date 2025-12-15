<footer style="background: linear-gradient(90deg, #ff6a00, #f7b733); text-align:center;" class="container-fluid pt-4 pt-md-5">
  <div class="container-fluid px-3 px-md-4">
    <div class="row gy-4">

      <!-- Left Column -->
      <div class="col-12 col-sm-6 col-md-3" style="text-align:center;">
        <ul class="list-unstyled small mb-3">
          <li class="mb-2 fw-bold text-uppercase"><a href="{{route('eventspace.dashboard')}}">Venues</a></li>
          <li class="mb-2 fw-bold text-uppercase"><a href="{{route('serpro.dashboard')}}">Service Provider</a></li>
          <li class="mb-2 fw-bold text-uppercase"><a href="{{route('prof.dashboard')}}">Professionals</a></li>
        </ul>

        <?php
            function format_url($url) {
                $url = trim($url);
                if (empty($url)) return '#';
                if (preg_match("/^https?:\/\//i", $url)) return $url;
                return '#';
            }
        ?>

        <!-- Social Icons -->
        <div class="d-flex gap-3 justify-content-center footer-social" style="justify-content:center;">
            <a href="@if (!empty($footer['x'])){{format_url($footer['x'])}}@else#@endif" aria-label="X"><i class="bi bi-x"></i></a>
            <a href="@if (!empty($footer['fb'])){{format_url($footer['fb'])}}@else#@endif" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
            <a href="@if (!empty($footer['ins'])){{format_url($footer['ins'])}}@else#@endif" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
            <a href="@if (!empty($footer['vimeo'])){{format_url($footer['vimeo'])}}@else#@endif" aria-label="Vimeo"><i class="bi bi-vimeo"></i></a>
            <a href="@if (!empty($footer['yt'])){{format_url($footer['yt'])}}@else#@endif" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
        </div>
      </div>

      <!-- Middle Column -->
      <div class="col-12 col-sm-6 col-md-3" style="text-align:center;">
        <ul class="list-unstyled small mb-0">
          <li class="mb-2"><a href="{{url('/vendor/venue_login_form')}}" class="text-decoration-none opacity-75">Vendor Login</a></li>
          <li class="mb-2"><a href="{{url('/terms')}}" class="text-decoration-none opacity-75">Terms & Conditions</a></li>
          <li class="mb-2"><a href="{{url('/terms')}}" class="text-decoration-none opacity-75">Privacy Policy</a></li>
        </ul>
      </div>

      <!-- Right Column -->
      <div class="col-12 col-md-6" style="text-align:center;">
        <small class="d-block opacity-75">
          By subscribing you agree to the
          <a href="{{url('/terms')}}" class="text-decoration-underline">Terms of Use</a> &
          <a href="{{url('/terms')}}" class="text-decoration-underline">Privacy Policy</a>.
        </small>
      </div>

    </div>

    <div class="border-top border-light mt-4 pt-3">
      <p class="small mb-0 text-center text-light">© {{ date('Y') }} Event Asia. All rights reserved.</p>
    </div>
  </div>
</footer>


<style>

  /* General Hover */
  footer a:hover {
    opacity: 1 !important;
    color: black !important;
    transition: color 0.3s ease, opacity 0.3s ease;
  }
  footer a{
    color: black !important;
  }

  /* MOBILE FIX */
  @media (max-width: 767.98px) {
    footer { text-align: center; }
    footer .d-flex { justify-content: center !important; }
    footer a { display: inline-block; padding: 6px 4px; }
  }

  /* ------------------------------ */
  /* PREMIUM SOCIAL ICON STYLING   */
  /* ------------------------------ */

  .footer-social a {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 42px;
      height: 42px;
      border-radius: 12px;
      background: white !important;
      box-shadow: 0 3px 12px rgba(255, 94, 0, 0.25);
      transition: all 0.35s ease;
      /* background: linear-gradient(90deg, #ff6a00, #f7b733); */
      color: linear-gradient(90deg, #ff6a00, #f7b733) !important;
  }

  .footer-social a:hover {
      transform: translateY(-4px) scale(1.08);
      box-shadow: 0 5px 18px rgba(255, 94, 0, 0.45);
      background: linear-gradient(135deg, #ff9e42, #ff6a00);
  }

  .footer-social i {
      font-size: 1.2rem;
      color: linear-gradient(90deg, #ff6a00, #f7b733) !important;
  }

  /* MOBILE SPACING FIX */
  @media (max-width: 768px) {
      .footer-social a {
          margin: 0 4px;
      }
  }

</style>
