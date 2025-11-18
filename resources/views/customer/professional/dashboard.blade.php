@extends('customer.profile_component')
@section('component')
    <!-- Add Flatpickr CSS and JS in your Blade layout or directly here -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/material_blue.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="{{ asset('manual_js/eventspace/datechange.js') }}" defer></script>
    <div class="orders container mt-5">
        <h4 class="mb-3">Your Bookings</h4>
        <div class="row g-3">
            @forelse ($bookings as $booking)
                @php
                    $id = data_get($booking, 'id');
                    $venueId=data_get($booking,'professional_id');
                    $logo = data_get($booking, 'professionals.prof_logo');
                    $company_name = data_get($booking, 'professionals.companyname');
                    $name = data_get($booking, 'professionals.name');
                    $fromRaw = data_get($booking, 'order_date');
                    $toRaw = data_get($booking, 'upto_date');
                    $status = data_get($booking, 'status');
                    $isPending = $status == 'pending';
                    $providerPhone = data_get($booking, 'professionals.phone');
                    $fromRaw = data_get($booking, 'order_date');
                    $toRaw = data_get($booking, 'upto_date');
                    $fromVal = $fromRaw ? \Carbon\Carbon::parse($fromRaw)->format('Y-m-d\TH:i') : '';
                    $toVal = $toRaw ? \Carbon\Carbon::parse($toRaw)->format('Y-m-d\TH:i') : '';
                    $notes = data_get($booking, 'notes');
                    $modalId = 'orderModal-' . $id;
                @endphp
                {{-- <h1>{{$logo}}</h1> --}}
                <div class="col-12 col-sm-6 col-lg-3 col-xl-2">
                    <div class="card h-100">
                        <img data-src="{{ asset($logo) }}" class="card-img-top lazyload" loading="lazy"
                            style="height:160px; object-fit:cover;" alt="">
                        <div class="card-body p-2">
                            <h6 class="mb-1">{{ $company_name ?? '—' }}</h6>
                            <p class="mb-2 text-muted small">
                                <strong>Provider:</strong>
                                {{ $name ?? '—' }}
                                @if ($providerPhone)
                                    <span class="text-muted">({{ $providerPhone }})</span>
                                @endif
                            </p>
                            <ul class="list-unstyled mb-0 small">
                                <li><strong>From:</strong>
                                    {{ $fromRaw ? \Carbon\Carbon::parse($fromRaw)->format('d M Y, h:i A') : '—' }}
                                </li>
                                <li><strong>To:</strong>
                                    {{ $toRaw ? \Carbon\Carbon::parse($toRaw)->format('d M Y, h:i A') : '—' }}
                                </li>
                            </ul>
                        </div>
                        <div
                            class="card-footer bg-transparent d-flex justify-content-between align-items-center flex-wrap py-2">
                            <span
                                class="badge text-bg-secondary @if ($status == 'rejected') bg-danger @elseif ($status == 'approved') bg-success @else @endif">
                                {{ $status ?: '—' }}
                            </span>
                            @if ($status == 'rejected' || $isPending)
                                <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                    data-bs-target="#{{$modalId}}">
                                    View
                                </button>
                            @endif
                              @include('components.ratings',[
                        'type'=>2
                      ])
                        </div>
                    </div>
                </div>
                @if ($isPending || $status == 'rejected')
                    <div class="modal fade" id="{{$modalId}}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Manage Booking#</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <div class="small text-muted">Professional</div>
                                        <div class="fw-semibold">{{ $company_name }}</div>
                                    </div>
                                    {{-- Change Dates --}}
                                    @if ($status == 'pending')
                                        <form action="{{ route('prof.booking.date', $id) }}" method="POST"
                                            class="border rounded p-3 mb-3">
                                            @csrf
                                            @method('PATCH')
                                            <div class="mb-2 fw-semibold">Change Dates</div>
                                            <div class="row g-2">
                                                <div class="col-12">
                                                    <label class="form-label small">From</label>
                                                    <div class="input-group">
                                                        <input type="text" id="" class="form-control s"
                                                            placeholder="Select start" name="starts_at"
                                                            value="{{ $fromVal ? \Carbon\Carbon::parse($fromVal)->format('Y-m-d H:i') : '' }}"
                                                            autocomplete="off" required>
                                                        <span class="input-group-text"><i
                                                                class="bi bi-calendar-event"></i></span>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-label small">To</label>
                                                    <div class="input-group">
                                                        <input type="text" name="ends_at" id=""
                                                            class="form-control mt-2 e" placeholder="Select end"
                                                            value="{{ $toVal ? \Carbon\Carbon::parse($toVal)->format('Y-m-d H:i') : '' }}"
                                                            autocomplete="off" required>
                                                        <span class="input-group-text"><i class="bi bi-clock"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-3 d-flex gap-2">
                                                <button type="submit" class="btn btn-primary btn-sm">Save Dates</button>
                                            </div>
                                        </form>
                                        {{-- Cancel Booking --}}
                                        <form action="{{ route('prof.booking.cancel', $id) }}" method="POST"
                                            class="border rounded p-3">
                                            @csrf
                                            @method('DELETE')
                                            <div class="mb-2 fw-semibold">Cancel Booking</div>
                                            <p class="small text-muted mb-2">This will cancel your pending booking.</p>
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Cancel booking');">
                                                Cancel Booking
                                            </button>
                                        </form>
                                    @elseif($status == 'rejected')
                                        <h2 class="title-with-underline">Reason</h2>
                                        <div class="small text-muted text-break">{{ $notes }}</div>
                                    @endif
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary btn-sm"
                                        data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
                    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
                    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/material_blue.css">
                    <script src="{{ asset('manual_js/normalflatpicker.js') }}" defer></script>
                @endif
            @empty
                your have no professional bookings
            @endforelse

        </div>
    </div>
@endsection
