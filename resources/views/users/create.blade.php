@extends('layouts.app')

@section('css')
	<link rel="stylesheet" href="{{ asset('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')
	<section class="content">
      	<div class="row">
        	<div class="col-md-12">
        		<div class="box box-info">
		            <div class="box-header with-border">
		              	<h3 class="box-title">Create User</h3>
		            </div>
		            
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
		              	<div class="box-body">
		              		<div class="form-group">
		                  		{{ Form::label('email', 'Email', ['class'=>'col-sm-2 control-label']) }}
	                  			<div class="col-sm-8">
	                    			{{ Form::email('email', null, ['class'=>'form-control', 'id'=>'email']) }}
	                  			</div>
		                	</div>
		                	<div class="form-group">
		                  		{{ Form::label('first_name', 'First Name', ['class'=>'col-sm-2 control-label']) }}
		                  		<div class="col-sm-8">
		                    		{{ Form::text('first_name',null, ['class'=>'form-control', 'id'=>'first_name']) }}
		                  		</div>
		                	</div>
		                	<div class="form-group">
		                  		{{ Form::label('last_name', 'Last Name', ['class'=>'col-sm-2 control-label']) }}
		                  		<div class="col-sm-8">
		                    		{{ Form::text('last_name', null, ['class'=>'form-control', 'id'=>'last_name']) }}
		                  		</div>
		                	</div>
		                	<div class="form-group">
		                  		{{ Form::label('middle_name', 'Middle Name', ['class'=>'col-sm-2 control-label']) }}
		                  		<div class="col-sm-8">
		                    		{{ Form::text('middle_name', null, ['class'=>'form-control', 'id'=>'middle_name']) }}
		                  		</div>
		                	</div>
		                	<div class="form-group">
		                  		{{ Form::label('nick_name', 'Nick Name', ['class'=>'col-sm-2 control-label']) }}
		                  		<div class="col-sm-8">
		                    		{{ Form::text('nick_name', null, ['class'=>'form-control', 'id'=>'nick_name']) }}
		                  		</div>
		                	</div>
		                	<div class="form-group">
		                  		{{ Form::label('birthday', 'Birthday', ['class'=>'col-sm-2 control-label']) }}
		                  		<div class="col-sm-8">
		                    		{{ Form::date('birthday', null, ['class'=>'form-control', 'id'=>'birthday']) }}
		                  		</div>
		                	</div>
		                	<div class="form-group">
		                  		{{ Form::label('gender', 'Gender', ['class'=>'col-sm-2 control-label']) }}
		                  		<div class="col-sm-8">
		                    		{{ Form::text('gender', null, ['class'=>'form-control', 'id'=>'gender']) }}
		                  		</div>
		                	</div>
		                	<div class="form-group">
		                  		{{ Form::label('marital_status', 'Marital Status', ['class'=>'col-sm-2 control-label']) }}
		                  		<div class="col-sm-8">
		                    		{{ Form::text('marital_status', null, ['class'=>'form-control', 'id'=>'marital_status']) }}
		                  		</div>
		                	</div>
		                	<div class="form-group">
		                  		{{ Form::label('nationality', 'Nationality', ['class'=>'col-sm-2 control-label']) }}
		                  		<div class="col-sm-8">
		                    		{{ Form::text('nationality', null, ['class'=>'form-control', 'id'=>'nationality']) }}
		                  		</div>
		                	</div>
		                	<div class="form-group">
		                  		{{ Form::label('religion', 'Religion', ['class'=>'col-sm-2 control-label']) }}
		                  		<div class="col-sm-8">
		                    		{{ Form::text('religion', null, ['class'=>'form-control', 'id'=>'religion']) }}
		                  		</div>
		                	</div>
		                	<div class="form-group">
		                  		{{ Form::label('phone', 'Contact Number', ['class'=>'col-sm-2 control-label']) }}
		                  		<div class="col-sm-8">
		                    		{{ Form::text('phone', null, ['class'=>'form-control', 'id'=>'phone']) }}
		                  		</div>
		                	</div>
		                	<div class="form-group">
		                  		{{ Form::label('degree', 'Degree', ['class'=>'col-sm-2 control-label']) }}
		                  		<div class="col-sm-8">
		                    		{{ Form::text('degree', null, ['class'=>'form-control', 'id'=>'degree']) }}
		                  		</div>
		                	</div>
		                	<div class="form-group">
		                  		{{ Form::label('married_to', 'Married To', ['class'=>'col-sm-2 control-label']) }}
		                  		<div class="col-sm-8">
		                    		{{ Form::text('married_to', null, ['class'=>'form-control', 'id'=>'married_to']) }}
		                  		</div>
		                	</div>
		                	<div class="form-group">
		                  		{{ Form::label('married_date', 'Married Date', ['class'=>'col-sm-2 control-label']) }}
		                  		<div class="col-sm-8">
		                    		{{ Form::date('married_date', null, ['class'=>'form-control', 'id'=>'married_date']) }}
		                  		</div>
		                	</div>
		                	<div class="form-group">
		                  		{{ Form::label('color_code', 'Color Code', ['class'=>'col-sm-2 control-label']) }}
		                  		<div class="col-sm-8">
		                    		{{ Form::text('color_code', null, ['class'=>'form-control', 'id'=>'color_code']) }}
		                  		</div>
		                	</div>
		                	<div class="form-group">
		                  		{{ Form::label('home_address', 'Home Address', ['class'=>'col-sm-2 control-label']) }}
		                  		<div class="col-sm-8">
		                    		{{ Form::text('home_address', null, ['class'=>'form-control', 'id'=>'home_address']) }}
		                  		</div>
		                	</div>
		                	<div class="form-group">
		                  		{{ Form::label('current_address', 'Current Address', ['class'=>'col-sm-2 control-label']) }}
		                  		<div class="col-sm-8">
		                    		{{ Form::text('current_address', null, ['class'=>'form-control', 'id'=>'current_address']) }}
		                  		</div>
		                	</div>
		                	<div class="form-group">
		                  		{{ Form::label('occupation', 'Occupation', ['class'=>'col-sm-2 control-label']) }}
		                  		<div class="col-sm-8">
		                    		{{ Form::text('occupation', null, ['class'=>'form-control', 'id'=>'occupation']) }}
		                  		</div>
		                	</div>
		                	<div class="form-group">
		                  		{{ Form::label('company_name', 'Company Name', ['class'=>'col-sm-2 control-label']) }}
		                  		<div class="col-sm-8">
		                    		{{ Form::text('company_name', null, ['class'=>'form-control', 'id'=>'company_name']) }}
		                  		</div>
		                	</div>
		                	<div class="form-group">
		                  		{{ Form::label('company_address', 'Company Address', ['class'=>'col-sm-2 control-label']) }}
		                  		<div class="col-sm-8">
		                    		{{ Form::text('company_address',null, ['class'=>'form-control', 'id'=>'company_address']) }}
		                  		</div>
		                	</div>
		                	<div class="form-group">
		                  		{{ Form::label('company_phone', 'Company Phone', ['class'=>'col-sm-2 control-label']) }}
		                  		<div class="col-sm-8">
		                    		{{ Form::text('company_phone', null, ['class'=>'form-control', 'id'=>'company_phone']) }}
		                  		</div>
		                	</div>
		                	<div class="form-group">
		                  		{{ Form::label('password', 'Password', ['class'=>'col-sm-2 control-label']) }}
		                  		<div class="col-sm-8">
		                    		{{ Form::password('password', ['class'=>'form-control', 'id'=>'password']) }}
		                  		</div>
		                	</div>
		                	<div class="form-group">
		                  		{{ Form::label('password_confirmation', 'Confirm Password', ['class'=>'col-sm-2 control-label']) }}
		                  		<div class="col-sm-8">
		                    		{{ Form::password('password_confirmation', ['class'=>'form-control', 'id'=>'password_confirmation']) }}
		                  		</div>
		                	</div>
			          	</div>
		              	<!-- /.box-body -->
		              	<div class="box-footer">
		              		<div class="col-sm-offset-2 col-sm-8">
		              			<button type="submit" class="btn btn-info pull-right">Create</button>
			                	<button type="submit" class="btn btn-default pull-right" style="margin-right: 15px">Cancel</button>
			            	</div>
		              	</div>
		            </form>
		        </div>
          	</div>  
		</div>     
 	</section>
@endsection