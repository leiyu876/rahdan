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
        <form method="POST" action="{{ route('suppliers.update', $supplier) }}" role="form" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{method_field('PATCH')}}
          
         	<div class="box-body">
            	<div class="form-group">
            		{{ Form::label('code', 'Code') }}
            		{{ Form::text('code', old('code', $supplier->code), ['class'=>'form-control', 'id'=>'code']) }}
            	</div>
              <div class="form-group">
                {{ Form::label('name', 'Supplier Name') }}
                {{ Form::text('name', old('name', $supplier->name), ['class'=>'form-control', 'id'=>'name']) }}
              </div>
              <div class="form-group">
                <label>Type</label>
                <select name="type" class="form-control">
                  <option value="cash" {{ $supplier->type == 'cash' ? 'selected' : ''}} >Cash</option>
                  <option value="credit" {{ $supplier->type == 'credit' ? 'selected' : ''}}>Credit</option>
                  <option value="cashcredit" {{ $supplier->type == 'cashcredit' ? 'selected' : ''}}>Cash or Credit</option>
                </select>
              </div>
          </div>
          <div class="box-footer">
	        	<a href="{{ url('suppliers') }}" class="btn btn-default">Cancel</a>
	        	<button type="submit" class="btn btn-primary pull-right">Update</button>
	        </div>
        </form>
      </div>
    </div>
  </div>

@endsection()

