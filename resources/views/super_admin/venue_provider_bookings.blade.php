@extends('super_admin.app')
@section('title', 'admin')
@section('content')
    <div class="container">
        @include('venue_provider.layouts.header')
        @include('components.toast')
        <div class="table-start container-fluid table-responsive">
            <table class="table table-striped table-bordered align-middle table-responsive" id="my_table" style="width:100%">
                <thead class="table-warning">
                    <tr>
                        <th>NO</th>
                        <th>VENUE NAME</th>
                        {{-- <th class="phone-device">B.ID</th> --}}
                        <th>VENUE CITY</th>
                        <th>CUSTOMER NAME</th>
                        <th>CUSTOMER PHONE</th>
                        <th>STATUS OF BOOKING</th>
                        <th>ORDER DATE</th>
                        <th>UPTO DATE</th>
                        {{-- <th>ACTION</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @forelse ($bookings as $book)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$book->dubvenue->venue_name}}</td>
                        <td>{{$book->dubvenue->venue_city}}</td>
                        <td>{{$book->name}}</td>
                        <td>{{$book->phone}}</td>
                        <td>{{$book->status}}</td>
                        <td>{{$book->order_date}}</td>
                        <td>{{$book->upto_date}}</td>
                    </tr>
                    @empty
                    <p>noo bookings</p>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
@include('components.cdn.jquery')
@push('scripts')
    <script src="{{ asset('manual_js/datatables.js') }}"></script>
@endpush
@push('styles')
    <link rel="stylesheet" href="{{ asset('manual_css/datatables.css') }}">
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
