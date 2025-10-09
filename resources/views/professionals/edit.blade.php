@extends('professionals.profession_app')
@section('title', 'Dashboard')
@push('styles')
    <link rel="stylesheet" href="{{ asset('manual_css/form.css') }}">
@endpush
@section('content')
    @include('components.toast')
    <div class="container form-container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card form-card">
                    <div class="card-header form-header">
                        Edit profile
                    </div>
                    <div class="card-body form-body">
                        <form action="{{ route('prof.prof.edit') }}" method="POST" id="prof_edit"
                            enctype="multipart/form-data">
                            <!-- Name -->
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Enter full name" value="{{ old('name', $user->name) }}">
                                @error('name')
                                    <div class="return-error" id="name-error">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- phone -->
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="tel" class="form-control" id="phone" name="phone"
                                    placeholder="Enter your phone" value="{{ old('phone', $user->phone) }}">
                                @error('phone')
                                    <div class="return-error" id="phone-error">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- experience -->
                            <div class="mb-3">
                                <label for="experience" class="form-label">experience</label>
                                <input type="text" class="form-control" id="experience" name="experience"
                                    placeholder="Enter full experience" value="{{ old('experience', $user->experience) }}">
                                @error('experience')
                                    <div class="return-error" id="experience-error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                {{-- @php
                                    $pro_service_place
                                @endphp --}}
                                <label for="place">service providing places</label>
                                <select name="pro_service_place[]" id="pro_service_place" class="select_two" multiple>
                                    @forelse ($service_place as $place)
                                        <option value="{{ $place->id }}"
                                            {{ in_array($place->id, old('pro_service_place', $pro_service_place ?? [])) ? 'selected' : '' }}>
                                            {{ $place->name }}</option>
                                    @empty
                                        <option value="">no service place</option>
                                    @endforelse
                                </select>
                                @error('pro_service_place')
                                    <div class="return-error" id="pro_service_place-error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 mt-3 d-flex justify-content-center align-items-center gap-2">
                                <input type="file" name="prof_logo" id="prof_logo" class="visually-hidden"
                                    accept="image/*">
                                <label for="prof_logo" class="btn btn-primary mb-0">
                                    <i class="bi bi-upload me-1"></i> upload logo
                                    {{-- <br> --}}
                                </label>
                                {{-- <br>   --}}
                                @error('prof_logo')
                                    <div class="return-error">{{ $message }}</div>
                                @enderror
                                {{-- <img src="{{asset("$venue['doc']")}}" alt="">
                                 --}}

                            </div>
                            <div class="prof_img">
                                {{-- <img src="" alt="" width="100px" height="100px"> --}}
                                @if ($user->prof_logo != null || $user->prof_logo != '')
                                    <img src="{{ asset($user->prof_logo) }}" alt="Logo"
                                        class="img-thumbnail rounded-circle"
                                        style="width:120px; height:120px; object-fit:cover;">
                                @endif
                            </div>
                            <!-- Submit -->
                            <div class="mt-3 form-end">
                                <button type="submit" class="btn form-submit-btn">
                                    update
                                </button>
                                {{-- <img src="" alt=""> --}}
                                {{-- <a href="{{url('vendor/venue_login_form')}}">Login?</a> --}}
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
            $('.select_two').select2({
                placeholder: "Select venue types",
                allowClear: true,
                width: '100%'
            });
            $('#prof_logo').change(function(e) {
                $('.prof_img').html('')
                let file = e.target.files[0];
                if (file) {
                    const url = URL.createObjectURL(file);
                    console.log(url);
                    $(".prof_img").html(
                        `<img src=${url} alt='prof_logo' class='img-thumbnail rounded-circle'
                                        style="width:120px; height:120px; object-fit:cover;">`
                    );
                }
            })
        });
    </script>
    <script src="{{ asset('manual_js/profession_register.js') }}" defer></script>
@endpush
