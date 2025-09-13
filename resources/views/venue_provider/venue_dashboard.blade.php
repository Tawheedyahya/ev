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
            <table class="table table-striped table-bordered align-middle" id="my_table" style="width:100%">
                <thead class="table-warning">
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
                                <div class="dropdown" data-bs-display="static" data-bs-boundary="viewport">
                                    <button class="btn btn-sm btn-light" type="button" data-bs-toggle="dropdown"
                                        aria-expanded="false" aria-label="Actions">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </button>

                                    <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                                        <li>
                                            <a class="dropdown-item" role="button" tabindex="0" href="{{route('vp.venue.edit',$venue['id'])}}">Edit</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item text-danger" role="button" tabindex="0" href="{{route('vp.venue.delete',$venue['id'])}}">Delete</a>
                                        </li>
                                    </ul>
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
