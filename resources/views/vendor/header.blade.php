@php
    $route=Request::segment(2);
@endphp
<div class="catagorize">
    <a href="" class="a-color @if (Str::Contains($route,['venue_login_form','venue_register_form']))
    a-active
    @endif">venue providers</a>
    <a href="" class="a-color">professionals</a>
    <a href="" class="a-color">service providers</a>
    {{-- <a href="" class="a-color">Registeration-status</a> --}}
</div>
<style>
.catagorize{
    display: flex;
    flex-wrap: wrap;
    justify-content: space-evenly;
    /* gap: 20px; */
    background: linear-gradient(135deg, #ffecd2, #fcb69f);
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
    background-color: orange;
    border-radius: 30px;
}
</style>
