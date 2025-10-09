<h1>name:{{$professional->name}}</h1>
<h1>company_name:{{$professional->company_name}}</h1>

<img data-src="{{asset($professional->prof_logo)}}" alt="" width="100px" height="100px" class=" img-fluid lazyload">
<h1>experience:{{$professional->experience}}</h1>
<h1>price per hour:{{$professional->price}}</h1>


<a class="btn btn-warning" href="" class="book_event">book event</a>
@extends('components.modal')
@section('modal_title')
