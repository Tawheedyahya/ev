@extends('venue_provider.venue_app')

@section('title', 'add room')
@section('content')
    <div class="container-fluid">
        @include('venue_provider.layouts.header')
         <h1 class="title-with-underline mb-3">ROOMS </h1>
        {{-- add room button --}}
        <div class="add-venue mb-3">
            <a href="{{ route('rooms.add', $id) }}" class="add-venue-tile" aria-label="Add a new venue"> {{-- merge venues id --}}
                <span class="btn btn-warning rounded-pill">
                    <i class="bi bi-plus-lg me-1"></i> Add Rooms
                </span>
            </a>
        </div>
        @include('components.toast')
        <div class="table-start container-fluid table-responsive">
            <table class="table table-striped table-bordered align-middle" id="my_table" style="width:100%">
                <thead class="table-warning">
                    <tr>

                        <th class="">R.NO</th>
                        <th class="">R.ID</th>
                        <th>ROOM NAME</th>
                        {{-- <th>VENUE DESCRIPTION</th> --}}
                        <th>ROOM CAPACITY</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rooms as $room)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $room['id'] }}</td>
                            <td>{{ $room['room_name'] }}</td>
                            <td>{{ $room['room_capacity'] }}</td>
                            <td class="text-end" style="white-space:nowrap;width:1%;">
                                <div class="dropdown" data-bs-display="static" data-bs-boundary="viewport">
                                    <button class="btn btn-sm btn-light" type="button" data-bs-toggle="dropdown"
                                        aria-expanded="false" aria-label="Actions">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </button>

                                    <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                                        <li>
                                            <a class="dropdown-item" role="button" tabindex="0"
                                                href="{{ route('room.edit',['id'=>$id,'room_id'=>$room['id'] ]) }}">Edit</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item text-danger" role="button" tabindex="0"
                                                href="{{ route('room.delete', ['id'=>$id,'room_id'=>$room['id']]) }}"
                                                onclick="return confirm('Are you sure you want to delete')">Delete</a>
                                        </li>
                                        {{-- <li>
                                            <a class="dropdown-item " role="button" tabindex="0"
                                                href="{{ route('rooms.dashboard', $room['id']) }}">Rooms</a>
                                        </li> --}}
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
