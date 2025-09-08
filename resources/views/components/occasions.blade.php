@php
   use App\Models\Occasion;
   $lists = Occasion::all();
@endphp

<div class=" my-3">
  <div class="occasions-sub-body ">
    @foreach ($lists as $list)
      <div class=" text-center ">
        <img src="{{ asset('occasion_icon/birthday.png') }}" alt="Occasion" class="img-fluid mb-2" style="max-width:100px;">
        <p>{{ $list->name }}</p>
      </div>
    @endforeach
  </div>
</div>
<style>
    .occasions-sub-body{
        display: flex;
        gap: 60px;
    }
</style>
