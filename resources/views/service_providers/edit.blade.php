@extends('service_providers.service_app ')
@section('title', 'Dashboard')
@push('styles')
    <link rel="stylesheet" href="{{ asset('manual_css/form.css') }}">
 <script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/classic/ckeditor.js"></script>

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
                        <form action="{{ route('ser.prof.update') }}" method="POST" id="prof_edit"
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
                            {{-- Instagram --}}
                            <div class="mb-3">
                                <label for="instagram" class="form-label">instagram</label>
                                <input type="text" class="form-control" id="instagram" name="instagram"
                                    placeholder="Enter your instagram url" value="{{ old('instagram', $user->instagram) }}">
                                @error('instagram')
                                    <div class="return-error" id="instagram-error">{{ $message }}</div>
                                @enderror
                            </div>
                            {{-- Instagram --}}
                            <div class="mb-3">
                                <label for="facebook" class="form-label">facebook</label>
                                <input type="text" class="form-control" id="facebook" name="facebook"
                                    placeholder="Enter your facebook url" value="{{ old('facebook', $user->facebook) }}">
                                @error('facebook')
                                    <div class="return-error" id="facebook-error">{{ $message }}</div>
                                @enderror
                            </div>
                            @if($info)
                            <div class="mb-3 ">
                                <label for="about_us" class="about_us">About your company</label>
                                <textarea name="about_us" id="about_us" cols="30" rows="10" class="form-control">{!!old('about_us',$info->about_us??'')!!}</textarea>
                                @error('about_us')
                                    <div class="return-error" id="about_us-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 ">
                                 <label for="about_us" class="about_us">Details of your company(packages etc...)</label>
                                <textarea name="long_description" id="long_description" cols="30" rows="10" class="form-control">{!!old('long_description',$info->long_description??'')!!}</textarea>
                                @error('long_description')
                                    <div class="return-error" id="long_description-error">{{ $message }}</div>
                                @enderror
                            </div>
                            @endif


                            <div class="mb-3">
                                <label for="place">service providing places</label>
                                <select name="ser_service_place[]" id="ser_service_place" class="select_two" multiple>
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
                                <input type="file" name="logo" id="logo" class="visually-hidden"
                                    accept="image/*">
                                <label for="logo" class="btn btn-primary mb-0">
                                    <i class="bi bi-upload me-1"></i> update logo

                                </label>
                                @error('logo')
                                    <div class="return-error">{{ $message }}</div>
                                @enderror

                            </div>

                            {{-- <div class="mb-3">
                                <label for="feature" class="form-label">Feature</label>
                                <select id="feature" name="feature[]" class="form-control select2" multiple="multiple">
                                </select>
                                @error('name')
                                    <div class="return-error" id="feature-error">{{ $message }}</div>
                                @enderror
                            </div> --}}
                            <div class="prof_img">
                                {{-- <img src="" alt="" width="100px" height="100px"> --}}
                                @if ($user->logo != null || $user->logo != '')
                                    <img src="{{ asset($user->logo) }}" alt="Logo" class="img-thumbnail rounded-circle"
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
        let about,long;
        $(document).ready(function() {
            $('.select_two').select2({
                placeholder: "Select venue types",
                allowClear: true,
                width: '100%'
            });
            $('#logo').change(function(e) {
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
              ClassicEditor.create(document.querySelector('#about_us'),{
                toolbar:[
                    'bold','italic'
                ]
              }).catch(error=>console.log(error))
              ClassicEditor.create(document.querySelector('#long_description'),
              {
                toolbar:[
                    'bold','italic','insertTable'
                ]}).then(editor=>{long=editor}).catch(error=>console.log(error))
              document.querySelector('form').addEventListener('submit',(event)=>{
                // event.preventDefault();
                if(long) document.querySelector('#long_description').value=long.getData(
                )
                console.log(long.getData())
              })
        });
    </script>
    {{-- <script>
        $(document).ready(function() {
            $('#feature').select2({
                tags: true, // allow typing new values
                // tokenSeparators: [','], // separate values by comma
                placeholder: "Type and press Enter...",
                width: '100%'
            });
        });
    </script> --}}
    <script src="{{ asset('manual_js/service_provider.js') }}" defer></script>
@endpush
