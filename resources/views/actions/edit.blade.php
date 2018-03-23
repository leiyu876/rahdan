@extends('layouts.app_admin')

@section('content')

  <div class="row">
    <!-- left column -->
    <div class="col-md-6 col-md-offset-3">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Update Action</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        {!! Form::open([
        	'action' => [
        		'ActionsController@update', 
        		$action->id
        	], 
        	'method' => 'PUT'
        ]) !!}
          <div class="box-body">

            <div class="form-group">
              <label for="code">Action Code</label>
              <input name="code" type="text" class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}" id="code" value="{{ old('code', $action->code) }}" required autofocus>
              @if ($errors->has('code'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('code') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
              <label for="name">Action Name</label>
              <input name="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" value="{{ old('name', $action->name) }}" required autofocus>
              @if ($errors->has('name'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
          </div>
          
          <div class="box-footer">
            <a href="{{ url('actions') }}" class="btn btn-default">Cancel</a>
            <input type="submit" value="Update" class="btn btn-primary pull-right">
          </div>
        {!! Form::close() !!}
      </div>
      <!-- /.box -->


    </div>
    
  </div>

  @endsection()