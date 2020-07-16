@extends('layouts.app')


@section('content')

        <div class="row justify-content-center">
            <div class="col-md-12 offset-2 mt-5">
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
							  <option value="php">Item 1</option>
							  <option value="react">Item 2</option>	
							  <option value="react">Item 3</option>	
							  <option value="react">Item 4</option>
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