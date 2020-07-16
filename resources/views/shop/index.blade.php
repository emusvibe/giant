@extends('layouts.app')
@section('content')
<h1>Orders</h1>
@if(count($items) > 0)
@foreach($items as $row)

<div class="card card-body bg-light">
<h3> <a href="/items/{{$row->id}}">Order {{$row['id']}}</a></h3>
<small>Created on {{$row['created_at']}}</small>
</div>
@endforeach

@else
<p>No Orders found</p>
@endif
@endsection
      