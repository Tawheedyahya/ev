@extends('welcome')

@section('title')
    Register
@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset('manual_css/form.css') }}">
@endpush
@section('content')
    @include('components.toast')
    <div class="container form-container">
        {{-- @include('vendor.header') --}}
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card form-card">
                    <div class="card-header form-header">
                        Venue providers Registration
                    </div>

                    <div class="card-body form-body">
                        <form action="{{route('venue.register')}}" method="POST" id="register_form" enctype="multipart/form-data">
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

                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Enter email" value="{{ old('email') }}">
                                @error('email')
                                    <div class="return-error" id="email-error">{{ $message }}</div>
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
                                <label for="doc" class="form-label">File <span>*Government authority document for verification or company registered certificate*</span></label>
                                <input type="file" class="form-control" id="doc"
                                    name="doc" placeholder="provide a govt issued documents" required>
                                @error('password_cofirmation')
                                    <div class="return-error" id="file-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Submit -->
                            <div class="mt-3 form-end">
                                <button type="submit" class="btn form-submit-btn">
                                    Register
                                </button>
                                <a href="{{url('vendor/venue_login_form')}}">Login?</a>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

<style>
    /* --- Card Layout --- */
.form-container { padding: 28px 0 60px; }
.form-card {
  border: 0;
  border-radius: 16px;
  overflow: hidden;
  box-shadow: 0 12px 40px rgba(0,0,0,.08);
  background: #fff;
}
.form-header {
  background: #f7b500;
  color: #111;
  font-weight: 700;
  text-align: center;
  padding: 16px 18px;
  font-size: 20px;
}
.form-body { padding: 22px 24px 26px; }

/* --- Labels & Inputs --- */
.form-label { font-weight: 600; color: #2b2b2b; margin-bottom: 6px; }
.form-control {
  border:1px solid #e6e9f0; background:#f6f8ff; border-radius:10px;
  padding:10px 12px; height:44px; box-shadow:none;
  transition: border-color .2s, box-shadow .2s, background .2s;
}
.form-control::placeholder { color:#9aa3b2; }
.form-control:focus {
  background:#fff;
  border-color:#f7941d;
  box-shadow:0 0 0 4px rgba(247,148,29,.18);
  outline:none;
}

/* File input */
input[type="file"].form-control {
  padding:10px; background:#fff;
}

/* Error styling */
.return-error {
  color:#d43d3d;
  font-size:12px;
  margin-top:6px;
  line-height:1.3;
}

/* Submit */
.form-end {
  display:flex; align-items:center; justify-content:space-between;
  gap:18px; flex-wrap:wrap; margin-top:6px;
}
.form-submit-btn {
  background:#f7b500;
  border:0;
  color:#111;
  font-weight:700;
  padding:10px 20px;
  border-radius:10px;
  transition:transform .12s, box-shadow .2s, background .2s;
}
.form-submit-btn:hover {
  background:#f6a300;
  box-shadow:0 6px 18px rgba(247,148,29,.35);
  transform:translateY(-1px);
}
.form-end a {
  color:#1a73e8;
  text-decoration:none;
  font-weight:500;
}
.form-end a:hover { text-decoration:underline; }

/* Mobile fix */
@media (max-width:576px){
  .form-body{ padding:18px; }
  .form-end{ gap:12px; }
}

</style>

    @push('scripts')
        <script src="{{ asset('manual_js/venue_providers/providers_register.js') }}" defer></script>
    @endpush
@endsection
