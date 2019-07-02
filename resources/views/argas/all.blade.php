@extends('layouts.app_admin')

@section('css')
    <link rel="stylesheet" href="{{ asset('custom_adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')

    <div class="row">   
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                  <div class="pull-right">
                    <a href="{{ route('argas.balance_print_all') }}" class="btn btn-block btn-default"><i class="fa fa-print"></i> Print Balance</a>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                              <th style="width: 10px">#</th>
                              <th>Part Number</th>
                              <th>Part Name</th>
                              <th>Pickslip #</th>
                              <th>Qty Request</th>
                              <th>Qty Balance</th>
                              <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                          <? $color = array('lightcyan', 'antiquewhite') ?>
                          <? $indicator = ''; ?> 
                          <? $color_index = 0; ?>
                          @foreach($pickslips as $index => $pickslip)
                            <? 
                              if ($indicator != $pickslip->pickslip_number())
                                $color_index = $color_index ? 0 : 1;
                              $indicator = $pickslip->pickslip_number();
                            ?>
                            <tr class="for_ajax_update" style="background-color:{{ $color[$color_index]  }}; {{ $pickslip->order->status == 'DONE' ? 'color:gray' : ''}}">
                              <td>{{ $index+1 }}</td>
                              <td>{{ $pickslip->partno }}</td>
                              <td>{{ $pickslip->description }}</td>
                              <td>
                                <a href="{{ route('order.edit', ['id' => $pickslip->order_id])}}" style="color: blue">
                                    {{ $pickslip->pickslip_number() }}
                                </a>
                              </td>
                              <td>{{ $pickslip->qty }}</td>
                              <td>{{ $pickslip->balance() }}</td>
                              <td>
                                  {{ $pickslip->order->status }}
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
    $('#example1').DataTable( {
      "ordering": false,
      pageLength : 200,
    } );
</script>
@endsection()