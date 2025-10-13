@extends('venue_provider.venue_app')

@section('title', 'Dashboard')

@section('content')
    <div class="container-fluid">
        @include('venue_provider.layouts.header')
        @include('components.toast')
        <div class="table-start container-fluid table-responsive">
            <table class="table table-striped table-bordered align-middle table-responsive" id="my_table" style="width:100%">
                <thead class="table-warning">
                    <tr>
                        <th>B.NO</th>
                        {{-- <th class="phone-device">B.ID</th> --}}
                        <th>CUSTOMER NAME</th>
                        <th>CUSTOMER PHONE</th>
                        <th>STATUS</th>
                        <th>ORDER DATE</th>
                        <th>UPTO DATE</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookings as $book)
                        <tr>
                            @php
                                $id=data_get($book,'id');
                                $s = data_get($book, 'status');
                                $customer_name=data_get($book,'user.name');
                                $customer_phone=data_get($book,'user.phone');
                                $order_date=data_get($book,'order_date');
                                $upto_date=data_get($book,'upto_date');
                            @endphp
                            <td>{{ $loop->iteration }}</td>
                            {{-- <td class="phone-device">{{ $['id'] }}</td> --}}
                            <td>{{ $customer_name }}</td>
                            <td>{{ $customer_phone}}</td>
                            <td>
                                @if ($s == 'approved')
                                    <span class="badge bg-success text-uppercase">{{ $s }}</span>
                                @elseif ($s == 'rejected')
                                    <span class="badge bg-danger text-uppercase">{{ $s }}</span>
                                @elseif ($s == 'cancelled')
                                    <span class="badge bg-secondary text-uppercase">{{ $s }}</span>
                                @else
                                    <span class="badge bg-warning text-uppercase">{{ $s }}</span>
                                @endif
                            </td>

                            <td>{{ $order_date }}</td>
                            <td>{{ $upto_date }}</td>
                            @if ($s != 'cancelled')
                                <td>
                                    <ul class="d-flex list-unstyled mb-0 small">
                                        <li class="">

                                            <a href="{{ route('prof.booking.approve', $id) }}"><span
                                                    class="badge badge-gradient-success me-2">✓</span></a>
                                        </li>
                                        <li class="">
                                            <!-- Trigger -->
                                            <span class="badge badge-gradient-danger me-2" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">✗</span>
                                            @extends('components.modal')
                                            @section('modal_title', 'Reject_form')
                                        @section('modal_body')

                                            <form action="{{ route('prof.booking.reject', $id) }}" method="POST">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="rejectionNote" class="form-label">Note for Rejection</label>
                                                    <textarea class="form-control" id="rejectionNote" name="rejection_note" rows="4"
                                                        placeholder="Write your reason for rejection here..." required></textarea>
                                                </div>
                                                <div class="text-end">
                                                    <button type="submit" class="btn btn-danger">Submit</button>
                                                </div>
                                            </form>

                                        @endsection
                                    </li>
                                </ul>
                            </td>
                        @else
                            <td class="text-secondary">user cancelled</td>
                        @endif

                        {{-- <td class="text-end" style="white-space:nowrap;width:1%;">
                                <div class="dropdown" data-bs-display="static" data-bs-boundary="viewport">
                                    <button class="btn btn-sm btn-light" type="button" data-bs-toggle="dropdown"
                                        aria-expanded="false" aria-label="Actions">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </button>

                                    <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                                        <li>
                                            <a class="dropdown-item" role="button" tabindex="0"
                                                href="">Edit</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item text-danger" role="button" tabindex="0"
                                                href=""
                                                onclick="return confirm('Are you sure you want to delete')">Delete</a>
                                        </li>

                                    </ul>
                                </div>
                            </td> --}}
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
