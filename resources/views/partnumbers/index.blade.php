@extends('layouts.app_admin')

@section('css')
    <link rel="stylesheet" href="{{ asset('custom_adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')


    <div class="row">   
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">List of partnumbers</h3>
                    <!-- comment for now cause i am in vacation and they want to have access for this
                        @if(Auth::user()->hasRole('Super Administrator'))
                            <div class="pull-right">
                                <a href="{{ url('partnumbers/create') }}" class="btn btn-block btn-primary"><i class="fa fa-plus"></i> Add New</a>
                            </div>
                        @endif
                    -->
                    <div class="pull-right">
                        <a href="{{ url('partnumbers/create') }}" class="btn btn-block btn-primary"><i class="fa fa-plus"></i> Add New</a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Agency Number</th>
                                <th>Rahdan Number</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($partnumbers as $partnumber)
                                <tr>
                                    <td>{{ $partnumber->agencynum }}</td>
                                    <td>{{ $partnumber->rahdannum }}</td>
                                    <td>
                                        @if(Auth::user()->hasRole('Super Administrator'))
                                            <a href="{{ route('partnumbers.edit', ['id' => $partnumber->id])}}">
                                                <i class="fa fa-fw fa-pencil" data-toggle="tooltip" title="Edit"></i>
                                            </a>
                                            <meta name="csrf-token" content="{{ csrf_token() }}">
                                            <a href="#" data-method="delete" class="jquery-postback" value="{{ $partnumber->id }}">
                                                <i class="fa fa-fw fa-trash" data-toggle="tooltip" title="Delete"></i>
                                            </a>

                                            {!! Form::open(['action'=> ['PartnumbersController@destroy', $partnumber->id], 'method'=>'POST']) !!}
                                                {{ Form::hidden('_method', 'DELETE') }}
                                                {{ Form::submit('Delete', ['class'=>'btn btn-danger', 'id'=>'name'.$partnumber->id, 'style'=>'display:none']) }}
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
<script src="{{ asset('custom_adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('custom_adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).on('click', 'a.jquery-postback', function(e) {

        e.preventDefault(); // does not go through with the link.
        
        var ask = window.confirm("Are you sure you want to delete this Fatora?");
        
        if (ask) {
            
            var $this = $(this);

            $( "#name"+$this.attr('value') ).click();

        }         
    });

    $('#example1').DataTable( {
      "ordering": false
    } );
</script>
@endsection()