@extends('venue_provider.venue_app')

@section('title', 'add venue')

@push('styles')
    <link rel="stylesheet" href="{{ asset('manual_css/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('manual_css/checkbox.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    <link rel="stylesheet" href="{{asset('manual_css/image.css')}}">
    <style>
        .mapbox {
            height: 360px;
            /* width: 300px; */
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid #e5e7eb;
        }

    </style>
@endpush
@section('content')
    <div class="container-fluid">
        @include('venue_provider.layouts.header')
        <h1 class="title-shadow-glow">Venue Form</h1>
        @include('components.toast')
        <div class="row justify-content-center mt-5">
            <div class="col col-md-7">
                <div class="card form-card">
                    <div class="card-header form-header title-shadow-glow">Venue details</div>
                    <div class="card-body form-body">
                        {{-- enctype needed for file uploads --}}
                        <form action="@if ($venue)
                        {{route('vp.venue.update',$venue['id'])}}
                        @else
                        {{route('vp.venue.register')}}
                        @endif" method="POST" enctype="multipart/form-data" id="register_form">
                            @csrf

                            <div class="mb-3">
                                <label for="venue_name" class="form-label">Venue Name</label>
                                <input type="text" name="venue_name" id="venue_name" class="form-control"
                                    value="{{ old('venue_name',$venue['venue_name']??'') }}">
                                @error('venue_name')
                                    <div class="return-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="venue_type" class="form-label">Venue Type</label>
                                <select name="venue_type[]" id="venue_type" class="form-select" multiple>
                                    @foreach ($occasions as $occasion)
                                        <option value="{{ $occasion->id }}" @selected(collect(old('venue_type',$venue['occasion']??''))->contains($occasion->id))>
                                            {{ $occasion->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('venue_type')
                                    <div class="return-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="venue_address" class="form-label">Venue Address</label>
                                <input type="text" name="venue_address" id="venue_address" class="form-control"
                                    value="{{ old('venue_address',$venue['venue_address']??'') }}">
                                @error('venue_address')
                                    <div class="return-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="venue_city" class="form-label">Venue City</label>
                                <input type="text" name="venue_city" id="venue_city" class="form-control"
                                    value="{{ old('venue_city',$venue['venue_city']??'') }}">
                                @error('venue_city')
                                    <div class="return-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="venue_seat_capacity" class="form-label">Venue Seat Capacity</label>
                                <input type="number" name="venue_seat_capacity" id="venue_seat_capacity"
                                    class="form-control" value="{{ old('venue_seat_capacity',$venue['venue_seat_capacity']??'') }}">
                                @error('venue_seat_capacity')
                                    <div class="return-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 venue-facility-group">
                                <label for="venue_facility" class="form-label">*Venue Facility*</label><br>
                                @foreach ($venue_facilities as $facility)
                                {{-- <p>{{$facility->id}}</p> --}}
                                    <label class="custom-checkbox">
                                        <input type="checkbox" name="venue_facilities[]" value="{{ $facility->id }}"
                                            @checked(collect(old('venue_facilities', $venue['appvenuefacilitie']??''))->contains($facility->id)) />
                                        <span class="checkmark"></span>
                                        {{ $facility->name }}
                                    </label>
                                @endforeach
                                 @error('venue_facilities')
                                    <div class="return-error">{{ $message }}</div>
                                @enderror
                            </div>
                            {{-- food --}}
                            <div class="food_group p-2 mb-2"style="border: 2px solid orange; border-radius:10px;">
                            <div class="mb-3" >
                                <label class="form-label">Are you providing food?</label>
                                <br>
                                <input type="radio" name="food_provide" id="food_yes" value="yes"> Yes
                                <br>
                                <input type="radio" name="food_provide" id="food_no" value="no" > No
                                @error('food_provide')
                                    <div class="return-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="food_section"  style="display: none;">
                                <div class="mb-3">
                                    <label for="breakfast" class="form-label">Breakfast <span>(Amount per person)</span></label>
                                    <input type="number" step="0.01" name="breakfast" id="breakfast" class="form-control"
                                        value="{{ old('breakfast', $venue['breakfast'] ?? '') }}">
                                    @error('breakfast')
                                        <div class="return-error">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="lunch" class="form-label">Lunch <span>(Amount per person)</span></label>
                                    <input type="number" step="0.01" name="lunch" id="lunch" class="form-control"
                                        value="{{ old('lunch', $venue['lunch'] ?? '') }}">
                                    @error('lunch')
                                        <div class="return-error">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="dinner" class="form-label">Dinner <span>(Amount per person)</span></label>
                                    <input type="number" step="0.01" name="dinner" id="dinner" class="form-control"
                                        value="{{ old('dinner', $venue['dinner'] ?? '') }}">
                                    @error('dinner')
                                        <div class="return-error">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            </div>

                            <div class="mb-3">
                                <label for="amount" class="form-label">Amount <span>*per day*</span></label>
                                <input type="number" step="0.01" name="amount" id="amount" class="form-control"
                                    value="{{ old('amount',$venue['amount']??'') }}">
                                @error('amount')
                                    <div class="return-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{old('description',$venue['description']??'')}}</textarea>
                                @error('description')
                                    <div class="return-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="vr" class="form-label">VR URL</label>
                                <input type="text" name="vr" id="vr" class="form-control"
                                    value="{{ old('vr',$venue['vr']??'') }}">
                                @error('vr')
                                    <div class="return-error">{{ $message }}</div>
                                @enderror
                            </div>


                            {{-- Location (click map to set) --}}
                            <div class="mb-3">
                                <label class="form-label d-flex justify-content-between align-items-center">
                                    <span>Location</span>
                                    <small class="text-muted">Click the map to drop a pin</small>
                                </label>

                                <div id="venueMap" class="mapbox"></div>

                                <div class="row mt-2 g-2">
                                    <div class="col">
                                        <label for="latitude" class="form-label">Latitude</label>
                                        <input type="text" id="latitude" name="latitude" class="form-control"
                                            value="{{ old('latitude',$venue['latitude']??'') }}" readonly>
                                        @error('latitude')
                                            <div class="return-error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="longitude" class="form-label">Longitude</label>
                                        <input type="text" id="longitude" name="longitude" class="form-control"
                                            value="{{ old('longitude',$venue['longitude']??'') }}" readonly>
                                        @error('longitude')
                                            <div class="return-error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12 d-flex gap-2 mt-2">
                                        <button type="button" id="useMyLocation"
                                            class="btn btn-outline-secondary btn-sm">Use my location</button>
                                        <button type="button" id="clearPin" class="btn btn-outline-danger btn-sm">Clear
                                            pin</button>
                                    </div>
                                </div>
                            </div>

                            {{-- Upload photos --}}
                            <div class="mb-3 mt-3 d-flex justify-content-center align-items-center gap-2">
                                <input type="file" name="doc" id="doc" class="visually-hidden"
                                    accept="image/*" >
                                <label for="doc" class="btn btn-primary mb-0">
                                    <i class="bi bi-upload me-1"></i> Upload photos
                                </label>
                                @error('doc')
                                <div class="return-error">{{$message}}</div>
                                @enderror
                                {{-- <img src="{{asset("$venue['doc']")}}" alt="">
                                 --}}
                            </div>
                            <img src="{{ asset($venue['doc'][0] ?? '') }}"  class="venue-img img-fluid" loading="lazy" id="p-img" style="height: 180px;width:200px;">
                            <div class="mt-3 form-end d-flex justify-content-center align-items-center">
                                <button class="btn" style="background-color:grey;color:white;">submit</button>
                            </div>
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
    <script>
$('#doc').on('change', function () {
  const file = this.files && this.files[0];
  if (!file) return;

  // basic validation (optional)
  if (!file.type.startsWith('image/')) {
    alert('Please choose an image file.');
    this.value = '';
    return;
  }

  const url = URL.createObjectURL(file);
  $('#p-img')
    .attr('src', url); // free memory after load
});
$('input[name="food_provide"]').change(function(){
    if($(this).val()==='yes'){
        $('.food_section').slideDown();
    }else{
        $('.food_section').slideUp();
        $('#breakfast','#lunch','#dinner').val('');
    }
})
// $if(('input[name="food_provide"]').val()=='yes'){
//       $('.food_section').slideDown();
// }
if($('#breakfast').val()||$('#lunch').val()||$('#dinner').val()){
    $('input[name="food_provide"][value="yes"]').prop('checked',true)
    $('.food_section').show()
}
    </script>
@endpush
