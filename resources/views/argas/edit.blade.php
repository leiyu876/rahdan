@extends('layouts.app_admin')

@section('content')

  <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Pickslip # : {{ $order->pickslip_id }}</h3>
              <h3 class="box-title" style="margin-left: 15%;">Date : {{ date('d-m-Y', strtotime($order->date)) }}</h3>
              <h3 class="box-title pull-right">Total : {{ number_format($order->total, 2) }}</h3>
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
                  <th>Qty</th>
                  <th>Balance</th>
                  <th style="width:100px">Qty ready</th>
                </tr>
                @foreach($pickslips as $index => $pickslip)
                  <tr style="{{ $pickslip->qty != $pickslip->qty_send ? 'background-color: #ffff99' : ''}}">
                    <td>{{ $index+1 }}</td>
                    <td>{{ $pickslip->partno }}</td>
                    <td>{{ $pickslip->description }}</td>
                    <td>{{ $pickslip->qty }}</td>
                    <td>{{ $pickslip->balance() }}</td>
                    <td>
                      <? $error_css = false; ?>
                      @if($pickslip->qty != $pickslip->qty_send)
                        <input type="number" name="{{ $pickslip->id }}" min="0" max="{{ $pickslip->qty - $pickslip->qty_send }}" data-bind="value:replyNumber" style="width:100%"}}>
                      @else
                        finish
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