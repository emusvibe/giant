@extends('layouts.app')


@section('content')

        <div class="row">
            <div class="col-md-12-centered offset-2 mt-5">
                <div class="card">
                    <div class="card-header bg-info">
                        <h6 class="text-white">Request Orders</h6>
                    </div>
                    <div class="card-body">
                    <form method="POST" action="{{route('items.store')}}" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label><strong>Select Item(s) :</strong></label><br/>
							<select class="selectpicker" multiple data-live-search="true" name="description[]">
							  <option value="php">PHP</option>
							  <option value="react">React</option>
							  <option value="jquery">JQuery</option>
							  <option value="javascript">Javascript</option>
							  <option value="angular">Angular</option>
							  <option value="vue">Vue</option>
							</select>
						</div>
						<div class="form-group">
							<label><strong>Select Color(s) :</strong></label><br/>
							<select class="selectpicker" multiple data-live-search="true" name="color[]">
							  <option value="black">Black</option>
							  <option value="white">White</option>
							  <option value="blue">Blue</option>
							  <option value="yellow">Yellow</option>              
							</select>
						</div>
                        <div class="form-group">
                            <label><strong>Description :</strong></label>
                            <textarea class="ckeditor form-control" name="print_text"></textarea>
                        </div>
						
						<div class="text-center" style="margin-top: 10px;">
							<button type="submit" class="btn btn-success">Save</button>
						</div>
					</form>
                    </div>
                    
                </div>
                <table class="table table-bordered mt-5">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Item</th>
                        <th scope="col">Color</th>
                        <th scope="col">Text Printed</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($items as $row)
                      <tr>
                        <td>{{$row['id']}}</td>
                        <td>{{$row['description']}}</td>
                        <td>{{$row['color']}}</td>
                        <td>{{$row['print_text']}}</td>
                        <td><a href=""></a><button class="btn btn-success">Edit</button></a> 
                            <a href=""></a><button class="btn btn-danger">Delete</button></a> </td>
                            
                           
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
       @endsection
       @section('script')
       <script type="text/javascript">
        $(document).ready(function() {
            $('select').selectpicker();
        });
        </script>
       @endsection