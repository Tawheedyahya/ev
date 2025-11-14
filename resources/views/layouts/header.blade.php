<header class="bg-light shadow-sm">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid py-2 px-3">

            {{-- Brand --}}
            <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                <img src="{{ asset('ev_photos/logo.png') }}" alt="Logo" height="50" width="100" class="img-fluid">
            </a>

            {{-- Toggler --}}
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav"
                aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            {{-- Collapsible Nav --}}
            <div class="collapse navbar-collapse" id="mainNav">
                {{-- Center nav: stacks on mobile, centered on lg+ --}}
                <ul class="navbar-nav mx-lg-auto mt-2 mt-lg-0 lg-gap-5  align-items-lg-center">
                    <li class="nav-item " style="margin: 10px;">
                        <a class="nav-link text-dark" @if(request()->is('home*')) id="nav-active" @endif href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link text-dark" @if(request()->is('eventspace*')) id="nav-active"  @endif href="{{url('/eventspace/venues_provider/dashboard')}}">Event Plan</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link text-dark" @if(request()->is('aboutus*')) id="nav-active"  @endif href="{{url('/aboutus/dashboard')}}">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" @if(request()->is('contactus*')) id="nav-active"  @endif href="{{url('/contactus/dashboard')}}">Contact Us</a>
                    </li>
                </ul>

                {{-- Right: user icon (stays right on lg+, stacks under menu on mobile) --}}
  {{-- REGISTER BUTTON (moved to right) --}}
                    <a href="{{url('/vendor/venue_login_form')}}"
                       class="btn btn-warning me-3 thick-orange me-5"
                       style="padding: 10px 20px; font-weight:600; color:black">
                       Register as Vendor
                    </a>

                    {{-- USER ICON --}}
                    <a href="{{url('/customer/login_form')}}"
                       class="bg-dark text-white rounded-circle d-flex justify-content-center align-items-center"
                       style="width: 40px; height: 40px; font-size: 18px;">
                        <i class="bi bi-person-fill"></i>
                    </a>
                </div>
            </div>
        </div>
    </nav>
</header>
