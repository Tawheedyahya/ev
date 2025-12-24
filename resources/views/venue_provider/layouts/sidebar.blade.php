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


<nav class="sidebar d-flex flex-column">

    <!-- Mobile close button -->
    <button class="btn btn-outline-light d-lg-none m-2" id="sbClose" aria-label="Close sidebar">
        <i class="bi bi-list"></i>
    </button>

    <!-- Title -->
    <div class="p-3 d-flex align-items-center gap-2">
    <i class="bi bi-building text-white bg-warning fs-4 p-2" style="border-radius: 10px;"></i>
    <span class="fw-semibold text-white d-none d-lg-inline">
        Venue Provider's Panel
    </span>
</div>

    <!-- Menu -->
    <div class="flex-grow-1">
        @php
            $request = Request::segment(2);
        @endphp

        <ul class="nav flex-column px-2">

            <li class="nav-item">
                <a class="nav-link @if ($request == 'venues') active @endif"
                   href="{{ url('/venue_provider/venues/dashbaord') }}">
                    <i class="bi bi-calendar-event"></i>
                    <span>Venues</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link @if ($request == 'bookings') active @endif"
                   href="{{ url('/venue_provider/bookings/dashboard') }}">
                    <i class="bi bi-journal-check"></i>
                    <span>Bookings</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if ($request == 'venue_ratings') active @endif"
                   href="{{ url('/venue_provider/venue_ratings') }}">
                    <i class="bi bi-star"></i>
                    <span>Ratings</span>
                </a>
            </li>

            <li class="nav-item mt-auto">
                <a class="nav-link @if ($request == 'logout') active @endif"
                   href="{{ route('vp.logout') }}">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Logout</span>
                </a>
            </li>

        </ul>
    </div>
</nav>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const sidebar = document.querySelector(".sidebar");
    const closeBtn = document.getElementById("sbClose");
    const openBtn = document.getElementById("sbOpen"); // optional button in header

    if (openBtn) {
        openBtn.addEventListener("click", () => {
            sidebar.classList.add("show");
            document.body.classList.add("sidebar-open");
        });
    }

    if (closeBtn) {
        closeBtn.addEventListener("click", () => {
            sidebar.classList.remove("show");
            document.body.classList.remove("sidebar-open");
        });
    }
});
</script>

