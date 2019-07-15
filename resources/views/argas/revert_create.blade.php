@extends('layouts.app_admin')

@section('content')

  <div class="row">
    <!-- left column -->
    <div class="col-md-6 col-md-offset-3">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Reverting</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('argas.revert.store', $pickslip_argas) }}" role="form">
        {{ csrf_field() }}
          <div class="box-body">

            <div class="form-group">
              <label for="qty">{{ $pickslip_argas->partno }}</label><br/>
              <label for="qty">{{ $pickslip_argas->description }}</label><br/>
              <label for="qty">change (1 - {{ $pickslip_argas->qty_ready }})</label>
              <input name="qty" type="number" class="form-control{{ $errors->has('qty') ? ' is-invalid' : '' }}" value="{{ old('qty') }}" step="1" required autofocus min="1" max="{{ $pickslip_argas->qty_ready }}">
              @if ($errors->has('qty'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('qty') }}</strong>
                    </span>
                @endif
            </div>

          </div>
          <!-- /.box-body -->

          <div class="box-footer">
            <a href="{{ URL::previous() }}" class="btn btn-default">Cancel</a>
            <button type="submit" class="btn btn-primary pull-right">Revert</button>
          </div>
        </form>
      </div>
      <!-- /.box -->


    </div>
    
  </div>

  @endsection()