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
        		'PartnumbersController@update', 
        		$partnumber->id
        	], 
        	'method' => 'PUT',
            'enctype'=> 'multipart/form-data'
        ]) !!}
          <div class="box-body">
            
            <div class="form-group">
                {{ Form::label('agencynum', 'Agency Number') }}
                {{ Form::text('agencynum', $partnumber->agencynum, ['class'=>'form-control', 'id'=>'agencynum']) }}
            </div>
            <div class="form-group">
                {{ Form::label('rahdannum', 'Rahdan Number') }}
                {{ Form::text('rahdannum', $partnumber->rahdannum, ['class'=>'form-control', 'id'=>'rahdannum']) }}
            </div>
        </div>
          <!-- /.box-body -->

          <div class="box-footer">
            <a href="{{ url('movies') }}" class="btn btn-default">Cancel</a>
            <input type="submit" value="Update" class="btn btn-primary pull-right">
          </div>
        {!! Form::close() !!}
      </div>
    </div>
    
  </div>

  @endsection()