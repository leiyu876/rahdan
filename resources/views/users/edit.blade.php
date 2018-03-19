@extends('layouts.app')

@section('css')
	<link rel="stylesheet" href="{{ asset('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')
	<section class="content">
      	<div class="row">
        	<div class="col-md-12">
        		@if($errors->any())
	            	<div class="alert alert-danger alert-dismissible">
		                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
		                <ul>
	            			@foreach($errors->all() as $error)
	            				<li>{{ $error }}</li>
	            			@endforeach
	            		</ul>
		            </div>
	            @endif
          		<div class="box box-info">
		            <div class="box-header with-border">
		              	<h3 class="box-title">Update User</h3>
		            </div>
		            
                    {!! Form::open([
                    	'action' => [
                    		'UsersController@update', 
                    		$user->id
                    	], 
                    	'method' => 'PUT', 
                    	'class'  => 'form-horizontal'
                    ]) !!}
		              	<div class="box-body">
		              		<div class="form-group">
		                  		{{ Form::label('email', 'Email', ['class'=>'col-sm-2 control-label']) }}
	                  			<div class="col-sm-8">
	                    			{{ Form::email('email', $user->email, ['class'=>'form-control', 'id'=>'email']) }}
	                  			</div>
		                	</div>
		                	<div class="form-group">
		                  		{{ Form::label('first_name', 'First Name', ['class'=>'col-sm-2 control-label']) }}
		                  		<div class="col-sm-8">
		                    		{{ Form::text('first_name', $user->first_name, ['class'=>'form-control', 'id'=>'first_name']) }}
		                  		</div>
		                	</div>
		                	<div class="form-group">
		                  		{{ Form::label('last_name', 'Last Name', ['class'=>'col-sm-2 control-label']) }}
		                  		<div class="col-sm-8">
		                    		{{ Form::text('last_name', $user->last_name, ['class'=>'form-control', 'id'=>'last_name']) }}
		                  		</div>
		                	</div>
		                	<div class="form-group">
		                  		{{ Form::label('middle_name', 'Middle Name', ['class'=>'col-sm-2 control-label']) }}
		                  		<div class="col-sm-8">
		                    		{{ Form::text('middle_name', $user->middle_name, ['class'=>'form-control', 'id'=>'middle_name']) }}
		                  		</div>
		                	</div>
		                	<div class="form-group">
		                  		{{ Form::label('nick_name', 'Nick Name', ['class'=>'col-sm-2 control-label']) }}
		                  		<div class="col-sm-8">
		                    		{{ Form::text('nick_name', $user->nick_name, ['class'=>'form-control', 'id'=>'nick_name']) }}
		                  		</div>
		                	</div>
		                	<div class="form-group">
		                  		{{ Form::label('birthday', 'Birthday', ['class'=>'col-sm-2 control-label']) }}
		                  		<div class="col-sm-8">
		                    		{{ Form::date('birthday', $user->birthday, ['class'=>'form-control', 'id'=>'birthday']) }}
		                  		</div>
		                	</div>
		                	<div class="form-group">
		                  		{{ Form::label('gender', 'Gender', ['class'=>'col-sm-2 control-label']) }}
		                  		<div class="col-sm-8">
		                    		{{ Form::text('gender', $user->gender, ['class'=>'form-control', 'id'=>'gender']) }}
		                  		</div>
		                	</div>
		                	<div class="form-group">
		                  		{{ Form::label('marital_status', 'Marital Status', ['class'=>'col-sm-2 control-label']) }}
		                  		<div class="col-sm-8">
		                    		{{ Form::text('marital_status', $user->marital_status, ['class'=>'form-control', 'id'=>'marital_status']) }}
		                  		</div>
		                	</div>
		                	<div class="form-group">
		                  		{{ Form::label('nationality', 'Nationality', ['class'=>'col-sm-2 control-label']) }}
		                  		<div class="col-sm-8">
		                    		{{ Form::text('nationality', $user->nationality, ['class'=>'form-control', 'id'=>'nationality']) }}
		                  		</div>
		                	</div>
		                	<div class="form-group">
		                  		{{ Form::label('religion', 'Religion', ['class'=>'col-sm-2 control-label']) }}
		                  		<div class="col-sm-8">
		                    		{{ Form::text('religion', $user->religion, ['class'=>'form-control', 'id'=>'religion']) }}
		                  		</div>
		                	</div>
		                	<div class="form-group">
		                  		{{ Form::label('phone', 'Contact Number', ['class'=>'col-sm-2 control-label']) }}
		                  		<div class="col-sm-8">
		                    		{{ Form::text('phone', $user->phone, ['class'=>'form-control', 'id'=>'phone']) }}
		                  		</div>
		                	</div>
		                	<div class="form-group">
		                  		{{ Form::label('degree', 'Degree', ['class'=>'col-sm-2 control-label']) }}
		                  		<div class="col-sm-8">
		                    		{{ Form::text('degree', $user->degree, ['class'=>'form-control', 'id'=>'degree']) }}
		                  		</div>
		                	</div>
		                	<div class="form-group">
		                  		{{ Form::label('married_to', 'Married To', ['class'=>'col-sm-2 control-label']) }}
		                  		<div class="col-sm-8">
		                    		{{ Form::text('married_to', $user->married_to, ['class'=>'form-control', 'id'=>'married_to']) }}
		                  		</div>
		                	</div>
		                	<div class="form-group">
		                  		{{ Form::label('married_date', 'Married Date', ['class'=>'col-sm-2 control-label']) }}
		                  		<div class="col-sm-8">
		                    		{{ Form::date('married_date', $user->married_date, ['class'=>'form-control', 'id'=>'married_date']) }}
		                  		</div>
		                	</div>
		                	<div class="form-group">
		                  		{{ Form::label('color_code', 'Color Code', ['class'=>'col-sm-2 control-label']) }}
		                  		<div class="col-sm-8">
		                    		{{ Form::text('color_code', $user->color_code, ['class'=>'form-control', 'id'=>'color_code']) }}
		                  		</div>
		                	</div>
		                	<div class="form-group">
		                  		{{ Form::label('home_address', 'Home Address', ['class'=>'col-sm-2 control-label']) }}
		                  		<div class="col-sm-8">
		                    		{{ Form::text('home_address', $user->home_address, ['class'=>'form-control', 'id'=>'home_address']) }}
		                  		</div>
		                	</div>
		                	<div class="form-group">
		                  		{{ Form::label('current_address', 'Current Address', ['class'=>'col-sm-2 control-label']) }}
		                  		<div class="col-sm-8">
		                    		{{ Form::text('current_address', $user->current_address, ['class'=>'form-control', 'id'=>'current_address']) }}
		                  		</div>
		                	</div>
		                	<div class="form-group">
		                  		{{ Form::label('occupation', 'Occupation', ['class'=>'col-sm-2 control-label']) }}
		                  		<div class="col-sm-8">
		                    		{{ Form::text('occupation', $user->occupation, ['class'=>'form-control', 'id'=>'occupation']) }}
		                  		</div>
		                	</div>
		                	<div class="form-group">
		                  		{{ Form::label('company_name', 'Company Name', ['class'=>'col-sm-2 control-label']) }}
		                  		<div class="col-sm-8">
		                    		{{ Form::text('company_name', $user->company_name, ['class'=>'form-control', 'id'=>'company_name']) }}
		                  		</div>
		                	</div>
		                	<div class="form-group">
		                  		{{ Form::label('company_address', 'Company Address', ['class'=>'col-sm-2 control-label']) }}
		                  		<div class="col-sm-8">
		                    		{{ Form::text('company_address', $user->company_address, ['class'=>'form-control', 'id'=>'company_address']) }}
		                  		</div>
		                	</div>
		                	<div class="form-group">
		                  		{{ Form::label('company_phone', 'Company Phone', ['class'=>'col-sm-2 control-label']) }}
		                  		<div class="col-sm-8">
		                    		{{ Form::text('company_phone', $user->company_phone, ['class'=>'form-control', 'id'=>'company_phone']) }}
		                  		</div>
		                	</div>
			          	</div>
		              	<!-- /.box-body -->
		              	<div class="box-footer">
		              		<div class="col-sm-offset-2 col-sm-8">
		              			<button type="submit" class="btn btn-info pull-right">Update</button>
			                	<button type="submit" class="btn btn-default pull-right" style="margin-right: 15px">Cancel</button>
			            	</div>
		              	</div>
		            {!! Form::close() !!}
		        </div>
          	</div>  
		</div>     
 	</section>
@endsection