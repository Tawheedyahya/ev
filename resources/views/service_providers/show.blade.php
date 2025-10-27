@extends('service_providers.service_app')
@section('title', 'Dashboard')


@section('content')
<div class="container-fluid px-4">
    @include('components.toast')
    @include('service_providers.f_card',[
        'form'=>true
    ])
</div>
@endsection
