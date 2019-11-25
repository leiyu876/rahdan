@extends('layouts.app_admin')

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" action="{{ route('missingparts.update', $missingpart) }}" class="form-horizontal">
                {{ @csrf_field() }}
                {{ @method_field('patch') }}
              <div class="box-body">
              
                <div class="form-group">
                  @if($errors->has('partno'))
                        <span class="control-label text-danger"><i class="fa fa-times-circle-o"></i> {{ $errors->first('partno') }}</span>
                    @endif
                  <label for="partno" class="col-sm-3 control-label">Part Number</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="partno" name="partno" value="{{ old('partno', $missingpart->partno) }}">
                  </div>
                </div>
              
                <div class="form-group">
                    @if($errors->has('qty'))
                        <span class="control-label text-danger"><i class="fa fa-times-circle-o"></i> {{ $errors->first('qty') }}</span>
                    @endif
                    <label for="qty" class="col-sm-3 control-label">Quantity</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="qty" name="qty" value="{{ old('qty', $missingpart->qty) }}">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="qty" class="col-sm-3 control-label">Comment</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" rows="3"  id="comment" name="comment">{{ old('comment', $missingpart->comment) }}</textarea>
                    </div>
                </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="{{ route('missingparts.index') }}" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-info pull-right">Update</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
        </div>
    </div>

@endsection()

