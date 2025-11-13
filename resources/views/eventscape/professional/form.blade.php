<form id="filter_form" action="{{ route('eventspace.prof.filter') }}" method="GET" class="filter_form">
    @csrf

    {{-- Price range --}}
    <h6 class="mb-2">Price Range</h6>
    <div class="mb-3">
        <input type="number" name="min" id="min_price" class="form-control min_price" placeholder="Enter min price">
        <input type="range" class="form-range orange-range price mt-3" min="0" max="20000" step="1" id="price" name="price" value="50">
    </div>

    {{-- Occasions / Professionals --}}
<h6 class="mb-2 mt-4">Places</h6>
    <div class="chip-group" role="group" aria-label="places">
        @foreach ($service_places as $ser)
            @php $f_id = 'occ-'.$ser->id; @endphp
            <input class="chip-input" type="radio" id="{{ $f_id }}" name="places" value="{{ $ser->id }}">
            <label class="chip" for="{{ $f_id }}">{{ ucwords($ser->name) }}</label>
        @endforeach
    </div>
    {{-- Amenities --}}
    <h6 class="mb-2 mt-4">category</h6>
    <div class="chip-group" role="group" aria-label="category">
        @foreach ($category as $cat)
            @php $fid = 'fac-'.$cat->id; @endphp
            <input class="chip-input" type="radio" id="{{ $fid }}" name="category" value="{{ $cat->id }}">
            <label class="chip" for="{{ $fid }}">{{ ucwords($cat->name) }}</label>
        @endforeach
    </div>

    <button type="submit" class="btn btn-primary mt-4">Search</button>
    <div class="btn btn-warning mt-4">
                <a href=""><span>Reset all</span></a>
            </div>
</form>

{{-- <script src="{{ asset('manual_js/eventspace/eventspace.js') }}"></script>
 --}}
 <script src="{{asset('manual_js/eventspace/event_prof.js')}}" defer></script>
