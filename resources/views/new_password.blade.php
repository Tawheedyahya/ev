@extends('welcome')
@section('title')
password reset
@endsection
@push('scripts')
<link rel="stylesheet" href="{{asset('manual_css/form.css')}}">
@endpush
@section('content')
<div class="container form-container">
    <div class="row justify-content-center" >
        <div class="col-md-6">
            <div class="card form-card">
                <div class="card-header form-header">
                    Change password
                </div>
                <div class="form-body card-body">
                    <form action="{{ route('set_pass', [$user->id, $v_id, $token]) }}" id="password_reset" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="password" class="form-label">New password</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation">Re-type password</label>
                            <input type="password" name="password_confirmation" id="" class="form-control">
                        </div>
                        <div class="form-end">
                            <button type="submit" class="btn form-submit-btn">save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script src="{{asset('manual_js/customer/password_reset.js')}}" defer></script>
@endpush
@endsection
