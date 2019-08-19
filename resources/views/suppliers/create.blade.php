@extends('layouts.app_admin')

@section('content')

  <div class="row">
    <!-- left column -->
    <div class="col-md-6 col-md-offset-3">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">{{ $page_title }}</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('suppliers.store') }}" role="form" enctype="multipart/form-data">
        {{ csrf_field() }}
          
         	<div class="box-body">
            	<div class="form-group">
            		{{ Form::label('code', 'Code') }}
            		{{ Form::text('code', old('code', ''), ['class'=>'form-control', 'id'=>'code']) }}
            	</div>
              <div class="form-group">
                {{ Form::label('name', 'Supplier Name') }}
                {{ Form::text('name', old('name', ''), ['class'=>'form-control', 'id'=>'name']) }}
              </div>
              <div class="form-group">
                <label>Type</label>
                <select name="type" class="form-control">
                  <option value="cash">Cash</option>
                  <option value="credit">Credit</option>
                  <option value="cash or credit">Cash or Credit</option>
                </select>
              </div>
          </div>
          <div class="box-footer">
	        	<a href="{{ url('suppliers') }}" class="btn btn-default">Cancel</a>
	        	<button type="submit" class="btn btn-primary pull-right">Create</button>
	        </div>
        </form>
      </div>
    </div>
  </div>

@endsection()

