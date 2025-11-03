<nav class="sidebar d-flex flex-column">
    <button class="btn btn-outline-primary d-lg-none m-2" id="sbClose" aria-label="Close sidebar"
        style="background-color: white">
        <i class="bi bi-list"></i>
    </button>
    <div class="p-3 d-flex align-items-center">
        <span class="fw-bold text-white ms-2 d-none d-lg-inline title-shadow-glow " style="font-family: Arial, Helvetica, sans-serif;" >Service Provider's Panel</span>
    </div>
    <div class="flex-grow-1">
        @php
            $request = Request::segment(2);
        @endphp
        <ul class="nav flex-column px-2">
            <li class="nav-item"><a
                    class=" text-white nav-link @if ($request == 'dashboard') active" @else " @endif href="{{ route('service.dashboard') }}"><i
                        class="bi bi-speedometer2"></i> <span class="">Dashboard</span></a></li>
            <li class="nav-item"><a
                    class="nav-link text-white  @if ($request == 'blogs') active" @else " @endif href="{{route('service.blogs')}}"><i
                        class="bi bi-calendar-event"></i> <span class="">Gallery</span></a></li>
            <li class="nav-item"><a
                    class="nav-link text-white  @if ($request == 'uploads') active" @else " @endif href="{{route('service.uploads') }}"><i
                        class="bi bi-journal-check"></i> <span class="">uploads</span></a></li>
            {{-- <li class="nav-item"><a
                    class="nav-link text-white  @if ($request == 'settings') active" @else " @endif href="#"><i
                        class="bi bi-gear"></i> <span class="">Settings</span></a></li> --}}
            <li class="nav-item mt-auto"><a
                    class="nav-link text-white  @if ($request == 'logout') active" @else " @endif href="{{ route('service.logout') }}"><i
                        class="bi bi-box-arrow-right"></i> <span class="">Logout</span></a></li>
        </ul>
    </div>
</nav>
<style>
    .nav-link.active {
        background-color: #ffffff;
        color: #ff6600 !important;
        font-weight: 600;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .nav-link.active i {
        color: #ff6600 !important;
    }
</style>
