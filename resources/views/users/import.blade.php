@extends('layouts.app_admin')

@section('content')

  <div class="row">
    <!-- left column -->
    <div class="col-md-6 col-md-offset-3">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Import Users</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('users.importrun') }}" role="form" enctype="multipart/form-data">
        {{ csrf_field() }}
          <div class="box-body">
            <div class="form-group">
              <label for="file">File</label>
              <input name="file" type="file" class="form-control{{ $errors->has('file') ? ' is-invalid' : '' }}" id="file" required autofocus>
              @if ($errors->has('file'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('file') }}</strong>
                    </span>
                @endif
            </div>           

          </div>
          <!-- /.box-body -->

          <div class="box-footer">
            <a href="{{ url('users') }}" class="btn btn-default">Cancel</a>
            <button type="submit" class="btn btn-primary pull-right">Import</button>
          </div>
        </form>
      </div>
      <!-- /.box -->


    </div>
    
  </div>

  @endsection()