@extends('layouts.app_admin')

@section('css')
    <link rel="stylesheet" href="{{ asset('custom_adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')

<div id="app">
    <div class="row">   
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <shortparts-formtable></shortparts-formtable>
                    <form class="form-horizontal">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                          <label for="supplier" class="col-sm-4 control-label">Supplier Name</label>
                                          <? $list = array(); ?>
                                          @foreach($suppliers as $supplier)
                                            <? $list[$supplier->id] = $supplier->name; ?>
                                          @endforeach
                                        <div class="col-sm-8">
                                            {{ Form::select('supplier', $list, old('supplier'),['class'=>'form-control'.($errors->has('supplier') ? ' is-invalid' : ''), 'id'=>'supplier'])}}
                                                @if ($errors->has('supplier'))
                                                  <span class="invalid-feedback">
                                                      <strong>{{ $errors->first('supplier') }}</strong>
                                                  </span>
                                                @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="date" class="col-sm-4 control-label">Supplier Invoice Date</label>
                                        <div class="col-sm-8">
                                            <div class="input-group date">
                                              <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                              </div>
                                              <input name="date" type="text" class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }} pull-right" id="date" value="{{ old('date') }}">
                                              @if ($errors->has('date'))
                                                  <span class="invalid-feedback">
                                                      <strong>{{ $errors->first('date') }}</strong>
                                                  </span>
                                              @endif
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    

                                    <div class="form-group">
                                        <label for="total_price" class="col-sm-4 control-label">Supplier Invoice Number</label>
                                        <div class="col-sm-8">
                                          <input type="text" class="form-control" id="total_price">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="total_price" class="col-sm-4 control-label">Rahdan Invoice Number</label>
                                        <div class="col-sm-8">
                                          <input type="text" class="form-control" id="total_price">
                                        </div>
                                    </div>    
                                </div>
                            </div>
                            <hr/>

                            <div class="form-group">
                                <label for="total_price" class="col-sm-2 control-label">Part Number</label>
                                <div class="col-sm-3">
                                  <input type="text" class="form-control" id="total_price">
                                </div>
                            </div>
                            <hr/>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="total_price" class="col-sm-7 control-label">Qty Request</label>
                                        <div class="col-sm-5">
                                          <input type="text" class="form-control" id="total_price">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="total_price" class="col-sm-7 control-label">Qty Received</label>
                                        <div class="col-sm-5">
                                          <input type="text" class="form-control" id="total_price">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="total_price" class="col-sm-3 control-label">Price</label>
                                        <div class="col-sm-9">
                                          <input type="text" class="form-control" id="total_price">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="discount" class="col-sm-6 control-label">Discount</label>
                                        <div class="col-sm-6">
                                          <input type="text" class="form-control" id="discount">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-default">Add to List</button>
                                </div>
                            </div>
                        </div>
                      </form>
                    <table class="table table-bordered table-striped">
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
                            @forelse($shortpart_details as $details)
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
                            @empty
                                <tr >
                                    <td colspan="8" style="text-align:center">Nothing to display.</td>
                                </tr>                                
                            @endforelse
                        </tbody>
                     </table>
                </div>
             </div>
        </div>
    </div>     
</div>
  @endsection()

@section('js')
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('custom_adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('custom_adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('custom_adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
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

    $('#date').datepicker({
        autoclose: true,
        format: 'dd-mm-yyyy'
      });
</script>
@endsection()