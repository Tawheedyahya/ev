<!-- Offcanvas (visible on mobile; you can add d-md-none if you want to hide it on md+) -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="sidebar" aria-labelledby="sidebarLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="sidebarLabel">Filter</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="filter-form">
            <div class="filter-form-header ">
                <div class="">
                    <a href=""><span>Reset all</span></a>
                </div>
            </div>
            <div class="filter-form-category">
                @include('eventscape.category')
            </div>
            {{-- Occasions --}}
            <div class="form">
                <form action="{{ route('eventspace.filter') }}" method="POST" class="filter_form">
                    @csrf
                    {{-- price range --}}
                    <h6 class="mb-2">Price Range</h6>
                    <div class="mb-3">

                        <input type="number" name="min" id="min" class="form-control min_price"
                            placeholder="Enter min price">
                        <input type="range" class="form-range price orange-range" min="0" max="20000"
                            step="1" id="pri" name="price" value="1000">
                    </div>

                    <h6 class="mb-2">Occasions</h6>
                    <div class="chip-group" role="group" aria-label="Occasions">
                        @foreach ($occasions as $occasion)
                            <input class="chip-input" type="checkbox" id="occ-{{ $occasion->name }}" name="occasions[]"
                                value="{{ $occasion->id }}">
                            <label class="chip" for="occ-{{ $occasion->name }}">{{ $occasion->name }}</label>
                        @endforeach
                    </div>
                    {{-- facilities --}}
                    <h6 class="mb-2 mt-4">Amenties</h6>

                    <div class="chip-group" role="group" aria-label="Facilities">
                        @foreach ($venue_facilities as $occasion)
                            <input class="chip-input" type="checkbox" id="occ-{{ $occasion->name }}" name="facilities[]"
                                value="{{ $occasion->id }}">
                            <label class="chip" for="occ-{{ $occasion->name }}">{{ $occasion->name }}</label>
                        @endforeach
                    </div>

                    {{-- seat capacity --}}

                    <h6 class="mt-4">Seat capacity</h6>
                    <div class="mb-2">
                        {{-- <label for="price_range" class="form-label">price: <span id="value">50 </span> RM</label> --}}
                        <input type="number" name="seat_capacity" id="occ-seat_capacity" class="form-control "
                            placeholder="Enter">
                    </div>
                    <button type="submit" class="btn btn-primary mt-4">search</button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- desktop view --}}
<div class="desktop-view d-none d-md-block">
    <div class="filter-form">
        <div class="filter-form-header row">
            <div class="start col">
                <h2 class="" style="font-size: 20px">filter</h2>
            </div>
            <div class="end col col-md-3">
                {{-- Reset all: go to the same page without query params --}}
                <a href=""><span>Reset all</span></a>
            </div>
        </div>

        <div class="filter-form-category">
            @include('eventscape.category')
        </div>

        {{-- form --}}
        <div class="form mt-4">
            @include('eventscape.form')
        </div>
    </div>
</div>

@push('styles')
    <link rel="stylesheet" href="{{ asset('manual_css/eventscape_checkbox.css') }}">
@endpush
