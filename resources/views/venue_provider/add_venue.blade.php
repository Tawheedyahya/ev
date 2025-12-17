@extends('venue_provider.venue_app')

@section('title', 'add venue')

@push('styles')
    <link rel="stylesheet" href="{{ asset('manual_css/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('manual_css/checkbox.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    <link rel="stylesheet" href="{{ asset('manual_css/image.css') }}">
    <style>
        .mapbox {
            height: 360px;
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid #e5e7eb;
        }

        .form-card {
            border-radius: 14px;
        }

        .form-header {
            font-weight: 600;
        }

        .return-error {
            color: #dc3545;
            font-size: .9rem;
            margin-top: .25rem;
        }
    </style>
@endpush

@section('content')
    <div class="container-fluid">
        @include('components.toast')

        <div class="row justify-content-center mt-5">
            <div>
                <div class="card form-card">
                    <div class="card-header form-header nbg">Venue details</div>

                    <div class="card-body form-body">
                        {{-- enctype needed for file uploads --}}
                        <form
                            action="@if ($venue) {{ route('vp.venue.update', $venue['id']) }} @else {{ route('vp.venue.register') }} @endif"
                            method="POST" enctype="multipart/form-data" id="register_form">
                            @csrf

                            <div class="row g-3">

                                {{-- Row 1: Venue Name | Venue Type --}}
                                <div class="col-md-6">
                                    <label for="venue_name" class="form-label">Venue Name</label>
                                    <input type="text" name="venue_name" id="venue_name" class="form-control"
                                        value="{{ old('venue_name', $venue['venue_name'] ?? '') }}">
                                    @error('venue_name')
                                        <div class="return-error">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="venue_type" class="form-label">Venue Type</label>
                                    <select name="venue_type[]" id="venue_type" class="form-select" multiple>
                                        @foreach ($occasions as $occasion)
                                            <option value="{{ $occasion->id }}" @selected(collect(old('venue_type', $venue['occasion'] ?? ''))->contains($occasion->id))>
                                                {{ $occasion->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('venue_type')
                                        <div class="return-error">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Row 2: Address (full) --}}
                                <div class="col-12">
                                    <label for="venue_address" class="form-label">Venue Address</label>
                                    <input type="text" name="venue_address" id="venue_address" class="form-control"
                                        value="{{ old('venue_address', $venue['venue_address'] ?? '') }}"
                                        placeholder="1234 Main St">
                                    @error('venue_address')
                                        <div class="return-error">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Row 3: City | Seat Capacity | Amount --}}
                                <div class="col-md-6">
                                    <label for="venue_city" class="form-label">Venue City</label>
                                    {{-- <input type="text" name="venue_city" id="venue_city" class="form-control"
                                        value="{{ old('venue_city', $venue['venue_city'] ?? '') }}">
                                    @error('venue_city')
                                        <div class="return-error">{{ $message }}</div>
                                    @enderror --}}
                                    <select name="venue_city" id="" class="form-control">
                                        @foreach ($places as $p)
                                        <option value="{{ $p->name }}" @selected(old('venue_city', $venue['venue_city']) == $p->name)>{{ $p->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label for="venue_seat_capacity" class="form-label">Seat Capacity</label>
                                    <input type="number" name="venue_seat_capacity" id="venue_seat_capacity"
                                        class="form-control"
                                        value="{{ old('venue_seat_capacity', $venue['venue_seat_capacity'] ?? '') }}">
                                    @error('venue_seat_capacity')
                                        <div class="return-error">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-3">
                                    <label for="amount" class="form-label">Amount <span class="text-muted">(per
                                            day)</span></label>
                                    <input type="number" step="0.01" name="amount" id="amount" class="form-control"
                                        value="{{ old('amount', $venue['amount'] ?? '') }}">
                                    @error('amount')
                                        <div class="return-error">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Row 4: Facilities (full) --}}
                                <div class="col-12">
                                    <label class="form-label d-block">Venue Facility</label>
                                    <div class="d-flex flex-wrap gap-3">
                                        @foreach ($venue_facilities as $facility)
                                            <label class="custom-checkbox">
                                                <input type="checkbox" name="venue_facilities[]"
                                                    value="{{ $facility->id }}" @checked(collect(old('venue_facilities', $venue['appvenuefacilitie'] ?? ''))->contains($facility->id)) />
                                                <span class="checkmark"></span>
                                                {{ $facility->name }}
                                            </label>
                                        @endforeach
                                    </div>
                                    @error('venue_facilities')
                                        <div class="return-error">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Row 5: Food provide (left) | Food prices & halal (right) --}}
                                <div class="p-3 bg-light border rounded mt-5">
                                <div class="col-md-4">
                                    <label class="form-label d-block">Are you providing food?</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="food_provide" id="food_yes"
                                            value="yes" @checked(old('food_provide', $venue['food_provide'] ?? '') == 'yes')>
                                        <label class="form-check-label" for="food_yes">Yes</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="food_provide" id="food_no"
                                            value="no" @checked(old('food_provide', $venue['food_provide'] ?? '') == 'no')>
                                        <label class="form-check-label" for="food_no">No</label>
                                    </div>
                                    @error('food_provide')
                                        <div class="return-error">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-8">
                                    <div class="food_section">
                                        <div class="row g-3">
                                            <div class="col-md-4">
                                                <label for="breakfast" class="form-label">Breakfast
                                                    <span class="text-muted">(per person)</span></label>
                                                <input type="number" step="0.01" name="breakfast" id="breakfast"
                                                    class="form-control"
                                                    value="{{ old('breakfast', $venue['breakfast'] ?? '') }}">
                                                @error('breakfast')
                                                    <div class="return-error">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-4">
                                                <label for="lunch" class="form-label">Lunch
                                                    <span class="text-muted">(per person)</span></label>
                                                <input type="number" step="0.01" name="lunch" id="lunch"
                                                    class="form-control"
                                                    value="{{ old('lunch', $venue['lunch'] ?? '') }}">
                                                @error('lunch')
                                                    <div class="return-error">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-4">
                                                <label for="dinner" class="form-label">Dinner
                                                    <span class="text-muted">(per person)</span></label>
                                                <input type="number" step="0.01" name="dinner" id="dinner"
                                                    class="form-control"
                                                    value="{{ old('dinner', $venue['dinner'] ?? '') }}">
                                                @error('dinner')
                                                    <div class="return-error">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-12">
                                                <label class="form-label d-block">Do You Have Halal Certificate?</label>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="halal"
                                                        id="halal_yes" value="1" @checked(($venue['halal'] ?? '') == true)>
                                                    <label class="form-check-label" for="halal_yes">Yes</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="halal"
                                                        id="halal_no" value="0" @checked(($venue['halal'] ?? '') == false)>
                                                    <label class="form-check-label" for="halal_no">No</label>
                                                </div>
                                                <input type="file" name="halal_doc" id="halal_doc"
                                                    class="visually-hidden" accept="application/pdf">
                                                <label for="halal_doc" class="btn btn-primary mb-0 halal_doc">
                                                    <i class="bi bi-upload me-1"></i> Upload photos
                                                </label>
                                                @error('halal')
                                                    <div class="return-error">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>

                                {{-- Row 6: Description (full) --}}
                                <div class="col-12">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea name="description" id="description" rows="6" class="form-control">{{ old('description', $venue['description'] ?? '') }}</textarea>
                                    @error('description')
                                        <div class="return-error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="why" class="form-label">why this venue</label>
                                    <textarea name="why" id="why" rows="6" class="form-control">{{ old('why', $venue['why'] ?? '') }}</textarea>
                                    @error('why')
                                        <div class="return-error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="what" class="form-label">What this venue offers</label>
                                    <textarea name="what" id="what" rows="6" class="form-control">{{ old('what', $venue['what'] ?? '') }}</textarea>
                                    @error('what')
                                        <div class="return-error">{{ $message }}</div>
                                    @enderror
                                </div>
                                {{-- Row 7: VR URL (full) --}}
                                <div class="col-6">
                                    <label for="vr" class="form-label">VR URL</label>
                                    <input type="text" name="vr" id="vr" class="form-control"
                                        value="{{ old('vr', $venue['vr'] ?? '') }}">
                                    @error('vr')
                                        <div class="return-error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label for="vedios" class="form-label">Video URL</label>
                                    <input type="text" name="vedios" id="vedios" class="form-control"
                                        value="{{ old('vedios', $venue['vedios'] ?? '') }}">
                                    @error('vedios')
                                        <div class="return-error">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Row 8: Location (map full) --}}
                                <div class="col-12">
                                    <label class="form-label d-flex justify-content-between align-items-center">
                                        <span>Location</span>
                                        <small class="text-muted">Click the map to drop a pin</small>
                                    </label>
                                    <div id="venueMap" class="mapbox"></div>
                                </div>

                                {{-- Row 9: Coordinates --}}
                                <div class="col-md-6">
                                    <label for="latitude" class="form-label">Latitude</label>
                                    <input type="text" id="latitude" name="latitude" class="form-control"
                                        value="{{ old('latitude', $venue['latitude'] ?? '') }}" readonly>
                                    @error('latitude')
                                        <div class="return-error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="longitude" class="form-label">Longitude</label>
                                    <input type="text" id="longitude" name="longitude" class="form-control"
                                        value="{{ old('longitude', $venue['longitude'] ?? '') }}" readonly>
                                    @error('longitude')
                                        <div class="return-error">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12 d-flex gap-2">
                                    <button type="button" id="useMyLocation"
                                        class="btn btn-outline-secondary btn-sm">Use my location</button>
                                    <button type="button" id="clearPin" class="btn btn-outline-danger btn-sm">Clear
                                        pin</button>
                                </div>

                                {{-- Row 10: Upload + Preview --}}
<div class="row align-items-start g-3">

    <div class="col-md-6 d-flex align-items-start gap-3">

        {{-- Upload --}}
        <input type="file" name="doc" id="doc" class="visually-hidden" accept="image/*">

        {{-- LEFT COLUMN (Upload + Submit) --}}
        <div class="d-flex flex-column justify-content-between"
             style="height:180px;">

            <label for="doc" class="btn btn-primary mb-0 mt-5">
                <i class="bi bi-upload me-1"></i> Upload photos
            </label>

            <button class="btn btn-primary" type="submit">
                Submit
            </button>

        </div>

        {{-- Preview --}}
        <img src="{{ asset($venue['doc'][0] ?? '') }}"
             class="venue-img img-fluid rounded border"
             loading="lazy"
             id="p-img"
             style="height:180px; width:200px; object-fit:cover;">

    </div>

</div>

@error('doc')
<div class="col-12">
    <div class="return-error">{{ $message }}</div>
</div>
@enderror

                                {{-- Row 11: Submit --}}


                            </div> {{-- /row g-3 --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('manual_js/venue/add_venue.js') }}"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    <script src="{{ asset('manual_js/leaflet.js') }}"></script>
@endpush
