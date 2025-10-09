 {{-- MOBILE TOGGLE BUTTON --}}
  <button class="sidebar-toggle d-md-none" onclick="toggleSidebar()">☰ Menu</button>
@php
    $request=Request::segment(2);
    // echo $request;
@endphp
  {{-- SIDEBAR --}}
  <aside class="sidebar" id="sidebar">
    <button class="sidebar-toggle d-md-none" onclick="toggleSidebar()">☰ hide</button>
    <a href="{{url('/customer/profile')}}" class="@if ($request=='profile') active
    @endif">Profile</a>
    <a href="{{url('/customer/liked_venues')}}" class="@if ($request=='liked_venues') active
    @endif">Liked Venues</a>
    <a href="#">Liked Services</a>
    <a href="#">Liked Professionals</a>
    <a href="{{url('/customer/logout')}}">Log out</a>
  </aside>
