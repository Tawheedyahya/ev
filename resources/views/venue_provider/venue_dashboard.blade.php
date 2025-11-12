@extends('venue_provider.venue_app')
@section('title', 'venue')

@section('content')
    <div class="container-fluid">
        @include('venue_provider.layouts.header')

        <div class="add-venue mb-3">
            <a href="{{ route('vp.venue.add') }}" class="add-venue-tile" aria-label="Add a new venue">
                <span class="btn btn-warning rounded-pill">
                    <i class="bi bi-plus-lg me-1"></i> Add venue
                </span>
            </a>
        </div>
        @include('components.toast')
        <div class="table-start container-fluid table-responsive">
            <table class="table align-middle" id="my_table" style="width:100%">
                <thead>
                    <tr>
                        <th class="phone-device">V.NO</th>
                        <th class="phone-device">V.ID</th>
                        <th>VENUE NAME</th>
                        <th>VENUE DESCRIPTION</th>
                        <th>VENUE AMOUNT</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($venues as $venue)
                        <tr>
                            <td class="phone-device">{{ $loop->iteration }}</td>
                            <td class="phone-device">{{ $venue['id'] }}</td>
                            <td>{{ $venue['venue_name'] }}</td>
                            <td>{{ $venue['description'] }}</td>
                            <td>{{ $venue['amount'] }}</td>
                            <td class="text-end" style="white-space:nowrap;width:1%;">
    <div class="d-inline-flex align-items-center gap-2">
        <a href="{{ route('vp.venue.edit', $venue['id']) }}"
           class="btn btn-sm btn-outline-primary">
            Edit
        </a>

        {{-- Prefer DELETE via form (cleaner than GET for deletes) --}}
        <form action="{{ route('vp.venue.delete', $venue['id']) }}"
              method="POST" class="d-inline"
              onsubmit="return confirm('Are you sure you want to delete?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-outline-danger">
                Delete
            </button>
        </form>

        <a href="{{ route('rooms.dashboard', $venue['id']) }}"
           class="btn btn-sm btn-outline-secondary">
            Rooms
        </a>
    </div>
</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@include('components.cdn.jquery')
@push('styles')
    <link rel="stylesheet" href="{{ asset('manual_css/datatables.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('manual_js/datatables.js') }}"></script>
@endpush

<!-- <style>
  #my_table .btn { padding: .25rem .5rem; line-height: 1.2; }
</style> -->
