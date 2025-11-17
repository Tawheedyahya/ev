<div class="address mt-5 ms-md-5 ms-lg-5 ms-xxl-5 ms-xl-5">
    <div class="heading">
        <h3>Venue address</h3>
    </div>
    <div class="map-img">
        <img src="{{ asset('ev_photos/map.png') }}" alt="" loading="lazy" style="width: 100%;margin-top:10px;">
    </div>
    <div class="direction">
        @if ($venue['latitude'] && $venue['longitude'])
            @php
                $lat = $venue['latitude'];
                $lon = $venue['longitude'];
            @endphp
            <a href="https://www.google.com/maps?q={{ $lat }},{{ $lon }}" target="_blank"
                class="btn thick-orange mt-4"><i class="bi bi-geo-alt-fill me-2"></i>Click for direction</a>
        @endif
    </div>
    <div class="manual-address card shadow-sm border-0 mt-4">
        <div class="card-body">
            <!-- Provider Info -->
            <h5 class="card-title fw-semibold mb-2">
                <i class="bi bi-person-badge me-2"></i> {{ $provider['name'] }}
            </h5>
            <p class="text-muted mb-3">
                <i class="bi bi-envelope me-2"></i> {{ $provider['email'] }}
            </p>

            <!-- Venue Info -->
            <h6 class="fw-semibold">Venue Details</h6>
            <ul class="list-unstyled mb-0">
                <li><i class="bi bi-geo-alt me-2 text-warning"></i> {{ $venue['venue_address'] }}</li>
                <li><i class="bi bi-building me-2 text-warning"></i> {{ $venue['venue_city'] }}</li>
                <li><i class="bi bi-people me-2 text-warning"></i> Seats: {{ $venue['venue_seat_capacity'] }}</li>
            </ul>
        </div>
    </div>

</div>
<style>
    .direction {
        text-align: center;
    }
</style>
