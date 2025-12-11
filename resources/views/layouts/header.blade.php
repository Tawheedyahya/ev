<style>
    /* CSS for the Sticky Header */
.sticky-header {
    position: sticky;
    top: 0; /* This makes the header stick to the top of the page */
    z-index: 1000; /* Ensures the header stays on top of other elements */
    background-color: #f8f9fa; /* Light background for header */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Optional: Shadow for a nice effect */
    padding: 20px 0;
}

/* Navbar Styling */
.navbar {
    padding: 0;
    margin: 0;
}

/* Navbar List Styling */
.navbar-nav {
    list-style: none;
    display: flex;
    justify-content: center;
    margin: 0;
    padding: 0;
}

/* Navbar Item Styling */
.nav-item {
    margin-right: 30px;
    transition: transform 0.3s ease;
}

/* Navbar Link Styling */
.nav-link {
    color: #343a40;
    font-size: 16px;
    font-weight: bold;
    transition: color 0.3s ease, transform 0.3s ease;
}

/* Hover Effect for Navbar Links */
.nav-link:hover {
    color: #007bff;
    transform: scale(1.1);
}

/* Active Link Styling */
#nav-active {
    color: #007bff !important;
    text-decoration: underline;
}

/* Button Styling */
.normal-btn {
    background-color: #28a745;
    color: white;
    padding: 12px 24px;
    margin: 10px;
    border-radius: 30px;
    font-weight: bold;
    transition: background-color 0.3s, transform 0.3s;
}

/* Hover effect for button */
.normal-btn:hover {
    background-color: #218838;
    transform: scale(1.05);
}

</style>
<header class="sticky-header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid py-2 px-3">
            <!-- Brand -->
            <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                <img src="{{ asset('ev_photos/logo.png') }}" alt="Logo" height="50" width="100" class="img-fluid">
            </a>

            <!-- Toggler -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav"
                aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Collapsible Nav -->
            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav mx-lg-auto mt-2 mt-lg-0 lg-gap-5  align-items-lg-center">
                    <li class="nav-item" style="margin: 10px;">
                        <a class="nav-link text-dark" @if(request()->is('home*')) id="nav-active" @endif href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" @if(request()->is('eventspace*')) id="nav-active"  @endif href="{{url('/eventspace/venues_provider/dashboard')}}">Event Plan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" @if(request()->is('aboutus*')) id="nav-active"  @endif href="{{url('/aboutus/dashboard')}}">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" @if(request()->is('contactus*')) id="nav-active"  @endif href="{{url('/contactus/dashboard')}}">Contact Us</a>
                    </li>
                </ul>

                <a href="{{url('/vendor/venue_login_form')}}" class="btn normal-btn">Register as Vendor</a>
                <a href="{{url('/customer/login_form')}}" class="bg-dark text-white rounded-circle d-flex justify-content-center align-items-center" style="width: 40px; height: 40px; font-size: 18px;">
                    <i class="bi bi-person-fill"></i>
                </a>
            </div>
        </div>
    </nav>
</header>
