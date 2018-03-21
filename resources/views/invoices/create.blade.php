@extends('layouts.app_admin')

@section('content')

  <div class="row">
    <!-- left column -->
    <div class="col-md-6 col-md-offset-3">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Create Fatora</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('invoices.store') }}" role="form">
        @csrf
          <div class="box-body">
            <div class="form-group">
              <label for="partno">Part Number</label>
              <input name="partno" type="text" class="form-control{{ $errors->has('partno') ? ' is-invalid' : '' }}" id="partno" value="{{ old('partno') }}" required autofocus>
              @if ($errors->has('partno'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('partno') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
              <label for="user_id">Salesman</label>
              <? $list = array(); ?>
              @foreach($users as $user)
                <? $list[$user->id] = $user->name; ?>
              @endforeach
              {{ Form::select('user_id', $list, old('user_id'),['class'=>'form-control'.($errors->has('user_id') ? ' is-invalid' : ''), 'id'=>'user_id'])}}
              @if ($errors->has('user_id'))
                  <span class="invalid-feedback">
                      <strong>{{ $errors->first('user_id') }}</strong>
                  </span>
              @endif
            </div>

            <div class="form-group">
              <label for="qty">Quantity</label>
              <input name="qty" type="text" class="form-control{{ $errors->has('qty') ? ' is-invalid' : '' }}" id="qty" value="{{ old('qty') }}" required autofocus>
              @if ($errors->has('qty'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('qty') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="date">Date</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input name="date" type="text" class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }} pull-right" id="date" value="{{ old('date') }}">
                  @if ($errors->has('date'))
                      <span class="invalid-feedback">
                          <strong>{{ $errors->first('date') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

          </div>
          <!-- /.box-body -->

          <div class="box-footer">
            <a href="{{ url('invoices') }}" class="btn btn-default">Cancel</a>
            <button type="submit" class="btn btn-primary pull-right">Create</button>
          </div>
        </form>
      </div>
      <!-- /.box -->


    </div>
    
  </div>

  @endsection()

  @section('js')
    <script src="{{ asset('custom_adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>

    <script type="text/javascript">
      $('#date').datepicker({
        autoclose: true,
        format: 'dd-mm-yyyy'
      });
    </script>>
  @endsection