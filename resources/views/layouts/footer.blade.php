<footer style="background: #FEF4E8;
 color:black;" class="pt-4 pt-md-5">
  <div class="container-fluid px-3 px-md-4">
    <div class="row gy-4">

      <!-- Left Column -->
      <div class="col-12 col-sm-6 col-md-3 text-center text-md-start">
        <ul class="list-unstyled small mb-3">
          <li class="mb-2 fw-bold text-uppercase"><a href="{{route('eventspace.dashboard')}}">Venues</a></li>
          <li class="mb-2 fw-bold text-uppercase"><a href="{{route('serpro.dashboard')}}">Service Provider</a></li>
          <li class="mb-2 fw-bold text-uppercase"><a href="{{route('prof.dashboard')}}">Professionals</a></li>
        </ul>
        <?php
            function format_url($url) {
                $url = trim($url);

                // If empty → return "#"
                if (empty($url)) {
                    return '#';
                }

                // If already starts with http or https → return as is
                if (preg_match("/^https?:\/\//i", $url)) {
                    return $url;
                }

                // Otherwise add https:// at the front
                return '#';
            }
        ?>
        <!-- Social Icons -->
        <div class="d-flex gap-3 justify-content-center justify-content-md-start">
          <a href="@if (!empty($footer['x'])){{format_url($footer['x'])}}@else#@endif" class=" fs-5" aria-label="X"><i class="bi bi-x"></i></a>
          <a href="@if (!empty($footer['fb'])){{format_url($footer['fb'])}}@else#@endif" class=" fs-5" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
          <a href="@if (!empty($footer['ins'])){{format_url($footer['ins'])}}@else#@endif" class=" fs-5" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
          <a href="@if (!empty($footer['vimeo'])){{format_url($footer['vimeo'])}}@else#@endif" class=" fs-5" aria-label="Vimeo"><i class="bi bi-vimeo"></i></a>
          <a href="@if (!empty($footer['yt'])){{format_url($footer['yt'])}}@else#@endif" class=" fs-5" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
        </div>
      </div>

      <!-- Middle Column -->
      <div class="col-12 col-sm-6 col-md-3 text-center text-md-start">
        <ul class="list-unstyled small mb-0">
          <li class="mb-2"><a href="{{url('/vendor/venue_login_form')}}" class=" text-decoration-none opacity-75">Vendor Login</a></li>
          {{-- <li class="mb-2"><a href="#" class=" text-decoration-none opacity-75">FAQ</a></li> --}}
          <li class="mb-2"><a href="{{url('/terms')}}" class=" text-decoration-none opacity-75">Terms & Conditions</a></li>
          <li class="mb-2"><a href="{{url('/terms')}}" class=" text-decoration-none opacity-75">Privacy Policy</a></li>
          {{-- <li class="mb-2"><a href="#" class=" text-decoration-none opacity-75">Blog</a></li> --}}
        </ul>
      </div>

      <!-- Right Column -->
      <div class="col-12 col-md-6 text-center text-md-start">
        <small class="d-block opacity-75">
          By subscribing you agree to the
          <a href="{{url('/terms')}}" class=" text-decoration-underline">Terms of Use</a> &
          <a href="{{url('/terms')}}" class=" text-decoration-underline">Privacy Policy</a>.
        </small>
      </div>

    </div>

    <div class="border-top border-light mt-4 pt-3">
      <p class="small mb-0 text-center text-light">© {{ date('Y') }} Event Asia. All rights reserved.</p>
    </div>
  </div>
</footer>

<style>
  /* nicer hover & tap targets */
  footer a:hover {
    opacity: 1 !important;
    color: black !important;
    transition: color 0.3s ease, opacity 0.3s ease;
  }
  footer a{
    color: black !important;
  }

  /* mobile tweaks */
  @media (max-width: 767.98px) {
    footer { text-align: center; }
    footer .d-flex { justify-content: center; }
    footer a { display: inline-block; padding: 6px 4px; } /* larger tap targets */
  }
</style>
