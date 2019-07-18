@extends('layouts.app_admin')

@section('css')
    <link rel="stylesheet" href="{{ asset('custom_adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')

    <div class="row">   
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"></h3>
                    @if(Auth::user()->hasRole('Super Administrator'))
                        <div class="pull-right">
                            <a href="{{ url('argas/import') }}" class="btn btn-block btn-primary"><i class="fa fa-file-excel-o"></i> Import Pickslip</a>
                        </div>
                    @endif
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Pickslip Number</th>
                                <th>Total</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Balance Item</th>
                                <th>Balance Qty</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{ $order->pickslip_id }}</td>
                                    <td>{{ number_format($order->total, 2) }}</td>
                                    <td>{{date('d-m-Y', strtotime($order->date)) }}</td>
                                    <td>{{ $order->status }}</td>
                                    <td>{{ $order->balance_item() }}</td>
                                    <td>{{ $order->balance() }}</td>
                                    <td>
                                        @if(Auth::user()->hasRole('Super Administrator'))
                                            <a href="{{ route('order.edit', ['id' => $order->id])}}">
                                                <i class="fa fa-fw fa-pencil" data-toggle="tooltip" title="Edit"></i>
                                            </a>
                                            @if($order->qty_total() != $order->balance() && $order->status != 'DONE')
                                                <a href="{{ route('order.send', ['id' => $order->id])}}">
                                                    <i class="fa fa-fw fa-send" data-toggle="tooltip" title="Send"></i>
                                                </a>
                                            @endif
                                            @if($order->status == 'DONE')
                                                <a href="{{ route('order.invoice.store', $order)}}">
                                                    <i class="fa fa-fw fa-money" data-toggle="tooltip" title="Invoiced"></i>
                                                </a>
                                            @endif
                                            <meta name="csrf-token" content="{{ csrf_token() }}">
                                            <a href="#" data-method="delete" class="jquery-postback" value="{{ $order->id }}">
                                                <i class="fa fa-fw fa-trash" data-toggle="tooltip" title="Delete"></i>
                                            </a>

                                            {!! Form::open(['action'=> ['ArgasController@destroy', $order], 'method'=>'POST']) !!}
                                                {{ Form::hidden('_method', 'DELETE') }}
                                                {{ Form::submit('Delete', ['class'=>'btn btn-danger', 'id'=>'name'.$order->id, 'style'=>'display:none']) }}
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
        
        var ask = window.confirm("Are you sure you want to delete this pickslip?");
        
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