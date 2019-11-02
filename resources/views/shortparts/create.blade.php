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
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Part Number</th>
                                <th>Request</th>
                                <th>Received</th>
                                <th>Balance</th>
                                <th>Price</th>
                                <th>Discount</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($shortpart_details as $details)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $details->partno }}</td>
                                    <td>{{ $details->request }}</td>
                                    <td>{{ $details->received }}</td>
                                    <td>{{ $details->request - $details->received }}</td>
                                    <td>{{ $details->price }}</td>
                                    <td>{{ $details->discount }}</td>
                                    <td>
                                        @if(Auth::user()->hasRole('Super Administrator'))
                                            <a href="{{ route('shortparts.edit', $shortpart)}}">
                                                <i class="fa fa-fw fa-pencil" data-toggle="tooltip" title="Edit"></i>
                                            </a>
                                            <meta name="csrf-token" content="{{ csrf_token() }}">
                                            <a href="#" data-method="delete" class="jquery-postback" value="{{ $shortpart->id }}">
                                                <i class="fa fa-fw fa-trash" data-toggle="tooltip" title="Delete"></i>
                                            </a>

                                            {!! Form::open(['action'=> ['shortpartsController@destroy', $shortpart->id], 'method'=>'POST']) !!}
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