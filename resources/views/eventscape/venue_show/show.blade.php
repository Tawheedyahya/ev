@extends('welcome')
@section('title', 'event booking')
@section('content')
    <div class="container-fluid " style="margin-top: 50px;">
        @include('components.toast')
        <div class="venue-rooms">
            @include('eventscape.venue_show.imageshow',['images'=>$images,'venue'=>$venue])
        </div>
        <div class="venue-address">
            @include('eventscape.venue_show.address')
        </div>
    </div>
@endsection
