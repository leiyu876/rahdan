@extends('layouts.app_admin')

@section('content')

  <div class="row">
    <!-- left column -->
    <div class="col-md-6 col-md-offset-3">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Create Action</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('actions.store') }}" role="form">
        {{ csrf_field() }}
          <div class="box-body">

            <div class="form-group">
              <label for="code">Action Code</label>
              <input name="code" type="text" class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}" id="code" value="{{ old('code') }}" required autofocus>
              @if ($errors->has('code'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('code') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
              <label for="name">Action Name</label>
              <input name="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" value="{{ old('name') }}" required autofocus>
              @if ($errors->has('name'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>

          </div>
          <!-- /.box-body -->

          <div class="box-footer">
            <a href="{{ url('actions') }}" class="btn btn-default">Cancel</a>
            <button type="submit" class="btn btn-primary pull-right">Create</button>
          </div>
        </form>
      </div>
      <!-- /.box -->


    </div>
    
  </div>

  @endsection()