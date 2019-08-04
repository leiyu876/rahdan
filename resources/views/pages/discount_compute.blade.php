@extends('layouts.app_admin')

@section('css')
@endsection

@section('content')

    <div class="row">   
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <form class="form-horizontal">
                    <div class="box-body">
                      <div class="form-group">
                        <label for="quantity" class="col-sm-2 control-label">Quantity</label>

                        <div class="col-sm-3">
                          <input type="text" class="form-control" id="quantity" disabled>
                        </div>
                        كمية
                      </div>
                      <div class="form-group">
                        <label for="price" class="col-sm-2 control-label">Price</label>

                        <div class="col-sm-3">
                          <input type="text" class="form-control" id="price" disabled>
                        </div>
                        السعر
                      </div>
                      <div class="form-group">
                        <label for="total_price" class="col-sm-2 control-label">Total Price Computer</label>

                        <div class="col-sm-3">
                          <input type="text" class="form-control" id="total_price">
                        </div>
                        السعر الكلي
                      </div>
                      <div class="form-group">
                        <label for="total_price_invoice" class="col-sm-2 control-label">Total Price Invoice</label>

                        <div class="col-sm-3">
                          <input type="text" class="form-control" id="total_price_invoice">
                        </div>
                        إجمالي فاتورة السعر 
                      </div>
                      <div class="form-group">
                        <label for="discount" class="col-sm-2 control-label">Discount خصم</label>

                        <div class="col-sm-3">
                          <input type="text" class="form-control" id="discount" disabled style="color:red">
                        </div>
                        خصم
                      </div>
                    </div>
                  </form>
                </div>
             </div>
        </div>
    </div>     

  @endsection()

@section('js')
<script>
  function sumada() {
    var qty = $('#quantity').val();
    var price = $("#price").val();
    var total = qty * price;
    $("#total_price").val(total);
  }
  
  function sumada_discount() {
    var total_price = $('#total_price').val();
    var total_price_invoice = $("#total_price_invoice").val();
    var discount = 100-((total_price_invoice / total_price)*100);
    if(discount != 100)
    $("#discount").val(discount);
  }
  
  $( "#quantity, #price" ).keyup(function() {
    sumada();
  });
  
  $( "#total_price" ).keyup(function() {
    sumada_discount();
  });

  $( "#total_price_invoice" ).keyup(function() {
    sumada_discount();
  });
</script>
@endsection()