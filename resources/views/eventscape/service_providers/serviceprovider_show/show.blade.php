@extends('welcome')
@section('title', 'Service Provider')

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('manual_css/ckeditor.css') }}">

    <style>
        :root {
            --brand-warn: #f59e0b;
            --ink: #0f172a;
            --muted: #64748b;
            --card: #ffffff;
            --soft: #f8fafc;
            --line: #e5e7eb;
        }

        body {
            background-color: #fff;
            color: var(--ink);
            font-family: 'Inter', sans-serif;
        }

        /* HERO SECTION */
        .pro-hero {
            border-radius: 26px;
            background: radial-gradient(900px 280px at 30% 10%, rgba(245, 158, 11, .15), transparent 60%),
                linear-gradient(135deg, #ffffff 0%, #fffaf1 55%, #ffffff 100%);
            box-shadow: 0 20px 50px rgba(2, 6, 23, .05);
            border: 1px solid rgba(15, 23, 42, .06);
            overflow: hidden;
            margin-bottom: 30px;
        }

        .pro-hero-inner {
            display: grid;
            grid-template-columns: 200px 1fr;
            gap: 30px;
            padding: 25px;
            align-items: center;
        }

        .pro-avatar {
            width: 180px;
            height: 180px;
            border-radius: 999px;
            object-fit: cover;
            border: 6px solid #fff;
            box-shadow: 0 14px 34px rgba(2, 6, 23, .15);
        }

        .pro-name {
            font-size: 2.2rem;
            font-weight: 800;
            color: var(--ink);
            margin: 0;
            letter-spacing: -0.5px;
        }

        .pro-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            background: rgba(245, 158, 11, 0.1);
            color: var(--brand-warn);
            /* padding: 4px 12px; */
            border-radius: 12px;
            font-size: 0.85rem;
            font-weight: 600;
            margin-top: 8px;
        }

        /* STATS PILLS */
        .pro-stats {
            margin-top: 20px;
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .stat-pill {
            background: #ffffff;
            border: 1px solid rgba(15, 23, 42, .08);
            border-radius: 16px;
            padding: 10px 16px;
            box-shadow: 0 4px 15px rgba(2, 6, 23, .04);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .stat-pill i {
            color: var(--brand-warn);
            font-size: 1.2rem;
        }

        .stat-label {
            font-size: .75rem;
            color: var(--muted);
            text-transform: uppercase;
            letter-spacing: 1px;
            display: block;
        }

        .stat-value {
            font-weight: 700;
            color: var(--ink);
            font-size: 1rem;
        }

        /* TABS CLEAN */
        .nav-tabs-clean {
            border-bottom: 2px solid var(--soft);
            gap: 30px;
            margin-bottom: 25px;
        }

        .nav-tabs-clean .nav-link {
            border: none;
            background: none;
            color: var(--muted);
            font-weight: 700;
            padding: 12px 0;
            position: relative;
            cursor: pointer;
        }

        .nav-tabs-clean .nav-link.active {
            color: var(--ink);
        }

        .nav-tabs-clean .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 100%;
            height: 3px;
            background: var(--brand-warn);
            border-radius: 10px;
        }

        /* SECTION CARDS */
        .section-card {
            background: var(--card);
            border-radius: 24px;
            border: 1px solid rgba(15, 23, 42, .06);
            box-shadow: 0 10px 30px rgba(2, 6, 23, .03);
            padding: 30px;
            margin-bottom: 24px;
        }

        /* DISCOUNT CAROUSEL */
        .discount-wrapper {
            position: relative;
            border-radius: 24px;
            overflow: hidden;
            height: 400px;
        }

        .discount-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .discount-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.8) 0%, transparent 60%);
            display: flex;
            align-items: flex-end;
            padding: 40px;
            color: #fff;
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            background-color: var(--brand-warn);
            border-radius: 50%;
            padding: 20px;
            background-size: 50%;
        }

        /* RELATED RAIL */
        .cards-rail {
            display: flex;
            gap: 20px;
            overflow-x: auto;
            padding: 10px 0 30px;
            scrollbar-width: thin;
        }

        .item-card {
            flex: 0 0 260px;
            border-radius: 20px;
            overflow: hidden;
            transition: 0.3s;
            border: 1px solid var(--line);
            text-decoration: none;
        }

        .item-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        @media (max-width: 768px) {
            .pro-hero-inner {
                grid-template-columns: 1fr;
                text-align: center;
                padding: 30px 20px;
            }

            .pro-avatar {
                margin: 0 auto;
                width: 140px;
                height: 140px;
            }

            .pro-stats {
                justify-content: center;
            }
        }
    </style>
@endpush

