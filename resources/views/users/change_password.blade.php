@extends('layouts.app_admin')

@section('content')

  <div class="row">
    <!-- left column -->
    <div class="col-md-6 col-md-offset-3">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Create User</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form method="PUT" action="{{ route('users.update', $user->id) }}" role="form">
        @csrf
          <div class="box-body">
			<div class="form-group">            	
              <label for="password">Current Password</label>
              <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required id="password">
                @if ($errors->has('password'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">            	
              <label for="password">New Password</label>
              <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required id="password">
                @if ($errors->has('password'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
              <label for="password_confirmation">Confirm New Password</label>
              <input type="password" class="form-control" name="password_confirmation" required id="password_confirmation">
                @if ($errors->has('password'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

          </div>
          <!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
      <!-- /.box -->


    </div>
    
  </div>

  @endsection()