<p>service place</p>
@forelse ($service_place as $place)
<h1 class="text-warning">{{$place}}</h1>
@empty
<h1>no service place is mentioned</h1>
@endforelse
