@extends('layouts.app_admin')

@section('css')
    <link rel="stylesheet" href="{{ asset('custom_adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')


    <div class="row">   
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">{{ $page_title }}</h3>
                    @if(Auth::user()->hasRole('Super Administrator'))
                        <div class="pull-right">
                            <a href="{{ url('shortparts/create') }}" class="btn btn-block btn-primary"><i class="fa fa-plus"></i> Add New</a>
                        </div>
                    @endif
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Supplier Name</th>
                                <th>Items</th>
                                <th>Quantities</th>
                                <th>Rahdan Invoice#</th>
                                
                                
                                <th>Supplier Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($shortparts as $shortpart)                                                            
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $shortpart->supplier->name }}</td>
                                    <td>{{ count($shortpart->items) }}</td>
                                    <td>{{ $shortpart->totalShortQuantities() }}</td>
                                    <td>{{ $shortpart->invoicenum_rahdan }}</td>
                                    
                                    
                                    <td>{{ $shortpart->invoicedate_supplier }}</td>
                                    <td>
                                        <a href="{{ route('shortparts.edit', $shortpart)}}">
                                            <i class="fa fa-fw fa-pencil" data-toggle="tooltip" title="Edit"></i>
                                        </a>
                                        @if(Auth::user()->hasRole('Super Administrator'))

                                            @if($shortpart->totalShortQuantities() == 0)
                                                <a href="{{ route('shortparts.finish', $shortpart)}}">
                                                    <i class="fa fa-fw fa-calendar-check-o" data-toggle="tooltip" title="Finish"></i>
                                                </a>
                                            @endif

                                            <meta name="csrf-token" content="{{ csrf_token() }}">
                                            <a href="#" data-method="delete" class="jquery-postback" value="{{ $shortpart->id }}">
                                                <i class="fa fa-fw fa-trash" data-toggle="tooltip" title="Delete"></i>
                                            </a>

                                            {!! Form::open(['action'=> ['ShortpartsController@destroy', $shortpart->id], 'method'=>'POST']) !!}
                                                {{ Form::hidden('_method', 'DELETE') }}
                                                {{ Form::submit('Delete', ['class'=>'btn btn-danger', 'id'=>'name'.$shortpart->id, 'style'=>'display:none']) }}
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
        
        var ask = window.confirm("Confirm Delete?");
        
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