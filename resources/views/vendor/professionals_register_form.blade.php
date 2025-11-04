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
                        Professionals Registration
                    </div>

                    <div class="card-body form-body">
                        <form action="{{route('professionals.register')}}" method="POST" id="register_form" enctype="multipart/form-data">
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
                                <label for="profession" class="form-label">Professional</label>
                                {{-- <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Enter email" value="{{ old('email') }}"> --}}
                                <select name="profession" id="profession">
                                    <option value=""></option>
                                    @foreach ($professional_list as $prof)
                                        <option value="{{ $prof->id }}">{{ $prof->name }}</option>
                                    @endforeach
                                </select>
                                @error('profession')
                                    <div class="return-error" id="profession-error">{{ $message }}</div>
                                @enderror
                            </div>

                             <!-- Experience -->
                            <div class="mb-3">
                                <label for="experience" class="form-label">Experience</label>
                                <input type="number" step="0.01" class="form-control" id="experience" name="experience"
                                    placeholder="Enter youre experience" value="{{ old('experience') }}">
                                @error('experience')
                                    <div class="return-error" id="experience-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Phone -->
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="tel" class="form-control" id="phone" name="phone"
                                    placeholder="Enter phone number" value="{{ old('phone') }}">
                                @error('phone')
                                    <div class="return-error" id="phone-error">{{ $message }}</div>
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
                            <div class="mb-3">
                                <label for="doc" class="form-label">File <span>*Government authority document for
                                        verification or company registered certificate*</span></label>
                                <input type="file" class="form-control" id="doc" name="doc"
                                    placeholder="provide a govt issued documents" accept="application/pdf">
                                @error('doc')
                                    <div class="return-error" id="file-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Submit -->
                            <div class="mt-3 form-end">
                                <button type="submit" class="btn form-submit-btn">
                                    Register
                                </button>
                                <a href="{{ url('vendor/professionals_login') }}">Login?</a>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @push('scripts')
        <script src="{{ asset('manual_js/profession_register.js') }}" defer></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" defer></script>

        {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
        <script>
            $(document).ready(function() {
                $('#profession').select2({
                    placeholder: "Select venue types",
                    allowClear: true,
                    width: '100%',
                    //   theme: 'bootstrap-5'
                });
            });
        </script>

<style> 
/* --- Layout & Card --- */
.form-container { padding: 28px 0 60px; }
.form-card {
  border: 0;
  border-radius: 16px;
  overflow: hidden;
  box-shadow: 0 12px 40px rgba(0,0,0,.08);
  background: #fff;
}
.form-header {
  background: #f7b500;           /* matches your yellow brand */
  color: #111;
  font-weight: 700;
  text-align: center;
  padding: 16px 18px;
  font-size: 20px;
}
.form-body { padding: 22px 24px 26px; }

/* --- Typography --- */
.form-label {
  font-weight: 600;
  color: #2b2b2b;
  margin-bottom: 6px;
}
.form-body .form-text,
.return-error { font-size: 12px; line-height: 1.3; }

/* --- Inputs --- */
.form-control {
  border: 1px solid #e6e9f0;
  background: #f6f8ff;
  border-radius: 10px;
  padding: 10px 12px;
  height: 44px;
  box-shadow: none;
  transition: border-color .2s ease, box-shadow .2s ease, background .2s ease;
}
.form-control::placeholder { color: #9aa3b2; }
.form-control:focus {
  background: #fff;
  border-color: #f7941d;
  box-shadow: 0 0 0 4px rgba(247,148,29,.18);
  outline: none;
}

/* Textareas (if any later) */
textarea.form-control { height: auto; min-height: 110px; resize: vertical; }

/* --- File input --- */
input[type="file"].form-control {
  height: auto;
  padding: 10px;
  background: #fff;
}

/* --- Errors --- */
.return-error {
  color: #d43d3d;
  margin-top: 6px;
}

/* --- Submit & footer actions --- */
.form-end {
  display: flex; align-items: center; gap: 18px; flex-wrap: wrap;
  justify-content: space-between; margin-top: 6px;
}
.form-submit-btn {
  background: #f7b500;
  border: 0;
  color: #111;
  font-weight: 700;
  padding: 10px 20px;
  border-radius: 10px;
  transition: transform .12s ease, box-shadow .2s ease, background .2s ease;
}
.form-submit-btn:hover { background: #f6a300; box-shadow: 0 6px 18px rgba(247,148,29,.35); transform: translateY(-1px); }
.form-end a { color: #1a73e8; text-decoration: none; font-weight: 500; }
.form-end a:hover { text-decoration: underline; }

/* --- Select2 (match inputs) --- */
.select2-container--default .select2-selection--single {
  height: 44px;
  border: 1px solid #e6e9f0;
  border-radius: 10px;
  background: #f6f8ff;
}
.select2-container--default .select2-selection--single .select2-selection__rendered {
  line-height: 44px; padding-left: 12px; color: #2b2b2b;
}
.select2-container--default .select2-selection--single .select2-selection__arrow {
  height: 44px; right: 10px;
}
.select2-container--default.select2-container--focus .select2-selection--single,
.select2-container--default .select2-selection--single:focus {
  border-color: #f7941d;
  box-shadow: 0 0 0 4px rgba(247,148,29,.18);
  background: #fff;
}

/* --- Small screens --- */
@media (max-width: 576px) {
  .form-body { padding: 18px; }
  .form-end { gap: 12px; }
}
</style>

    @endpush
@endsection
