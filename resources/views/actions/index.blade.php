@extends('layouts.app_admin')

@section('content')

    <div class="row">   
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">List of Actions</h3>
                    <div class="pull-right">
                        <a href="{{ url('actions/create') }}" class="btn btn-block btn-primary"><i class="fa fa-plus"></i> Add Action</a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                              <th>Name</th>                              
                              <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($actions as $action)
                                <tr>
                                    <td>{{ $action->code }}</td>  
                                    <td>{{ $action->name }}</td>                                    
                                    <td>
                                        <a href="{{ route('actions.edit', ['id' => $action->id])}}">
                                            <i class="fa fa-fw fa-pencil" data-toggle="tooltip" title="Edit"></i>
                                        </a>
                                        <meta name="csrf-token" content="{{ csrf_token() }}">
                                        <a href="#" data-method="delete" class="jquery-postback" value="{{ $action->id }}">
                                            <i class="fa fa-fw fa-trash" data-toggle="tooltip" title="Delete"></i>
                                        </a>

                                        {!! Form::open(['action'=> ['ActionsController@destroy', $action->id], 'method'=>'POST']) !!}
                                            {{ Form::hidden('_method', 'DELETE') }}
                                            {{ Form::submit('Delete', ['class'=>'btn btn-danger', 'id'=>'name'.$action->id, 'style'=>'display:none']) }}
                                        {!! Form::close() !!}                                        
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
        
        var ask = window.confirm("Are you sure you want to delete this action?");
        
        if (ask) {
            
            var $this = $(this);

            $( "#name"+$this.attr('value') ).click();

        }         
    });
</script>
@endsection()