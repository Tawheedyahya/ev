@extends('welcome')
@section('title', 'Service Provider')
<link rel="stylesheet" href="{{ asset('manual_css/ckeditor.css') }}">
@section('content')
    <style>
        /* ====== Layout ====== */
        .vendor-page {
            --card-radius: 16px;
            --soft: 0 12px 30px rgba(0, 0, 0, .06);
        }

        .vendor-left {
            position: sticky;
            top: 90px;
        }

        .card.soft {
            border: 0;
            border-radius: var(--card-radius);
            box-shadow: var(--soft);
        }

        .badge-chip {
            background: #f7f7f8;
            border: 1px solid #eee;
            color: #333;
            font-weight: 500;
        }

        .pill {
            background: #fff6e5;
            border: 1px solid #ffe2b3;
            color: #aa6b00;
            font-weight: 600;
            border-radius: 999px;
            padding: .25rem .6rem;
        }

        /* ====== Left Summary ====== */
        .vendor-name {
            font-size: 1.6rem;
            font-weight: 700;
        }

        .rating-dot {
            width: 26px;
            height: 26px;
            display: inline-grid;
            place-content: center;
            background: #fff4d6;
            border: 1px solid #ffe3a8;
            border-radius: 50%;
            font-size: .9rem;
        }

        .kv {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .kv .icon {
            width: 28px;
            height: 28px;
            display: inline-grid;
            place-content: center;
            border-radius: 8px;
            background: #f4f6f8;
        }

        /* Logo tile to replace collage */
        .logo-tile {
            width: 100%;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .logo-tile img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 12px;
            border: 1px solid #eee;
        }

        .logo-tile .meta {
            line-height: 1.2;
        }

        /* ====== Buttons ====== */
        .btn-ghost {
            background: #fff;
            border: 1px solid #e8e8ea;
        }

        .btn-ghost:hover {
            background: #fafafa;
        }

        /* ====== Tabs ====== */
        .nav-tabs-clean {
            border-bottom: 0;
            gap: 12px;
        }

        .nav-tabs-clean .nav-link {
            border: 1px solid #ececf0;
            color: #111;
            border-radius: 999px;
            padding: .45rem 1rem;
        }

        .nav-tabs-clean .nav-link.active {
            background: #111827;
            color: #fff;
            border-color: #111827;
        }

        /* ====== Gallery (thumbs) ====== */
        .gallery-grid {
            display: grid;
            gap: 12px;
            grid-template-columns: repeat(4, 1fr);
        }

        .gallery-grid img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 12px;
        }

        /* ====== Packages ====== */
        .pkg-card {
            display: flex;
            gap: 16px;
            border: 1px solid #eee;
            border-radius: 14px;
            padding: 14px;
            align-items: center;
        }

        .pkg-logo {
            width: 120px;
            height: 100px;
            object-fit: contain;
            background: #fafafa;
            border: 1px solid #eee;
            border-radius: 12px;
        }

        /* ====== About ====== */
        .about p {
            font-size: 1.05rem;
            line-height: 1.75;
            color: #2a2a2e;
        }

        .service-chips {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .address-pin {
            display: flex;
            align-items: flex-start;
            gap: 10px;
        }

        .address-pin .pin {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            background: #eef5ff;
            border: 1px solid #d8e7ff;
            display: grid;
            place-content: center;
        }

        .map-slab {
            height: 260px;
            border-radius: 14px;
            overflow: hidden;
            border: 1px solid #eee;
        }

        @media (max-width: 992px) {
            .vendor-left {
                position: static;
            }

            .gallery-grid {
                grid-template-columns: 1fr 1fr;
            }
        }
    </style>

    @php
        use Illuminate\Support\Str;
        $ser=data_get($provider,'categories.name');
        $startsFrom = $provider['starts_from'] ?? 'S$315.00';
        $rating = $provider['rating'] ?? '5';
        $googleIcon = '★';
        $gallery = $gallery ?? [];
        $packages = $packages ?? [];
    @endphp

    <div class="container vendor-page py-4">
        <div class="row g-4">
            <!-- LEFT SUMMARY -->
            <div class="col-lg-4">
                <div class="vendor-left">
                    <div class="card soft mb-3">
                        <div class="card-body">
                            <div class="logo-tile mb-3">
                                @php $logo = $provider['logo'] ?? null; @endphp
                                <img src="{{ $logo ? asset($logo) : asset('images/no-logo.png') }}" alt="Logo">
                                <div class="meta">
                                    <div class="vendor-name">{{ $provider['name'] ?? 'Vendor Name' }}</div>
                                    <div class="text-muted small">{{ $provider['companyname'] ?? '-' }}</div>
                                </div>
                            </div>

                            <div class="d-flex align-items-center gap-2 mb-2"></div>

                            <div class="vstack gap-2">
                                @if (!empty($provider['website']))
                                    <div class="kv">
                                        <span class="icon"><i class="bi bi-globe2"></i></span>
                                        <a href="{{ Str::startsWith($provider['website'], ['http://', 'https://']) ? $provider['website'] : 'https://' . $provider['website'] }}"
                                            target="_blank" class="text-decoration-none">
                                            {{ $provider['website'] }}
                                        </a>
                                    </div>
                                @endif

                                @if (!empty($provider['email']))
                                    <div class="kv">
                                        <span class="icon"><i class="bi bi-envelope"></i></span>
                                        <a href="mailto:{{ $provider['email'] }}" class="text-decoration-none">
                                            {{ $provider['email'] }}
                                        </a>
                                    </div>
                                @endif

                                @if (!empty($provider['phone']))
                                    <div class="kv">
                                        <span class="icon"><i class="bi bi-telephone"></i></span>
                                        <a href="tel:{{ $provider['phone'] }}" class="text-decoration-none">
                                            {{ $provider['phone'] }}
                                        </a>
                                    </div>
                                @endif

                                 {{-- @if (!empty($service)) --}}
                                    <div class="kv">
                                        <span class="icon"><i class="bi bi-briefcase"></i></span>
                                        <a href="#" class="text-decoration-none">
                                            {{ $ser }}
                                        </a>
                                    </div>
                                {{-- @endif --}}

                                @if (!empty($provider['whatsapp']))
                                    <div class="kv">
                                        <span class="icon"><i class="bi bi-whatsapp"></i></span>
                                        <a href="https://wa.me/{{ preg_replace('/\D/', '', $provider['whatsapp']) }}"
                                            target="_blank" class="text-decoration-none">
                                            {{ $provider['whatsapp'] }}
                                        </a>
                                    </div>
                                @endif

                                @if (!empty($provider['instagram']))
                                    <div class="kv">
                                        <span class="icon"><i class="bi bi-instagram"></i></span>
                                        <a href="{{ Str::startsWith($provider['instagram'], ['http://', 'https://']) ? $provider['instagram'] : 'https://' . $provider['instagram'] }}"
                                            target="_blank" class="text-decoration-none">
                                            {{ $provider['instagram'] }}
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- RIGHT CONTENT -->
            <div class="col-lg-8">
                <ul class="nav nav-tabs nav-tabs-clean mb-3" id="vendorTabs">
                    <li class="nav-item"><button class="nav-link active" data-tab="#tab-gallery">Gallery</button></li>
                </ul>

                <div id="tab-gallery" class="card soft mb-4 tab-pane show">
                    <div class="card-body">
                        <div class="blogs-in-gallery">
                            @include('service_providers.f_card', ['form' => false])
                        </div>
                    </div>
                </div>

                <div id="tab-packages" class="card soft mb-4 tab-pane" style="display:none;">
                    <div class="card-body">
                        <h5 class="mb-3">Vendor Packages</h5>
                        @forelse($packages as $pkg)
                            <div class="pkg-card mb-3">
                                <img class="pkg-logo" src="{{ asset($pkg['logo'] ?? 'images/placeholder-logo.png') }}"
                                    alt="logo">
                                <div class="flex-grow-1">
                                    <div class="fw-semibold mb-1">{{ $pkg['title'] ?? 'Package' }}</div>
                                    <div class="d-flex flex-wrap gap-2 mb-2">
                                        @foreach ($pkg['tags'] ?? [] as $tag)
                                            <span class="pill">{{ $tag }}</span>
                                        @endforeach
                                    </div>
                                    <div class="d-flex align-items-center gap-2 text-muted">
                                        <span class="fw-bold">{{ $pkg['price'] ?? '-' }}</span> /
                                        <span>{{ $pkg['min'] ?? '-' }}</span>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="alert alert-light border">No packages yet.</div>
                        @endforelse
                    </div>
                </div>

                <div id="tab-about" class="card soft tab-pane" style="display:none;">
                    <div class="card-body about">
                        <h5 class="mb-3">About Vendor</h5>
                        <p>{{ $provider['about'] ?? '—' }}</p>
                        <h6 class="mt-4">Vendor services</h6>
                        <div class="service-chips mt-2">
                            @foreach ($provider['services'] ?? [] as $s)
                                <span class="badge badge-chip px-3 py-2">{{ $s }}</span>
                            @endforeach
                        </div>

                        <h6 class="mt-4">Office address</h6>
                        <div class="address-pin mt-2">
                            <div class="pin"><i class="bi bi-geo-alt"></i></div>
                            <div>{{ $provider['address'] ?? '-' }}</div>
                        </div>

                        <div class="map-slab mt-3">
                            @if (!empty($provider['address']))
                                <iframe
                                    src="https://maps.google.com/maps?q={{ urlencode($provider['address']) }}&z=14&output=embed"
                                    width="100%" height="100%" style="border:0;" loading="lazy"></iframe>
                            @endif
                        </div>
                    </div>
                </div>
            </div> {{-- END col-lg-8 --}}
        </div> {{-- END row.g-4 --}}

        {{-- About Us --}}
        @if(isset($info->about_us))
        <div class="row mb-3">
            <div class="col-12">
                <strong>ABOUT US:</strong>
                {!! $info->about_us !!}
            </div>
        </div>
        @endif
        @if(isset($info->about_us))
        {{-- Description --}}
        <div class="row mb-3">
            <div class="col-12 editor-output">
                <strong>DESCRIPTION:</strong>
                {!! $info->long_description !!}
            </div>
        </div>
        @endif
        {{-- Service Places --}}
        <div class="service_places">
            <div class="container mt-5" style="max-width: 800px;">
                <div class="card border-0 shadow-sm rounded-4 p-4">
                    <h4 class="fw-bold text-dark mb-4">
                        <i class="bi bi-geo-alt-fill text-warning me-2"></i> Service Places
                    </h4>
                    <div class="d-flex flex-wrap gap-3">
                        @forelse ($service_place as $place)
                            <button type="button"
                                class="spec-card btn d-flex align-items-center gap-2 px-3 py-2 shadow-sm"
                                data-name="{{ $place }}"
                                style="background-color:#fffaf2; font-size:16px; border-radius:12px; border:1px solid #ffe9b0;">
                                <i class="bi bi-geo-alt text-warning"></i>
                                <span class="text-warning fw-semibold text-capitalize">{{ $place->name }}</span>
                            </button>
                        @empty
                            <div class="alert alert-warning border-0 rounded-3 w-100">
                                <i class="bi bi-exclamation-triangle me-2"></i>
                                No service place is mentioned yet.
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
        </div> {{-- END service_places --}}
    </div> {{-- END container.vendor-page --}}

    <script>
        document.querySelectorAll('#vendorTabs .nav-link').forEach(btn => {
            btn.addEventListener('click', e => {
                document.querySelectorAll('#vendorTabs .nav-link').forEach(b => b.classList.remove('active'));
                e.currentTarget.classList.add('active');
                document.querySelectorAll('.tab-pane').forEach(p => p.style.display = 'none');
                document.querySelector(e.currentTarget.dataset.tab).style.display = '';
            });
        });
    </script>
@endsection
