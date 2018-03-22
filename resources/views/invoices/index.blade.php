@extends('layouts.app_admin')

@section('css')
<link rel="stylesheet" href="{{ asset('custom_adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')

    <div class="row">   
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">List of Fatora</h3>
                    <div class="pull-right">
                        <a href="{{ url('invoices/create') }}" class="btn btn-block btn-primary"><i class="fa fa-plus"></i> Add Fatora</a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                              <th>Part Number</th>                              
                              <th>Salesman</th>
                              <th>Status</th>
                              <th>Quantity</th>
                              <th>Date</th>
                              <th>Kalas</th>
                              <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($invoices as $invoice)
                                <tr>
                                    <td>{{ $invoice->partno }}</td>
                                    <td>{{ $invoice->user->name }}</td>  
                                    <td>{{ $invoice->action->name }}</td>  
                                    <td>{{ $invoice->qty }}</td>  
                                    <td>{{ dateDBtoView($invoice->date) }}</td>                                      
                                    <td>
                                        <a href="{{ route('invoices.actiontofinish', ['id' => $invoice->id,])}}" class="btn btn-info" role'=>'button'>kalas</a>
                                        <a href="#" class="btn btn-info" role="button">Link Button</a>
                                    </td>                                      
                                    <td>
                                        <a href="{{ route('invoices.edit', ['id' => $invoice->id])}}">
                                            <i class="fa fa-fw fa-pencil" data-toggle="tooltip" title="Edit"></i>
                                        </a>
                                        <meta name="csrf-token" content="{{ csrf_token() }}">
                                        <a href="#" data-method="delete" class="jquery-postback" value="{{ $invoice->id }}">
                                            <i class="fa fa-fw fa-trash" data-toggle="tooltip" title="Delete"></i>
                                        </a>

                                        {!! Form::open(['action'=> ['InvoicesController@destroy', $invoice->id], 'method'=>'POST']) !!}
                                            {{ Form::hidden('_method', 'DELETE') }}
                                            {{ Form::submit('Delete', ['class'=>'btn btn-danger', 'id'=>'name'.$invoice->id, 'style'=>'display:none']) }}
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

    $('#example1').DataTable();
</script>
@endsection()