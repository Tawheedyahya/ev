<nav class="sidebar d-flex flex-column">
    <button class="btn btn-outline-primary d-lg-none m-2" id="sbClose" aria-label="Close sidebar"
        style="background-color: white">
        <i class="bi bi-list"></i>
    </button>
    <div class="p-3 d-flex align-items-center">
        <i class="bi bi-briefcase text-white bg-warning p-2 " style="border-radius: 10px;"></i>
<span class="fw-bold text-white ms-2 d-none d-lg-inline title-shadow-glow">
    Professional's Panel
</span>
    </div>
    <div class="flex-grow-1">
        @php
            $request = Request::segment(2);
        @endphp
        <ul class="nav flex-column px-2">
            <li class="nav-item"><a
                    class=" text-white nav-link @if ($request == 'dashboard') active" @else " @endif href="{{ route('professional.dashboard') }}"><i
                        class="bi bi-speedometer2"></i> <span class="">Dashboard</span></a></li>
            <li class="nav-item"><a
                    class="nav-link text-white  @if ($request == 'bookings') active" @else " @endif href="{{route('professional.bookings')}}"><i
                        class="bi bi-calendar-event"></i> <span class="">Bookings</span></a></li>
            {{-- <li class="nav-item"><a
                    class="nav-link text-white  @if ($request == 'bookings') active" @else " @endif href="{{ url('/venue_provider/bookings/dashboard') }}"><i
                        class="bi bi-journal-check"></i> <span class="">Bookings</span></a></li> --}}
            <li class="nav-item"><a
                    class="nav-link text-white  @if ($request == 'ratings') active" @else " @endif href="{{route('pf.ratings')}}"><i
                        class="bi bi-star"></i> <span class="">Ratings</span></a></li>
            <li class="nav-item mt-auto"><a
                    class="nav-link text-white  @if ($request == 'logout') active" @else " @endif href="{{ route('pf.logout') }}"><i
                        class="bi bi-box-arrow-right"></i> <span class="">Logout</span></a></li>
        </ul>
    </div>
</nav>
<style>
/* <style> */
:root {
    --sb-bg: #0f172a;                 /* deep navy */
    --sb-text: #9ca3af;               /* muted text */
    --sb-hover-bg: rgba(255,255,255,0.06);
    --sb-active-bg: rgba(255,255,255,0.08);
    --sb-accent: #ff6a00;             /* brand accent */
}

/* Sidebar base */
.sidebar {
    width: 260px;
    min-height: 100vh;
    background: linear-gradient(180deg, #0f172a, #020617);
    position: fixed;
    top: 0;
    left: 0;
    z-index: 1040;
    transition: transform 0.3s ease;
}

/* Nav link */
.sidebar .nav-link {
    position: relative;
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 12px 14px 12px 18px;
    border-radius: 12px;
    font-size: 0.95rem;
    color: var(--sb-text);
    transition: all 0.25s ease;
}

/* Icon */
.sidebar .nav-link i {
    font-size: 1.1rem;
    color: var(--sb-text);
    transition: color 0.25s ease;
}

/* Hover */
.sidebar .nav-link:hover {
    background: var(--sb-hover-bg);
    color: #ffffff;
}

.sidebar .nav-link:hover i {
    color: #ffffff;
}

/* ACTIVE LINK (VenueAdmin-style) */
.sidebar .nav-link.active {
    background: var(--sb-active-bg);
    color: #ffffff;
    font-weight: 500;

    box-shadow:
        inset 0 0 0 1px rgba(255,255,255,0.08),
        0 8px 20px rgba(0,0,0,0.35);
}

/* Active icon */
.sidebar .nav-link.active i {
    color: #ffffff;
}

/* Left accent bar */
.sidebar .nav-link.active::before {
    content: "";
    position: absolute;
    left: 6px;
    top: 50%;
    transform: translateY(-50%);
    width: 4px;
    height: 60%;
    background: var(--sb-accent);
    border-radius: 6px;
}

/* Mobile behaviour */
@media (max-width: 991px) {
    .sidebar {
        transform: translateX(-100%);
    }

    .sidebar.show {
        transform: translateX(0);
    }

    body.sidebar-open {
        overflow: hidden;
    }

    body.sidebar-open::after {
        content: "";
        position: fixed;
        inset: 0;
        background: rgba(0,0,0,0.45);
        z-index: 1039;
    }
}
</style>
