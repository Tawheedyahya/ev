@extends('super_admin.app')
@section('title', 'admin')
@section('content')
    <div class="container">
        <div class="container-fluid">
            @include('venue_provider.layouts.header')
            @include('components.toast')
            <div class="table-start container-fluid table-responsive">
                <table class="table align-middle table-responsive" id="my_table"
                    style="width:100%">
                    <thead>
                        <tr>
                            <th>B.NO</th>
                            <th>VENUE_PROVIDER NAME</th>
                            {{-- <th class="phone-device">B.ID</th> --}}
                            <th>VENUE_PROVIDER PHONE</th>
                            <th>VENUE_PROVIDER EMAIL</th>
                            <th>VENUE_PROVIDER DOCUMENT</th>
                            <th>status</th>
                            {{-- <th>UPTO DATE</th> --}}
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($venue_providers as $provider)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $provider->name }}</td>
                                <td>{{ $provider->phone }}</td>
                                <td>{{ $provider->email }}</td>
                                <td><a href="{{ asset('venue_providers/' . $provider->doc) }}" target="_blank">link</a></td>
                                <td
                                    @if ($provider->status == 'pending') class="bg-danger"
                                    @elseif ($provider->status == 'approved')
                                    class="bg-success"
                                    @else
                                    class="bg-warning" @endif>
                                    {{ $provider->status }}</td>
                                <td class="text">
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-light" data-bs-toggle="dropdown">
                                            ⋮
                                        </button>
                                        <ul class="dropdown-menu">
                                            @if ($provider->status == 'pending')
                                                <li><a class="dropdown-item text-success" href="{{route('venue_provider.approved',[$provider->id,1])}}">approved</a></li>
                                                <li>
                                                    <a class="dropdown-item text-danger" href="#"
                                                        data-id="{{ $provider->id }}" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal">
                                                        disapproved
                                                    </a>
                                                </li>
                                                <script>
                                                    let modal = document.getElementById('exampleModal');

                                                    modal.addEventListener('show.bs.modal', function(event) {
                                                        console.log(event)
                                                        let button = event.relatedTarget;
                                                        console.log(button)
                                                        let providerId = button.getAttribute('data-id');

                                                        // Set hidden field value
                                                        document.getElementById('provider_id').value = providerId;

                                                        // If route needs ID in URL
                                                        // let form = modal.querySelector('form');
                                                        // form.action = "/booking/date/" + providerId;
                                                    });
                                                </script>
                                            @elseif($provider->status == 'approved')
                                                <li>
                                                    <a class="dropdown-item text-danger" href="#"
                                                        data-id="{{ $provider->id }}" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal">
                                                        disapproved
                                                    </a>
                                                </li>
                                                <script>
                                                    let modal = document.getElementById('exampleModal');

                                                    modal.addEventListener('show.bs.modal', function(event) {
                                                        console.log(event)
                                                        let button = event.relatedTarget;
                                                        console.log(button)
                                                        let providerId = button.getAttribute('data-id');

                                                        // Set hidden field value
                                                        document.getElementById('provider_id').value = providerId;

                                                        // If route needs ID in URL
                                                        // let form = modal.querySelector('form');
                                                        // form.action = "/booking/date/" + providerId;
                                                    });
                                                </script>
                                            @else
                                            <li><a class="dropdown-item text-success" href="{{route('venue_provider.approved',[$provider->id,1])}}">Reapproved</a></li>
                                            @endif
                                            <li><a class="dropdown-item" href="{{route('venue_provider.venues',$provider->id)}}">Venues</a></li>
                                            <li><a href="{{route('venue_provider.abookings',$provider->id)}}" class="dropdown-item">
                                                    bookings
                                                </a></li>
                                            {{-- <li><a href="" class="dropdown-item">Duplicate</a></li> --}}
                                        </ul>
                                    </div>
                                </td>
                                {{-- <td>hi</td>
                            <td>hi</td>
                            <td>hi</td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@include('components.cdn.jquery')
@push('scripts')
    <script src="{{ asset('manual_js/datatables.js') }}"></script>
@endpush
@push('styles')
    <link rel="stylesheet" href="{{ asset('manual_css/datatables.css') }}?v={{filemtime(public_path('manual_css/datatables.css'))}}">
    <style>
        .badge-gradient-success {
            background: linear-gradient(45deg, #28a745, #5dd39e);
            color: #fff;
        }

        .badge-gradient-danger {
            background: linear-gradient(45deg, #dc3545, #ff6b6b);
            color: #fff;
        }
    </style>
@endpush

@extends('components.modal')
@section('modal_title', 'Rejection note')
@section('modal_body')
    <div class="container">
        <form action="{{ route('venue_provider.rejection',1) }}" method="POST">
            @csrf
            <input type="hidden" name="provider_id" id="provider_id">

            <div class="mb-3">
                <textarea name="rejection_note" cols="30" rows="10" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn btn-success">submit</button>
        </form>

    </div>
@endsection
