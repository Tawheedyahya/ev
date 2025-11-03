@extends('service_providers.service_app')
@section('title', 'Dashboard')


@section('content')
<h2 style="padding-bottom: 40px;">Gallery Content</h2>
<div class="container-fluid px-4">
    @include('components.toast')
    @include('service_providers.f_card',[
        'form'=>true
    ])
</div>
@endsection
