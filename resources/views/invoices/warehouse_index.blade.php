@extends('layouts.app_admin')

@section('css')
    <link rel="stylesheet" href="{{ asset('custom_adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')

    <div class="row">   
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <div class="col-md-6" style="background-color: yellow">
                        {{ Form::open(['route'=>'invoices.warehouse_lists', 'action'=>'POST', 'class'=>'form-horizontal']) }}
                            <div class="box-body">
                                <div >
                                    {{ Form::label('user_id', 'Salesman', ['class'=>'control-label col-sm-2']) }}
                                    <div class="col-sm-3">
                                        {{ Form::select('user_id', ($salesmans->prepend('ALL', 0)), $user_id_selected, ['class'=>'form-control', 'onchange'=>'this.form.submit()']) }}
                                    </div>
                                </div>
                                {{ Form::hidden('action_code', $action_code) }}
                            </div>
                        {{ Form::close() }}
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
                              <th>Change Status To:</th>
                              <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($invoices as $invoice)
                                <tr>
                                    <td>{{ $invoice->partno }}</td>
                                    <td>{{ $invoice->user->name }}</td>  
                                    <td>
                                        {{ $invoice->action->name }}
                                        @if($invoice->action->code == 'finish_confirm' || $invoice->action->code == 'return_confirm')
                                            <i class="fa fa-fw fa-check"></i>
                                        @endif
                                    </td>  
                                    <td>{{ $invoice->qty }}</td>  
                                    <td>{{ dateDBtoView($invoice->date) }}</td>                                      
                                    <td>
                                        <div class="col-sm-12">
                                            <div class="col-sm-3" style="visibility:{{ $invoice->action->code == 'unfinish' ? 'hidden' : '' }}">
                                                <a href="{{ route('invoices.changeaction', ['id' => $invoice->id, 'action_code' => 'unfinish', 'action_url' => $action_url])}}" class="btn btn-danger" role="button">bagi</a>
                                            </div>
                                            <div class="col-sm-3" style="visibility:{{ $invoice->action->code == 'finished_confirm' ? 'hidden' : '' }}">
                                                <a href="{{ route('invoices.changeaction', ['id' => $invoice->id, 'action_code' => 'finished_confirm', 'action_url' => $action_url ])}}" class="btn btn-primary" role="button">kalas</a>
                                            </div>
                                            <div class="col-sm-3" style="visibility:{{ $invoice->action->code == 'returned_confirm' ? 'hidden' : '' }}">
                                                <a href="{{ route('invoices.changeaction', ['id' => $invoice->id, 'action_code' => 'returned_confirm', 'action_url' => $action_url ])}}" class="btn btn-info" role="button">radja</a>
                                            </div>
                                        </div>
                                    </td>                                      
                                    <td>
                                        <a href="{{ route('invoices.edit', ['id' => $invoice->id, 'action_url' => $action_url])}}">
                                            <i class="fa fa-fw fa-pencil" data-toggle="tooltip" title="Edit"></i>
                                        </a>
                                        <meta name="csrf-token" content="{{ csrf_token() }}">
                                        <a href="#" data-method="delete" class="jquery-postback" value="{{ $invoice->id }}">
                                            <i class="fa fa-fw fa-trash" data-toggle="tooltip" title="Delete"></i>
                                        </a>

                                        {!! Form::open(['action'=> ['InvoicesController@destroy', $invoice->id], 'method'=>'POST']) !!}
                                            {{ Form::hidden('_method', 'DELETE') }}
                                            {{ Form::hidden('action_url', $action_url) }}
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

    $('#example1').DataTable( {
      "ordering": false
    } );
</script>
@endsection()