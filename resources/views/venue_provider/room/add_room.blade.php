@extends('venue_provider.venue_app')

@section('title', 'add venue')
@section('content')
    <div class="container-fluid">
        @include('venue_provider.layouts.header')
        <!-- <h1 class="title-shadow-glow">Room form</h1> -->
        <a href="javascript:history.back()" class="btn nbg"> <i class="bi bi-arrow-left"></i>Back to Venues</a>
        @include('components.toast')
        <div class="row justify-content-center mt-5">
            <div>
                <div class="card form-card">
                    <div class="card-header form-header  nbg">Room details</div>
                    <div class="card-body form-body">
                        {{-- <form action="@if ('hii') @else @endif" method="POST"
                            enctype="multipart/form-data" id="register_form"> --}}
                            <form action=@if (isset($room))
                            {{route('room.update',['id'=>$id,'room_id'=>$room->id])}}
                            @else
                            {{route('room.insert',$id)}}
                            @endif  method="POST"
                            enctype="multipart/form-data" id="register_form">
                            @csrf
                             <div class="mb-3">
                                <label for="room_name" class="form-label">Room Name</label>
                                <input type="text" name="room_name" id="room_name" class="form-control"
                                    value="{{ old('room_name',$room->room_name??'') }}">
                                @error('room_name')
                                    <div class="return-error">{{ $message }}</div>
                                @enderror
                            </div>
                             <div class="mb-3">
                                <label for="room_capacity" class="form-label">Room Capacity</label>
                                <input type="number" name="room_capacity" id="room_capacity" class="form-control"
                                    value="{{ old('room_capacity',$room->room_capacity??'') }}">
                                @error('room_capacity')
                                    <div class="return-error">{{ $message }}</div>
                                @enderror
                            </div>
                               {{-- Upload photos --}}
                            <div class="mb-3 mt-3 d-flex justify-content-center align-items-center gap-2">
                                <input type="file" name="room_doc" id="room_doc" class="visually-hidden"
                                    accept="image/*" >
                                <label for="room_doc" class="btn btn-primary mb-0">
                                    <i class="bi bi-upload me-1"></i> Upload photos
                                </label>
                                @error('room_doc')
                                <div class="return-error">{{$message}}</div>
                                @enderror
                                {{-- <img src="{{asset("$venue['doc']")}}" alt="">
                                 --}}
                            </div><br>
                             <img src="@if (isset($room))
                             {{asset("$room->room_doc")}}
                             @else ''
                             @endif"  class="room-img img-fluid" loading="lazy" id="r_img" style="height: 180px;width:200px;">
                            <div class="mt-3 form-end d-flex justify-content-center align-items-center">
                                <button class="btn btn-primary" style="color:white;">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
    <script src="{{asset('manual_js/room/roomform.js')}}" defer></script>
    @endpush
@endsection
