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
<hr>
<a href="/items/{{$item->id}}/edit" class="btn btn-primary">Edit</a>


<form method="POST" action="{{action('ItemsController@destroy',$item->id)}}" enctype="multipart/form-data">
    @csrf
    @method('delete')
  <div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div>
      <button id="submit" name="submit" class="btn btn-danger">Delete</button>
  </div>
  </div>   

</form>

@endsection
      