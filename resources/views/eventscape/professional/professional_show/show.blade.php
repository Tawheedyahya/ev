@extends('welcome')
@section('title', 'professional')
@section('content')
    <div class="container-fluid " style="margin-top: 50px;">
        @include('components.toast')
        <div class="prof-details">
            @include('eventscape.professional.professional_show.prof_details')
        </div>
        <div class="prof-places">
            @include('eventscape.professional.professional_show.prof_places')
        </div>
    </div>
@endsection
