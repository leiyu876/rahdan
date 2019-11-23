@extends('layouts.app_admin')

@section('content')

    <div class="row">   
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">List of Users</h3>
                    <div class="pull-right" style="margin-left: 10px;">
                        <a href="{{ url('users/export') }}" class="btn btn-block btn-default"><i class="fa fa-file-excel-o"></i> Export Users</a>
                    </div>
                    <div class="pull-right">
                        <a href="{{ url('users/create') }}" class="btn btn-block btn-primary"><i class="fa fa-plus"></i> Add User</a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Iqama</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Password Expiry</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->iqama }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <a href="{{ url('users/change_expiry/'.$user->id) }}" data-toggle="tooltip" title="Change expiry date">
                                            @if(!is_null($user->password_expires_at))
                                                {{ \Carbon\Carbon::parse($user->password_expires_at)->diffForHumans() }}
                                            @else
                                                Unlimited
                                            @endif 
                                        </a>                                       
                                    </td>
                                    <td>
                                        <a href="{{ route('users.edit', ['id' => $user->id])}}">
                                            <i class="fa fa-fw fa-pencil" data-toggle="tooltip" title="Edit"></i>
                                        </a>
                                        <a href="{{ url('users/change_pass/'.$user->id)}}">
                                            <i class="fa fa-fw fa-key" data-toggle="tooltip" title="Change Password"></i>
                                        </a>
                                        @if(Auth::user()->id != $user->id)
                                            <meta name="csrf-token" content="{{ csrf_token() }}">
                                            <a href="#" data-method="delete" class="jquery-postback" value="{{ $user->id }}">
                                                <i class="fa fa-fw fa-trash" data-toggle="tooltip" title="Delete"></i>
                                            </a>

                                            {!! Form::open(['action'=> ['UsersController@destroy', $user->id], 'method'=>'POST']) !!}
                                                {{ Form::hidden('_method', 'DELETE') }}
                                                {{ Form::submit('Delete', ['class'=>'btn btn-danger', 'id'=>'name'.$user->id, 'style'=>'display:none']) }}
                                            {!! Form::close() !!}                                        
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                     </table>
                </div>
             </div>
        </div>
    </div>     

  @endsection()

@section('js')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).on('click', 'a.jquery-postback', function(e) {

        e.preventDefault(); // does not go through with the link.
        
        var ask = window.confirm("Are you sure you want to delete this user?");
        
        if (ask) {
            
            var $this = $(this);

            $( "#name"+$this.attr('value') ).click();

        }         
    });
</script>
@endsection()