@section('content')
    @php
        use Illuminate\Support\Str;
        $ser = data_get($provider, 'categories.name', 'Professional');
        $logo = $provider['logo'] ?? null;
    @endphp

    <div class="pro-page container py-5">

        <div class="pro-hero">
            <div class="pro-hero-inner">
                <div class="pro-avatar-wrap">
                    <img src="{{ $logo ? asset($logo) : asset('images/no-logo.png') }}" class="pro-avatar" alt="Vendor Logo">
                </div>
                <div class="pro-info">
                    <div class="pro-title">
                        <h1 class="pro-name">{{ $provider['name'] ?? 'Vendor Name' }}</h1>
                        <span class="pro-badge"><i class="bi bi-patch-check-fill"></i> Verified serviceProvider</span>
                    </div>
                    <p class="pro-meta text-muted mt-2">Company: <strong
                            class="text-dark">{{ $provider['companyname'] ?? '-' }}</strong></p>

                    <div class="pro-stats">
                        <!-- <div class="stat-pill">
                            <i class="bi bi-star-fill"></i>
                            <div>
                                <span class="stat-label">Rating</span>
                                <span class="stat-value">{{ $provider['rating'] ?? '5.0' }} / 5</span>
                            </div>
                        </div> -->
                        @if (!empty($provider['price']))
                            <div class="stat-pill">
                                <i class="bi bi-tags-fill"></i>
                                <div>
                                    <span class="stat-label">Starts From</span>
                                    <span class="stat-value">RM {{ $provider['price'] }}</span>
                                </div>
                            </div>
                        @endif
                        <div class="stat-pill">
                            <i class="bi bi-briefcase-fill"></i>
                            <div>
                                <span class="stat-label">Category</span>
                                <span class="stat-value">{{ $ser }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <ul class="nav nav-tabs nav-tabs-clean" id="vendorTabs">
                    <li class="nav-item"><button class="nav-link active" data-tab="#tab-gallery">Portfolio</button></li>
                    <li class="nav-item"><button class="nav-link" data-tab="#tab-packages">Packages</button></li>
                    <li class="nav-item"><button class="nav-link" data-tab="#tab-about">About & Location</button></li>
                </ul>

                <div id="tab-gallery" class="tab-pane-custom">
                    <div class="section-card">
                        @include('service_providers.f_card', ['form' => false])
                    </div>
                </div>

                <div id="tab-packages" class="tab-pane-custom" style="display:none;">
                    <div class="section-card">
                        {{-- @if (isset($info->about_us)) --}}
                            {{-- Description --}}
                            <div class="row mb-3">
                                <div class="col-12 editor-output">
                                    <strong>DESCRIPTION:</strong>
                                    {!! $provider['long_description']?$provider['long_description']:'<p class="text-muted">No description provided.</p>' !!}
                                </div>
                            </div>
                        {{-- @endif --}}
                    </div>
                </div>

                <div id="tab-about" class="tab-pane-custom" style="display:none;">
                    <div class="section-card">
                        <h4 class="fw-bold mb-3">About the Vendor</h4>
                        <div class="editor-output mb-5">
                            {!! $provider['about_us'] ?? ($provider['about_us']  ?? '<p class="text-muted">No about is provided.</p>') !!}
                        </div>

                        <h5 class="fw-bold mt-5 mb-3"><i class="bi bi-geo-alt-fill text-warning me-2"></i>Service Places
                        </h5>
                        <div class="d-flex flex-wrap gap-2 mb-4">
                            @forelse ($service_place as $place)
                                <div class="btn d-flex align-items-center gap-2 px-3 py-2"
                                    style="background-color:#fffaf2; border-radius:12px; border:1px solid #ffe9b0; pointer-events: none;">
                                    <i class="bi bi-geo-alt text-warning"></i>
                                    <span class="text-warning fw-semibold text-capitalize">{{ $place->name }}</span>
                                </div>
                            @empty
                                <p class="text-muted small">No specific service areas mentioned.</p>
                            @endforelse
                        </div>

                        @if (!empty($provider['address']))
                            <h5 class="fw-bold mt-4 mb-2">Office Address</h5>
                            <p class="text-muted"><i class="bi bi-geo-alt me-2"></i>{{ $provider['address'] }}</p>
                            <div class="map-container">
                                <iframe
                                    src="https://maps.google.com/maps?q={{ urlencode($provider['address']) }}&z=14&output=embed"
                                    width="100%" height="100%" style="border:0;" loading="lazy"></iframe>
                            </div>
                        @endif
                    </div>
                </div>

                @if (isset($discount) && count($discount) > 0)
                    <h4 class="fw-bold mb-4 mt-5">Exclusive Offers</h4>
                    <div id="discountCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner rounded-5 shadow-lg">
                            @foreach ($discount as $key => $d)
                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                    <div class="discount-wrapper">
                                        <img src="{{ asset($d['discount_img']) }}" class="discount-img"
                                            alt="Discount Promo">
                                        <div class="discount-overlay">
                                            <div class="w-100">
                                                <span class="badge bg-warning text-dark mb-2 px-3 py-2">LIMITED TIME
                                                    PROMO</span>
                                                <h3 class="fw-bold text-white">{{ $d['description'] }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @if (count($discount) > 1)
                            <button class="carousel-control-prev" type="button" data-bs-target="#discountCarousel"
                                data-bs-slide="prev"><span class="carousel-control-prev-icon"></span></button>
                            <button class="carousel-control-next" type="button" data-bs-target="#discountCarousel"
                                data-bs-slide="next"><span class="carousel-control-next-icon"></span></button>
                        @endif
                    </div>
                @endif
            </div>

            <div class="col-lg-4">
                <div class="section-card sticky-top" style="top: 100px; z-index: 10;">
                    <h5 class="fw-bold mb-4">Contact Details</h5>
                    <div class="vstack gap-3">
                        @if (!empty($provider['phone']))
                            <div class="d-flex align-items-center gap-3">
                                <div class="stat-pill p-2"><i class="bi bi-telephone"></i></div>
                                <a href="tel:{{ $provider['phone'] }}"
                                    class="text-decoration-none text-dark fw-semibold">{{ $provider['phone'] }}</a>
                            </div>
                        @endif

                        @if (!empty($provider['whatsapp']))
                            <div class="d-flex align-items-center gap-3">
                                <div class="stat-pill p-2" style="color: #25D366;"><i class="bi bi-whatsapp"></i></div>
                                <a href="https://wa.me/{{ preg_replace('/\D/', '', $provider['whatsapp']) }}"
                                    target="_blank" class="text-decoration-none text-dark fw-semibold">WhatsApp Chat</a>
                            </div>
                        @endif

                        @if (!empty($provider['email']))
                            <div class="d-flex align-items-center gap-3">
                                <div class="stat-pill p-2"><i class="bi bi-envelope"></i></div>
                                <a href="mailto:{{ $provider['email'] }}"
                                    class="text-decoration-none text-dark fw-semibold text-truncate">{{ $provider['email'] }}</a>
                            </div>
                        @endif



                        @if (!empty($provider['instagram']))
                            <div class="kv">
                                <div class="stat-pill p-2"><i class="bi bi-instagram"></i>
                                    <a href="{{ Str::startsWith($provider['instagram'], ['http://', 'https://']) ? $provider['instagram'] : 'https://' . $provider['instagram'] }}"
                                        target="_blank" class="text-decoration-none">
                                        {{ $provider['instagram'] }}
                                    </a>
                                </div>
                            </div>
                        @endif


                        @if (!empty($provider['website']))
                            <div class="d-flex align-items-center gap-3">
                                <div class="stat-pill p-2"><i class="bi bi-globe"></i></div>
                                <a href="{{ $provider['website'] }}" target="_blank"
                                    class="text-decoration-none text-dark fw-semibold">Official Website</a>
                            </div>
                        @endif
                    </div>
                    <hr class="my-4 opacity-50">
                    <!-- <div class="d-grid">
                        <a href="tel:{{ $provider['phone'] ?? '#' }}" class="btn btn-warning py-3 rounded-pill fw-bold">
                            <i class="bi bi-calendar-check me-2"></i> Book Appointment
                        </a>
                    </div> -->
                    <p class="small text-muted text-center mt-3 mb-0">Active member since {{ date('Y') - 1 }}</p>
                </div>
            </div>
        </div>

        <section class="mt-5 pt-4">
            <h4 class="fw-bold mb-4">Similar Professionals</h4>
            <div class="cards-rail">
                @forelse ($suggest ?? [] as $s)
                    <a href="{{ route('ser.service_provider', $s->id) }}" class="item-card bg-white shadow-sm">
                        <img src="{{ asset($s->logo ?? 'images/default.jpg') }}" class="w-100"
                            style="height: 160px; object-fit: cover;">
                        <div class="p-3 text-center">
                            <h6 class="fw-bold text-truncate mb-1">{{ $s->companyname }}</h6>
                            <p class="small text-muted mb-0">{{ $s->categories->name ?? 'Service' }}</p>
                        </div>
                    </a>
                @empty
                    <p class="text-muted">No related professionals found.</p>
                @endforelse
            </div>
        </section>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tabs = document.querySelectorAll('#vendorTabs .nav-link');
            const panes = document.querySelectorAll('.tab-pane-custom');

            tabs.forEach(btn => {
                btn.addEventListener('click', function(e) {
                    // Remove active class from all buttons
                    tabs.forEach(b => b.classList.remove('active'));
                    // Add active class to clicked button
                    this.classList.add('active');

                    // Hide all panes
                    panes.forEach(p => p.style.display = 'none');
                    // Show targeted pane
                    const target = this.getAttribute('data-tab');
                    document.querySelector(target).style.display = 'block';
                });
            });
        });
    </script>
@endsection
