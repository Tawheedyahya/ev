<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Dashboard')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="icon" href="{{ asset('ev_photos/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('manual_css/text.css') }}">
    <link rel="stylesheet" href="{{ asset('manual_css/form.css') }}">
    <link rel="stylesheet" href="{{asset('manual_css/common.css')}}">
    <link rel="stylesheet" href="{{asset('manual_css/table.css')}}">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

     <!-- jQuery Validation Plugin -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <script src="{{asset('manual_js/common.js')}}"></script>






    @stack('styles')
    <style>
        body {
            overflow-x: hidden;
        }

        .sidebar {
            width: 264px;
            min-width: 80px;
            background: orange;
            color: #fff;
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            z-index: 1045;
            transition: left 0.25s;
        }

        .sidebar .close-btn {
            display: none;
        }

        .main {
            margin-left: 264px;
            transition: margin-left .25s;
            padding: 2rem;
        }

        .sidebar-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, .35);
            opacity: 0;
            pointer-events: none;
            z-index: 1040;
            transition: opacity .25s;
        }

        @media (max-width:991.98px) {
            .sidebar {
                left: -264px;
            }

            .sidebar.show {
                left: 0;
            }

            .sidebar .close-btn {
                display: block;
                position: absolute;
                top: 10px;
                right: 10px;
                background: none;
                border: none;
                color: #fff;
                font-size: 1.5rem;
            }

            .main {
                margin-left: 0 !important;
            }

            .sidebar-overlay.show {
                opacity: 1;
                pointer-events: auto;
            }
        }
    </style>
</head>

<body>
    <!-- Sidebar overlay for mobile -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>
    <!-- Sidebar include -->
    @include('super_admin.sidebar')
    <!-- Page content -->
    <main class="main">
        <!-- Mobile menu toggle button -->
        <button class="btn btn-outline-primary d-lg-none mb-2" id="sbOpen">
            <i class="bi bi-list"></i>
        </button>
        @yield('content')
    </main>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var sidebar = document.querySelector('.sidebar');
            var overlay = document.getElementById('sidebarOverlay');
            var openBtn = document.getElementById('sbOpen');
            var closeBtn = document.getElementById('sbClose');

            function openSidebar() {
                sidebar.classList.add('show');
                overlay.classList.add('show');
            }

            function closeSidebar() {
                sidebar.classList.remove('show');
                overlay.classList.remove('show');
            }
            if (openBtn) openBtn.addEventListener('click', openSidebar);
            if (closeBtn) closeBtn.addEventListener('click', closeSidebar);
            if (overlay) overlay.addEventListener('click', closeSidebar);
        });
    </script>
    @stack('scripts')
</body>

</html>
