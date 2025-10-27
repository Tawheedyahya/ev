@extends('welcome')

@section('title')
    Register
@endsection
@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('manual_css/form.css') }}">
    <link rel="stylesheet" href="{{asset('manual_css/select2.css')}}">
@endpush
@section('content')
    @include('components.toast')
    <div class="container form-container">
        {{-- @include('vendor.header') --}}
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card form-card">
                    <div class="card-header form-header">
                        Service provider Registration
                    </div>

                    <div class="card-body form-body">
                        <form action="{{route('serviceprovider.register')}}" method="POST" id="register_form" enctype="multipart/form-data">
                            @csrf

                            <!-- Name -->
                            <div class="mb-3">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Enter full name" value="{{ old('name') }}">
                                @error('name')
                                    <div class="return-error" id="name-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="company_name" class="form-label">Company Name</label>
                                <input type="text" class="form-control" id="company_name" name="company_name"
                                    placeholder="Enter company name" value="{{ old('company_name') }}">
                                @error('name')
                                    <div class="return-error" id="company_name-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Enter email" value="{{ old('email') }}">
                                @error('email')
                                    <div class="return-error" id="email-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- City -->
                            <div class="mb-3">
                                <label for="city" class="form-label">City</label>
                                <input type="city" class="form-control" id="city" name="city"
                                    placeholder="Enter your city" value="{{ old('city') }}">
                                @error('city')
                                    <div class="return-error" id="email-city">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Profession -->
                            <div class="mb-3">
                                <label for="category" class="form-label">category</label>
                                <select name="category" id="category">
                                    <option value=""></option>
                                    @foreach ($category as $prof)
                                        <option value="{{ $prof->id }}">{{ $prof->name }}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                    <div class="return-error" id="category-error">{{ $message }}</div>
                                @enderror
                            </div>

                             <!-- Experience -->
                            {{-- <div class="mb-3">
                                <label for="experience" class="form-label">Experience</label>
                                <input type="number" step="0.01" class="form-control" id="experience" name="experience"
                                    placeholder="Enter youre experience" value="{{ old('experience') }}">
                                @error('experience')
                                    <div class="return-error" id="experience-error">{{ $message }}</div>
                                @enderror
                            </div> --}}

                            <!-- Phone -->
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="tel" class="form-control" id="phone" name="phone"
                                    placeholder="Enter phone number" value="{{ old('phone') }}">
                                @error('phone')
                                    <div class="return-error" id="phone-error">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- instagram --}}
                            <div class="mb-3">
                                <label for="instagram" class="form-label">Instagram</label>
                                <input type="text" class="form-control" id="instagram" name="instagram"
                                    placeholder="Enter instagram url" value="{{ old('instagram') }}">
                                @error('instagram')
                                    <div class="return-error" id="instagram-error">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- facbook --}}
                             <div class="mb-3">
                                <label for="facebook" class="form-label">Facebook</label>
                                <input type="text" class="form-control" id="facebook" name="facebook"
                                    placeholder="Enter facebook url" value="{{ old('facebook') }}">
                                @error('facebook')
                                    <div class="return-error" id="facebook-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Enter password" value="{{ old('password') }}">
                                @error('password')
                                    <div class="return-error" id="password-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Confirm Password -->
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="password_confirmation"
                                    name="password_confirmation" placeholder="Re-enter password">
                                @error('password_cofirmation')
                                    <div class="return-error" id="password_confirmation-error">{{ $message }}</div>
                                @enderror
                            </div>
                            {{-- documents --}}
                            {{-- <div class="mb-3">
                                <label for="doc" class="form-label">File <span>*Government authority document for
                                        verification or company registered certificate*</span></label>
                                <input type="file" class="form-control" id="doc" name="doc"
                                    placeholder="provide a govt issued documents" accept="application/pdf">
                                @error('doc')
                                    <div class="return-error" id="file-error">{{ $message }}</div>
                                @enderror
                            </div> --}}

                            <!-- Submit -->
                            <div class="mt-3 form-end">
                                <button type="submit" class="btn form-submit-btn">
                                    Register
                                </button>
                                <a href="{{ url('vendor/service_providers_login') }}">Login?</a>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @push('scripts')
        <script src="{{ asset('manual_js/service_provider.js') }}" defer></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" defer></script>

        {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
        <script>
            $(document).ready(function() {
                $('#category').select2({
                    placeholder: "Select venue types",
                    allowClear: true,
                    width: '100%',
                    //   theme: 'bootstrap-5'
                });
            });
        </script>
    @endpush
@endsection
