@php
    $route=Request::segment(2);
@endphp
<div class="catagorize">
    <a href="{{url('/vendor/venue_login_form')}}" class="a-color @if (Str::Contains($route,['venue_login_form','venue_register_form']))
    a-active
    @endif">Venue Providers</a>
    <a href="{{url('/vendor/professionals_login')}}" class="a-color @if (Str::Contains($route,['professionals_login','venue_register_form']))
    a-active
    @endif">Professionals</a>
    <a href="{{url('/vendor/service_providers_login')}}" class="a-color @if (Str::Contains($route,['service_providers_login','service_providers_register']))
    a-active
    @endif">Service Providers</a>
    {{-- <a href="" class="a-color">Registeration-status</a> --}}
</div>
<style>
    /* body{
        padding: 40px;
    } */
.catagorize {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-evenly;
    background: #ffffff;
    padding: 12px 8px;
    border-radius: 40px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    overflow: hidden;
}

.a-color {
    color: #333;
    padding: 10px 20px;
    font-size: 15px;
    text-decoration: none;
    border-radius: 25px;
    transition: all 0.25s ease-in-out;
    font-weight: 500;
}

/* .a-color:hover {
    background: rgba(247, 148, 29, 0.15);
    color: #000;
} */

.a-active {
    background: rgba(247, 148, 29, 1);
    color: #fff !important;
    font-weight: 600;
    box-shadow: 0 3px 8px rgba(247, 148, 29, 0.4);
}
.catagorize a {
    margin: 5px 8px;
    margin-bottom: 25px;
}

</style>
