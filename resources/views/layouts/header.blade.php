<style>
/* ===========================
   GLOBAL HEADER STYLE
=========================== */
.sticky-header {
    position: sticky;
    top: 0;
    z-index: 1050;
    background: #ffffff;
    padding: 6px 0;
    border-bottom: 1px solid #ececec;
}

/* NAVBAR BASE */
.navbar {
    padding: 0 !important;
}

.navbar .container-fluid {
    display: flex;
    align-items: center;
}

/* LOGO */
.navbar-brand {
    margin-right: auto;
}

.navbar-brand img {
    height: 55px;
}

/* DEFAULT MENU FOR DESKTOP */
.navbar-collapse {
    flex-grow: unset !important;
}

.navbar-nav {
    display: flex;
    align-items: center;
    gap: 30px;
    margin-right: 20px;
}

/* DESKTOP MENU LINKS */
.navbar-nav .nav-link {
    font-size: 16px;
    font-weight: 700;
    color: #333;
    text-transform: uppercase;
    padding: 0 !important;
}

.navbar-nav .nav-link.active,
.navbar-nav .nav-link:hover {
    color: #e85b27 !important;
}

/* CTA BUTTON */
.plan-btn {
    background: #EB4D4B;
    color: #fff !important;
    padding: 10px 22px;
    border-radius: 30px;
    font-weight: 600;
    text-transform: uppercase;
    border: none;
}

/* USER ICON */
.account-icon-btn {
    width: 42px;
    height: 42px;
    background: #e5e7eb;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 20px;
    color: #333;
    transition: 0.3s ease;
    margin-left: 10px;
}

.account-icon-btn:hover {
    background: #d1d5db;
}

/* =============================
   MOBILE VERSION FIX
============================= */
@media (max-width: 991px) {

    /* Stack items vertically */
    .navbar-collapse {
        width: 100%;
        padding-top: 10px;
        padding-bottom: 20px;
    }

    .navbar-nav {
        flex-direction: column;
        align-items: flex-start;
        gap: 18px;
        width: 100%;
        padding-left: 15px;
        margin-bottom: 15px;
    }

    /* CTA inside menu, full width */
    .plan-btn {
        width: 90%;
        margin: 10px auto;
        text-align: center;
        padding: 12px 0;
        display: block;
    }

    /* USER ICON centered */
    .account-icon-btn {
        margin: 10px auto 15px auto;
        width: 45px;
        height: 45px;
    }

    /* Improve toggler spacing */
    .navbar-toggler {
        margin-left: auto;
        border: none !important;
    }
}


</style>
<header class="sticky-header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">

            <!-- LOGO -->
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('ev_photos/logo.png') }}" alt="Logo">
            </a>

            <!-- MOBILE TOGGLER -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#mainNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- COLLAPSE CONTENT -->
            <div class="collapse navbar-collapse" id="mainNav">

                <ul class="navbar-nav">
                    <li><a class="nav-link" href="{{ url('/') }}">HOME</a></li>
                    <li><a class="nav-link" href="{{ url('/eventspace/venues_provider/dashboard') }}">EVENTS</a></li>
                    <li><a class="nav-link" href="{{ url('/aboutus/dashboard') }}">ABOUT</a></li>
                    <li><a class="nav-link" href="{{ url('/contactus/dashboard') }}">CONTACT</a></li>
                </ul>

                <a class="plan-btn" href="{{url('/vendor/venue_login_form')}}">REGISTER AS VENDOR</a>

                <a class="account-icon-btn" href="{{url('/customer/login_form')}}">
                    <i class="bi bi-person"></i>
                </a>

            </div>

        </div>
    </nav>
</header>
