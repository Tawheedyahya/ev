
@php
    $route=Request::segment(2);
    // echo $route;
@endphp
<div class="catagorize mt-3">
    <a href="{{url('/eventspace/venues_provider/dashboard')}}" @if ($route=='venues_provider')
    class="a-active"
   @else
   class="a-color"
    @endif>venue providers</a>
    <a href="{{url('eventspace/prof/dashboard')}}"  @if ($route=='prof')
    class="a-active"
    @else
    class="a-color"
    @endif>professionals</a>
    <a href="{{route('serpro.dashboard')}}" class="a-color">service providers</a>
</div>
<style>
.catagorize{
    display: flex;
    flex-wrap: wrap;
    gap:10px;
    justify-content: start;
    margin-bottom: 10px;
}
.a-color{
    color:black;
    padding: 10px 20px;
    border-radius: 10px;
    background: rgba(248, 248, 248, 1);
    text-decoration: none;
}
.a-color:hover{
    color: black;
}
.a-active{
    background-color: orange;
    padding: 10px 20px;
    border-radius: 10px;
    color: #fff;
}
</style>

{{-- <script>
  // Add active class on click
  document.querySelectorAll(".catagorize .a-color").forEach(link => {
    link.addEventListener("click", function(e){
      // prevent page reload if you just want highlight (optional)
      e.preventDefault();

      // remove active from all
      document.querySelectorAll(".catagorize .a-color").forEach(a => a.classList.remove("a-active"));

      // add active to clicked
      this.classList.add("a-active");
    });
  });
</script> --}}
