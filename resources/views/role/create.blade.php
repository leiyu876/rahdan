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
        <form method="POST" action="{{ route('role.store') }}" role="form" enctype="multipart/form-data">
        {{ csrf_field() }}
          
            <div class="box-body">
                <div class="form-group">
                    {{ Form::label('name', 'Role Name') }}
                    {{ Form::text('name',null, ['class'=>'form-control', 'id'=>'name']) }}
                </div>
                <div class="form-group">
                  <label>Permission</label>
                  {{Form::select('permissions',$permissions,null,array('class'=>'form-control','multiple'=>'multiple','name'=>'permissions[]'))}}
                </div>
          </div>
          <div class="box-footer">
                <a href="{{ url('role') }}" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-primary pull-right">Create</button>
            </div>
        </form>
      </div>
    </div>
  </div>

@endsection()
