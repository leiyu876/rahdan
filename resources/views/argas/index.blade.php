@extends('layouts.app_admin')

@section('css')
    <link rel="stylesheet" href="{{ asset('custom_adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')

    <div class="row">   
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
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
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pickslips as $index => $pickslip)
                              <tr>
                                <td>{{ $index+1 }}</td>
                                <td>{{ $pickslip->partno }}</td>
                                <td>{{ $pickslip->description }}</td>
                                <td>{{ $pickslip->pickslip_number() }}</td>
                                <td>{{ $pickslip->qty }}</td>
                                <td>{{ $pickslip->balance() }}</td>
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

    $('#example1').DataTable( {
      "ordering": false
    } );
</script>
@endsection()