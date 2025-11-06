<form id="filter_form" action="{{ route('eventspace.filter') }}" method="post">
    @csrf

    <h6 class="mb-2">Price Range</h6>
    <div class="mb-3">
        {{-- <label for="price_range" class="form-label">price: <span id="value">50 </span> RM</label> --}}
        <input type="number" name="min" id="min_price" class="form-control min_price" placeholder="Enter min price">
        <input type="range" class="form-range orange-range price" min="0" max="20000" step="1" id="price"
            name="price" value="50">
    </div>


    <h6 class="mb-2">Occasions</h6>

    <div class="chip-group" role="group" aria-label="Occasions">
        @foreach ($occasions as $occasion)
            <input class="chip-input" type="radio" id="{{ $occasion->name }}" name="occasions[]"
                value="{{ $occasion->id }}">
            <label class="chip" for="{{ $occasion->name }}">{{ ucwords($occasion->name) }}</label>
        @endforeach
    </div>
    {{-- facilities --}}

    <h6 class="mb-2 mt-4">Amenties</h6>

    <div class="chip-group" role="group" aria-label="Facilities">
        @foreach ($venue_facilities as $occasion)
            <input class="chip-input" type="checkbox" id="{{ $occasion->name }}" name="facilities[]"
                value="{{ $occasion->id }}">
            <label class="chip" for="{{ $occasion->name }}">{{ ucwords($occasion->name) }}</label>
        @endforeach
    </div>
    {{-- seat capacity --}}

    <h6 class="mt-4">Seat Capacity</h6>
    <div class="mb-2">
        {{-- <label for="price_range" class="form-label">price: <span id="value">50 </span> RM</label> --}}
        <input type="number" name="seat_capacity" id="seat_capacity" class="form-control " placeholder="No. of People">
    </div>

    {{-- location --}}
     <h6 class="mb-2 mt-4">Locations Available</h6>

    <div>
        <select name="location" id="location-avail" class="form-control">location
        <option value="">Select City</option>
        @foreach ($avail as $city)
        <option value="{{$city}}">{{$city}}</option>
        @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary mt-4">Search</button>
    <div class="btn btn-warning mt-4">
                <a href=""><span>Reset all</span></a>
            </div>
</form>
<script src="{{asset('manual_js/eventspace/eventspace.js')}}"></script>
