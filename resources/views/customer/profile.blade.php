@extends('welcome')
@section('title','dashboard')

@section('content')
<div class="dashboard-wrap">
    @include('components.toast')
  {{-- MOBILE TOGGLE BUTTON --}}
  <button class="sidebar-toggle d-md-none" onclick="toggleSidebar()">☰ Menu</button>
@php
    $request=Request::segment(2);
    // echo $request;
@endphp
  {{-- SIDEBAR --}}
  <aside class="sidebar" id="sidebar">
    <button class="sidebar-toggle d-md-none" onclick="toggleSidebar()">☰ hide</button>
    <a href="#" class="@if ($request=='profile') active
    @endif">Profile</a>
    <a href="#">Liked Venues</a>
    <a href="#">Liked Services</a>
    <a href="#">Liked Professionals</a>
    <a href="{{url('/customer/logout')}}">Log out</a>
  </aside>

  {{-- MAIN --}}
  <main class="main-content row">
    <div class="profile-card col-12  col-xl-6 ">
      <div class=" row">
        <div class="col">
            <i class="bi bi-person-circle"></i>
        </div>
        <div class="col profile-details">
            <h5>Name</h5>
            <p>{{Auth::user()->name}}</p>
            <p>{{Auth::user()->phone}}</p>
        </div>
      </div>
    </div>
  </main>

</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{asset('manual_css/profile.css')}}">
@endpush

@push('scripts')
<script>
function toggleSidebar() {
  document.getElementById("sidebar").classList.toggle("show");
}
</script>
@endpush
