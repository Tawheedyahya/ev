<footer style="background-color:#fff9e6" class="pt-4 pt-md-5">
  <div class="container-fluid px-3 px-md-4">
    <div class="row gy-4">

      {{-- Left Column --}}
      <div class="col-12 col-md-3">
        <ul class="list-unstyled small mb-3">
          <li class="mb-2"><strong>VENUES</strong></li>
          <li class="mb-2"><strong>SERVICE PROVIDER</strong></li>
          <li class="mb-2"><strong>PROFESSIONALS</strong></li>
        </ul>

        {{-- Social Icons --}}
        <div class="d-flex gap-3">
          <a href="#" class="text-dark" aria-label="X"><i class="bi bi-x"></i></a>
          <a href="#" class="text-dark" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
          <a href="#" class="text-dark" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
          <a href="#" class="text-dark" aria-label="Vimeo"><i class="bi bi-vimeo"></i></a>
          <a href="#" class="text-dark" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
        </div>
      </div>

      {{-- Middle Column --}}
      <div class="col-6 col-md-3">
        <ul class="list-unstyled small mb-0">
          <li class="mb-2"><a href="#" class="text-muted text-decoration-none">Vendor Login</a></li>
          <li class="mb-2"><a href="#" class="text-muted text-decoration-none">FAQ</a></li>
          <li class="mb-2"><a href="#" class="text-muted text-decoration-none">Terms & Conditions</a></li>
          <li class="mb-2"><a href="#" class="text-muted text-decoration-none">Privacy Policy</a></li>
          <li class="mb-2"><a href="#" class="text-muted text-decoration-none">Blog</a></li>
        </ul>
      </div>

      {{-- Right Column --}}
      <div class="col-12 col-md-6">
        {{-- <h6 class="fw-semibold mb-1">JOIN EVENT ASIA</h6>
        <p class="small mb-3">Subscribe for store updates and discounts.</p>

        <form class="d-flex flex-wrap gap-2 mb-2" role="search">
          <input type="email" class="form-control flex-grow-1" placeholder="Enter your email" required>
          <button class="btn btn-outline-dark" type="submit">→</button>
        </form> --}}

        <small class="text-muted d-block">
          By subscribing you agree to the
          <a href="#" class="text-decoration-underline">Terms of Use</a> &
          <a href="#" class="text-decoration-underline">Privacy Policy</a>.
        </small>
      </div>
    </div>

    <div class="border-top mt-4 pt-3">
      <p class="small text-muted mb-0">© {{ date('Y') }} Event Asia. All rights reserved.</p>
    </div>
  </div>
</footer>
