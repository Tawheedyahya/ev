@php
    use Illuminate\Support\Str;
    $request = Request::segment(2);
    $title = Str::headline($request ?? 'Dashboard'); // "dashboard" -> "Dashboard"
@endphp

<div class="header">
  <div class="header-title">
    <h1 class="title-with-underline">{{ $title }}</h1>
  </div>
</div>
<style>
/* Optional: header spacing */
.header{ margin-bottom: 30px; }
</style>
