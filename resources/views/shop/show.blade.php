@extends('layouts.app')
@section('content')
<a href="/items" class="btn btn-primary mt-5">Go Back</a>
<h1>Order {{$item['id']}}</h1>

<div class="card card-body bg-light">
    <h5>Item(s):</h5>{{$item['description']}}



    <h5>Color(s):</h5>{{$item['color']}}


 
    <h5>Text to print:</h5>{{$item['print_text']}}
</div>
<small>Created on {{$item['created_at']}}</small>

@endsection
      