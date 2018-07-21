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
        <form method="POST" action="{{ route('partnumbers.store') }}" role="form" enctype="multipart/form-data">
        {{ csrf_field() }}
          
         	<div class="box-body">
            	<div class="form-group">
            		{{ Form::label('agencynum', 'Agency Number') }}
            		{{ Form::text('agencynum',null, ['class'=>'form-control', 'id'=>'agencynum']) }}
            	</div>
              <div class="form-group">
                {{ Form::label('rahdannum', 'Rahdan Number') }}
                {{ Form::text('rahdannum',null, ['class'=>'form-control', 'id'=>'rahdannum']) }}
              </div>
          	</div>
          <div class="box-footer">
	        	<a href="{{ url('partnumbers') }}" class="btn btn-default">Cancel</a>
	        	<button type="submit" class="btn btn-primary pull-right">Create</button>
	        </div>
        </form>
      </div>
    </div>
  </div>

@endsection()

