@extends('venue_provider.venue_app')
@section('title','venue ratings')
@section('content')
    <div class="container-fluid">
        @include('components.toast')
        <div class="table-start container-fluid table-responsive">
            <table class="table align-middle" id="my_table" style="width:100%">
                <thead>
                    <tr>
                        <th class="phone-device">NO</th>
                        {{-- <th class="phone-device">V.ID</th> --}}
                        <th>VENUE RATINGS</th>
                        <th>VENUE DESCRIPTION</th>
                        <th>CUSTOMER NAME</th>
                        <th>VENUE NAME</th>
                        <th class="text-center">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($query as $venue)
                        <tr>
                            <td class="phone-device">{{ $loop->iteration }}</td>
                            {{-- <td class="phone-device">{{ $venue['id'] }}</td>    --}}
                            <td>{{ ucfirst($venue->ratings) }}<i class="bi bi-star-fill"></i></td>
                            <td>{{ ucfirst($venue->description) }}</td>
                            <td>{{ ucfirst($venue->name) }}</td>
                            <td>{{ ucfirst($venue->venue_name) }}</td>
                            <td class="text-end" style="white-space:nowrap;width:1%;">
                                <div class="d-inline-flex align-items-center gap-2">
                                    {{-- <a href="{{ route('vp.venue.edit', $venue->id) }}"
                                        class="btn btn-sm btn-outline-primary">
                                        Activate
                                    </a>
                                    <form action="{{ route('vp.venue.delete', $venue->id) }}" method="POST"
                                        class="d-inline" onsubmit="return confirm('Are you sure you want to delete?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                            Deactivate
                                        </button>
                                    </form>

                                    <a href="{{ route('rooms.dashboard', $venue->id) }}"
                                        class="btn btn-sm btn-outline-secondary room-btn" data-id="{{ $venue->id }}">
                                        Delete
                                    </a> --}}
                                    @if($venue->status=='activate')
                                    <form action="{{ route('venue.ratings.all', [$venue->id,0]) }}" method="POST"
                                        class="d-inline" onclick="return alert('Are you sure want to delete and deactivate this ratings')">
                                        @csrf
                                        {{-- @method('DELETE') --}}
                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                            Deactivate
                                        </button>
                                    </form>
                                    @else
                                    <form action="{{ route('venue.ratings.all', [$venue->id,1]) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        {{-- @method('DELETE') --}}
                                        <button type="submit" class="btn btn-sm btn-outline-success">
                                            Activate
                                        </button>
                                    </form>
                                    @endif
                                     <form action="{{ route('venue.ratings.all', [$venue->id,2]) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                            Delete
                                        </button>
                                    </form>
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
    <link rel="stylesheet"
        href="{{ asset('manual_css/datatables.css') }}?v={{ filemtime(public_path('manual_css/datatables.css')) }}">
@endpush

@push('scripts')
    <script src="{{ asset('manual_js/datatables.js') }}"></script>
    @endpush
