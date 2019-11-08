@extends('layouts.app_admin')

@section('css')
    <link rel="stylesheet" href="{{ asset('custom_adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('custom_adminlte/bower_components/select2/dist/css/select2.min.css') }}">
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
                        <shortparts-formtable-edit 
                            apisubmiturl="{{ url('api/shortparts_update', $short_part->id) }}" 
                            :suppliers="{{ $suppliers }}"
                            :short_part="{{ $short_part }}"
                            :details="{{ $short_part->items }}"
                        ></shortparts-formtable-edit>
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
<script src="{{ asset('custom_adminlte/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
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

    $('.select2').select2()
</script>
@endsection()