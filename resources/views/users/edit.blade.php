@extends('layouts.app_admin')

@section('content')

  <div class="row">
    <!-- left column -->
    <div class="col-md-6 col-md-offset-3">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Update User</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        {!! Form::open([
        	'action' => [
        		'UsersController@update', 
        		$user->id
        	], 
        	'method' => 'PUT'
        ]) !!}
          <div class="box-body">

            <div class="form-group">
              <label for="iqama">Iqama</label>
              <input name="iqama" type="text" class="form-control{{ $errors->has('iqama') ? ' is-invalid' : '' }}" id="iqama" value="{{ old('iqama', $user->iqama) }}" required autofocus>
              @if ($errors->has('iqama'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('iqama') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
              <label for="name">Name</label>
              <input name="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" value="{{ old('name', $user->name) }}" required autofocus>
              @if ($errors->has('name'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
              <label for="email">Email address</label>
              <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email', $user->email) }}" required id="email">
                @if ($errors->has('email'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
              <label>Roles</label>
              {{Form::select('roles[]',$roles, old('roles') ?? $user->roles->pluck('name', 'name'),array('class'=>'form-control','multiple'=>'multiple'))}}
            </div>

          </div>
          <!-- /.box-body -->

          <div class="box-footer">
            <a href="{{ url('users') }}" class="btn btn-default">Cancel</a>
            <input type="submit" value="Update" class="btn btn-primary pull-right">
          </div>
        {!! Form::close() !!}
      </div>
      <!-- /.box -->


    </div>
    
  </div>

  @endsection()