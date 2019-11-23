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
        {!! Form::open([
          'action' => [
            'UsersController@change_expiry_save', 
            $user
          ], 
          'method' => 'PUT'
        ]) !!}
          <div class="box-body">
            <span>Before : 
              @if(is_null($user->password_expires_at))
                Unlimited
              @else
                {{ \Carbon\Carbon::parse($user->password_expires_at)->diffForHumans() }}
              @endif
            </span>
			     <div class="form-group">            	
              <label for="password_current">New Expiry Date</label>             
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="date" name="expiry_date" required class="form-control pull-right">                                  
              </div>
              @if ($errors->has('expiry_date'))
                  <span class="invalid-feedback">
                      <strong>{{ $errors->first('expiry_date') }}</strong>
                  </span>
              @endif
            </div>

          </div>
          <!-- /.box-body -->

          <div class="box-footer">
            <a href="{{ url('users') }}" class="btn btn-default">Cancel</a>
            <button type="submit" class="btn btn-primary pull-right">Submit</button>
          </div>
        {{ Form::close() }}
      </div>
      <!-- /.box -->


    </div>
    
  </div>

  @endsection()