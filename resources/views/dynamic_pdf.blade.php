@extends('layouts.app')
@section('content')
        <div class="row">
            <div class="col-lg-12-centered offset-2 mt-5">    
                <div class="col-md-7" align="right">
                    <h4>Items Data</h4> 
                </div>
               
                <div class="col-md-7" align="right">
                <a href="{{url('dynamic_pdf/pdf')}}">Convert into PDF</a> 

                </div>

               
                <table class="table table-bordered w-auto">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Item</th>
                        <th>Color</th>
                        <th>Text Printed</th>
                        <th>Date Created</th>
                        {{-- <th>Action</th> --}}
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($items_data as $item)
                      <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->description}}</td>
                        <td>{{$item->color}}</td>
                        <td>{{$item->print_text}}</td>
                        <td>{{$item->created_at}}</td>
                        {{-- <td><a href=""></a><button class="btn btn-success">Edit</button></a> 
                            <a href=""></a><button class="btn btn-danger">Delete</button></a> </td>                    --}}
                           
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
       @endsection
      