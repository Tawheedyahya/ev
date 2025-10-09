<!-- Add Flatpickr CSS and JS in your Blade layout or directly here -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/material_blue.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="{{asset('manual_js/eventspace/datechange.js')}}" defer></script>

<div class="orders container mt-5">
    <h4 class="mb-3">Your Bookings</h4>
    <div class="row g-3">
        @forelse ($orders as $order)
            @php
                $order_id = data_get($order, 'id');
                $notes = data_get($order, 'notes');
                $doc = data_get($order, 'venue.venueimages.0.doc');
                $venueId = data_get($order, 'venue.id');
                $venueName = data_get($order, 'venue.venue_name');
                $providerName = data_get($order, 'venue.provider.name');
                $providerPhone = data_get($order, 'venue.provider.phone');
                $status = (string) data_get($order, 'status');
                $statusLower = strtolower($status);
                $isPending = $statusLower === 'pending';
                $fromRaw = data_get($order, 'order_date');
                $toRaw = data_get($order, 'upto_date');
                $fromVal = $fromRaw ? \Carbon\Carbon::parse($fromRaw)->format('Y-m-d\TH:i') : '';
                $toVal = $toRaw ? \Carbon\Carbon::parse($toRaw)->format('Y-m-d\TH:i') : '';
                $img = $doc ? asset($doc) : asset('images/placeholder.jpg');

                // Unique IDs for Flatpickr fields in this order's modal
                $fromInputId = 'starts-' . $order_id;
                $toInputId = 'ends-' . $order_id;
                $modalId = 'orderModal-' . $order_id;
            @endphp

            <div class="col-12 col-sm-6 col-lg-3 col-xl-2">
                <div class="card h-100">
                    <img src="{{ $img }}" class="card-img-top lazyload" loading="lazy"
                        style="height:160px; object-fit:cover;" alt="{{ $venueName ?? 'Venue image' }}">
                    <div class="card-body p-2">
                        <h6 class="mb-1">{{ $venueName ?? '—' }}</h6>
                        <p class="mb-2 text-muted small">
                            <strong>Provider:</strong>
                            {{ $providerName ?? '—' }}
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
                    <div class="card-footer bg-transparent d-flex justify-content-between align-items-center flex-wrap py-2">
                        <span
                            class="badge text-bg-secondary @if ($status == 'rejected') bg-danger @elseif ($status == 'approved') bg-success @else @endif">
                            {{ $status ?: '—' }}
                        </span>
                        @if ($isPending || $status == 'rejected')
                            <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                data-bs-target="#{{ $modalId }}">
                                View
                            </button>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Modal only when pending or rejected --}}
            @if ($isPending || $status == 'rejected')
                <div class="modal fade" id="{{ $modalId }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Manage Booking#</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <div class="small text-muted">Venue</div>
                                    <div class="fw-semibold">{{ $venueName }}</div>
                                </div>
                                {{-- Change Dates --}}
                                @if ($status == 'pending')
                                    <form action="{{route('booking.date',$order_id)}}" method="POST" class="border rounded p-3 mb-3">
                                        @csrf
                                        @method('PATCH')
                                        <div class="mb-2 fw-semibold">Change Dates</div>
                                        <div class="row g-2">
                                            <div class="col-12">
                                                <label class="form-label small">From</label>
                                                <div class="input-group">
                                                    <input
                                                        type="text"
                                                        id="{{ $fromInputId }}"
                                                        class="form-control"
                                                        placeholder="Select start"
                                                        name="starts_at"
                                                        value="{{ $fromVal ? \Carbon\Carbon::parse($fromVal)->format('Y-m-d H:i') : '' }}"
                                                        autocomplete="off"
                                                    >
                                                    <span class="input-group-text"><i class="bi bi-calendar-event"></i></span>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label small">To</label>
                                                <div class="input-group">
                                                    <input
                                                        type="text"
                                                        name="ends_at"
                                                        id="{{ $toInputId }}"
                                                        class="form-control mt-2"
                                                        placeholder="Select end"
                                                        value="{{ $toVal ? \Carbon\Carbon::parse($toVal)->format('Y-m-d H:i') : '' }}"
                                                        autocomplete="off"
                                                    >
                                                    <span class="input-group-text"><i class="bi bi-clock"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-3 d-flex gap-2">
                                            <button type="submit" class="btn btn-primary btn-sm">Save Dates</button>
                                        </div>
                                    </form>
                                    {{-- Cancel Booking --}}
                                    <form action="{{ route('booking.cancel', $order_id) }}" method="POST"
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
            @endif
        @empty
            <div class="col-12">
                <div class="alert alert-info mb-0">No Bookings found.</div>
            </div>
        @endforelse
    </div>
</div>
<style>
  .flatpickr-calendar {
    z-index: 1060;
  }
</style>

