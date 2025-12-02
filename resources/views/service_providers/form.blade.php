@extends('service_providers.service_app')
@section('title', 'upload blogs')

@section('content')
    <div class="container-fluid">
        @include('venue_provider.layouts.header')
        <h1 class="title-shadow-glow">upload photos</h1>
        @include('components.toast')
        <div class="row justify-content-center mt-5">
            <div class="col col-md-7">
                <div class="card form-card">
                    <div class="card-header form-header title-shadow-glow">Blogs form</div>
                    <div class="card-body form-body">
                        <form action="{{ route('service.post') }}" method="POST" enctype="multipart/form-data" id="blog">
                            @csrf
                            {{-- description --}}
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" class="form-control" rows="4"></textarea>
                                @error('description')
                                    <div class="return-error">{{ $message }}</div>
                                @enderror
                            </div>
                            {{-- type --}}
                             <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <select name="type" id="type" class="form-control" required>
                                    <option value="">--SELECT--</option>
                                    <option value="1">Gallary</option>
                                    <option value="2">Discounts or Menus or Events</option>
                                </select>
                                {{-- <textarea name="description" class="form-control" rows="4"></textarea>
                                @error('description')
                                    <div class="return-error">{{ $message }}</div>
                                @enderror --}}
                            </div>
                            <div class="mb-3 mt-3 d-flex justify-content-center align-items-center gap-2">
                                <input type="file" name="room_doc" id="room_doc" class="visually-hidden room_doc"
                                    accept="image/*">
                                <label for="room_doc" class="btn btn-primary mb-0">
                                    <i class="bi bi-upload me-1"></i> Upload photos
                                </label>
                                @error('room_doc')
                                    <div class="return-error">{{ $message }}</div>
                                @enderror
                            </div>
                            <img src="" alt="" class="show_doc img-fluid text-center d-none" height="200px"
                                width="200px">
                            <div class="mt-3 form-end">
                                <button type="submit" class="btn form-submit-btn">
                                    Post
                                </button>
                                {{-- <a href="{{ url('vendor/professionals_login') }}">Login?</a> --}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            let form = $('#blog')
            $('#blog').validate({
                ignore: [],
                rules: {
                    room_doc: {
                        required: true,
                       filesize: 524288,
                    },
                    description: {
                        required: true
                    },
                    type:{
                        required:true
                    }
                },
                messages: {
                    room_doc: {
                        required: 'image is required'
                    },
                    description: {
                        required: 'put some description',
                        filesize:'Filesize must be less than 0.5 mb'
                    },
                    type:{
                        required:'Type is required'
                    }
                },
                errorElement: "div",
                errorClass: "invalid-feedback",
                highlight: function(element) {
                    $(element).addClass("is-invalid").removeClass("is-valid");
                },
                unhighlight: function(element) {
                    $(element).removeClass("is-invalid").addClass("is-valid");
                },
                errorPlacement: function(error, element) {
                    error.insertAfter(element);
                },
            })

        })
    </script>
    <script src="{{ asset('manual_js/imagechange.js') }}" defer></script>
@endpush
