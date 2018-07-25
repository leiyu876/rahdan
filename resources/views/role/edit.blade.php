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
                'RoleController@update', 
                $role->id
            ], 
            'method' => 'PUT',
            'enctype'=> 'multipart/form-data'
        ]) !!}
          <div class="box-body">
            
            <div class="form-group">
                {{ Form::label('role', 'Role Name') }}
                {{ Form::text('name', $role->name, ['class'=>'form-control', 'id'=>'name']) }}
            </div>
            <div class="form-group">
              <label>Permission</label>
              {{Form::select('permission',$permissions, old('permissions') ?? $role->permissions->pluck('name', 'name'),array('class'=>'form-control','multiple'=>'multiple','name'=>'permissions[]'))}}
            </div>
        </div>
          <!-- /.box-body -->

          <div class="box-footer">
            <a href="{{ url('role') }}" class="btn btn-default">Cancel</a>
            <input type="submit" value="Update" class="btn btn-primary pull-right">
          </div>
        {!! Form::close() !!}
      </div>
    </div>
    
  </div>

  @endsection()
