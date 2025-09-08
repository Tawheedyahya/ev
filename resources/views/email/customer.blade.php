@php
    use Illuminate\Support\Str;
@endphp

@if(Str::contains($url, 'verified'))
    <p>Welcome! Please verify your email by clicking below:</p>
    <a href="{{ $url }}">Verify Email</a>
@elseif(Str::contains($url, 'reset'))
    <p>Click below to reset your password:</p>
    <a href="{{ $url }}">Reset Password</a>
@endif
