@php
    $route=Request::segment(2);
@endphp
<div class="catagorize">
    <a href="{{url('/vendor/venue_login_form')}}" class="a-color @if (Str::Contains($route,['venue_login_form','venue_register_form']))
    a-active
    @endif">venue providers</a>
    <a href="{{url('/vendor/professionals_login')}}" class="a-color @if (Str::Contains($route,['professionals_login','venue_register_form']))
    a-active
    @endif">professionals</a>
    <a href="{{url('/vendor/service_providers_login')}}" class="a-color @if (Str::Contains($route,['service_providers_login','service_providers_register']))
    a-active
    @endif">service providers</a>
    {{-- <a href="" class="a-color">Registeration-status</a> --}}
</div>
<style>
.catagorize{
    display: flex;
    flex-wrap: wrap;
    justify-content: space-evenly;
    /* gap: 20px; */
   background: rgba(248, 248, 248, 1);

    /* padding: 20px; */
    border-radius: 30px;
    /* width: 100vw;     */
    margin-bottom: 10px;
}
.a-color{
    color: black;
    padding: 10px;
}
.a-active{
    background: rgba(247, 148, 29, 1);
    border-radius: 30px;
}
</style>
