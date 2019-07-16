@extends('layouts.app_admin')

@section('content')

  <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Pickslip # : {{ $order->pickslip_id }}</h3>
              <h3 class="box-title" style="margin-left: 15%;">Date : {{ date('d-m-Y', strtotime($order->date)) }}</h3>
              <h3 class="box-title" style="margin-left: 15%;">Total : {{ number_format($order->total, 2) }}</h3>
              <div class="pull-right">
                  <a href="{{ route('argas.ready_print', $order->id) }}" class="btn btn-block btn-default"><i class="fa fa-print"></i> Print Ready</a>
                  <a href="{{ route('argas.balance_print', $order->id) }}" class="btn btn-block btn-default"><i class="fa fa-print"></i> Print Balance</a>
                  <a href="{{ route('argas.ready_balance_print', $order->id) }}" class="btn btn-block btn-default"><i class="fa fa-print"></i> Print Both</a>
              </div>
            </div>
            <!-- /.box-header -->
            {!! Form::open([
              'action' => [
                'ArgasController@update', 
                $order->id
              ], 
              'method' => 'PUT'
            ]) !!}
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Part Number</th>
                  <th>Part Name</th>
                  <th>Request</th>
                  <th>Send</th>
                  <th>Ready</th>
                  <th>Balance</th>
                  <th style="width:100px">Add Ready</th>
                  <th>Actions</th>
                </tr>
                @foreach($pickslips as $pickslip)
                  <tr style="{{ $pickslip->qty != $pickslip->qty_send + $pickslip->qty_ready ? 'background-color: #ffff99' : ''}}">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pickslip->partno }}</td>
                    <td>{{ $pickslip->description }}</td>
                    <td>{{ $pickslip->qty }}</td>
                    <td>{{ $pickslip->qty_send }}</td>
                    <td>{{ $pickslip->qty_ready }}</td>
                    <td>{{ $pickslip->balance() }}</td>
                    <td>
                      <? $error_css = false; ?>
                      @if($pickslip->qty != $pickslip->qty_send + $pickslip->qty_ready)
                        <input type="number" name="{{ $pickslip->id }}" min="0" max="{{ $pickslip->balance() }}" data-bind="value:replyNumber" style="width:100%"}}>
                      @else
                        Done
                      @endif
                    </td>
                    <td> 
                      @if($pickslip->qty != $pickslip->balance())
                        <a href="{{ route('argas.revert.create', $pickslip) }}">Revert</a> 
                      @endif
                    </td>
                  </tr>
                @endforeach
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="{{ url('argas/new') }}" class="btn btn-default">Back</a>
              @if(Auth::user()->hasRole('Super Administrator'))
                @if($order->status != 'DONE')
                  <input type="submit" value="Ready" class="btn btn-primary pull-right jquery-postback">
                @endif
              @endif
            </div>
          </div>
          <!-- /.box -->
        {!! Form::close() !!}
        </div>
        <!-- /.col -->
      </div>

  @endsection()

@section('js')
<script>
    
</script>
@endsection()