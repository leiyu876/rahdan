<template>
    <div>
        <form class="form-horizontal" onsubmit="event.preventDefault()">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Supplier Name</label>                              
                            <div class="col-sm-8">
                                <select v-model="supplier" class="form-control select2" style="width: 100%;" 
                                    id="supplier_id" name="mySelect2">
                                  <option v-for="supplier in suppliers" v-bind:value="supplier.id">
                                      {{ supplier.name }}
                                  </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Supplier Invoice Date</label>
                            <div class="col-sm-8">
                                <div class="input-group date">
                                  <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                  </div>
                                  <input v-model="supplier_date" type="date"  required class="form-control pull-right">                                  
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        

                        <div class="form-group">
                            <label class="col-sm-4 control-label">Supplier Invoice Number</label>
                            <div class="col-sm-8">
                              <input v-model="supplier_invoice_num" type="text" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label">Rahdan Invoice Number</label>
                            <div class="col-sm-8">
                              <input v-model="rahdan_invoice_num" type="text" class="form-control">
                            </div>
                        </div>    
                    </div>
                </div>
                <hr/>

                <div class="form-group"  v-if="is_admin">
                    <label for="total_price" class="col-sm-2 control-label">Part Number</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" v-model="partno">
                    </div>
                </div>
                <hr/>
                <div class="row"  v-if="is_admin">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="total_price" class="col-sm-4 control-label">Qty Request</label>
                            <div class="col-sm-8">
                              <input class="form-control" v-model="request" type="number" min="1">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="total_price" class="col-sm-4 control-label">Price</label>
                            <div class="col-sm-8">
                              <input  class="form-control" v-model="price" type="number" min="1">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">

                        <div class="form-group">
                            <label for="total_price" class="col-sm-4 control-label">Qty Received</label>
                            <div class="col-sm-8">
                              <input  class="form-control" v-model="received" type="number" min="1" v-bind:max="request" :class="{ 'field_border_red' : requestError }">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="discount" class="col-sm-4 control-label">Discount %</label>
                            <div class="col-sm-8">
                              <input  class="form-control" v-model="discount" type="number" min="1" max="100">
                            </div>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-default" @click="itemUpdateCancel" v-if="isUpdate">Cancel</button>
                        <button class="btn btn-default" @click="itemUpdate" v-if="isUpdate && partno 
                                                                                           && request 
                                                                                           && !requestError 
                                                                                           && !discountError
                                                                                           && !partnoError">Update</button>
                        <button class="btn btn-default" @click="addToList" v-if="!isUpdate && partno && request && !requestError && !discountError && !partnoError">Add to List</button>
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
                    <th>Discount %</th>
                    <th>Total</th>
                    <th v-if="is_admin">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item, key in items">
                    <td>{{ ++key }}</td>
                    <td>{{ item.partno}}</td>
                    <td>{{ item.request}}</td>
                    <td>{{ item.received}}</td>
                    <td style="color:red">{{ item.request - item.received}}</td>
                    <td>{{ item.price}}</td>
                    <td>{{ item.discount + ' %'}}</td>
                    <td>{{ getTotalPerRow(item.request - item.received, item.price, item.discount) }}</td>
                    <td v-if="is_admin">
                        <i class="fa fa-fw fa-pencil" data-toggle="tooltip" title="Edit" @click="itemEdit(key-1)"></i>
                        <i class="fa fa-fw fa-trash" data-toggle="tooltip" title="Delete" @click="itemRemove(key-1)"></i>
                    </td>
                </tr>
            </tbody>
         </table>
         <div class="row" style="font-size: 15px">
            <div class="col-sm-6">                
            </div>
            <div class="col-sm-6">
                <div class="col-sm-3" align="right">
                    <span style="background-color:yellow">Total no vat :</span> <br/>  
                    <span style="background-color:yellow">Vat 5% :</span> <br/>  
                    <span style="background-color:yellow">Total w/ Vat :</span>  
                </div>
                <div class="col-sm-3">
                    <span style="background-color:yellow">{{ total_all }}</span> <br/>  
                    <span style="background-color:yellow">{{ computeVat(total_all) }}</span> <br/>  
                    <span style="background-color:yellow">{{ computeTotalwVat(total_all + computeVat(total_all)) }}</span>   
                </div>
                <div class="col-sm-3 pull-right"  v-if="is_admin">
                    <button v-if="supplier && supplier_date && supplier_invoice_num" class="btn btn-primary pull-right" @click="finalSubmit">Final Save</button>       
                </div>
            </div>
         </div>         
    </div>
</template>

<script>
    
    export default {
        mounted() {
            this.supplier=this.short_part.supplier_id
            this.supplier_date=this.short_part.invoicedate_supplier
            this.supplier_invoice_num=this.short_part.invoicenum_supplier
            this.rahdan_invoice_num=this.short_part.invoicenum_rahdan
            this.items = this.details
        },

        created() {
            this.interval = setInterval(() => this.checkSelect2Val(), 2000);
        },

        props : [
            'apisubmiturl',
            'suppliers',  
            'short_part',
            'details',
            'is_admin',
        ],

        data : function () {
            return {
                
                supplier: null,
                supplier_date: null,
                supplier_invoice_num: null,
                rahdan_invoice_num: null,

                isUpdate : false,
                itemToBeUpdate : null,
                items : [],
                partno: null,
                request: null,
                received: null,
                price: null,
                discount: null,
                total: null,
                partnoError : false
            }
        },

        watch : {

            partno : function () {

                var current_partno = this.partno
                var current_partno_error = false
                var current_itemToBeUpdate = this.itemToBeUpdate

                this.items.forEach(function(item, index) {                    
                    if(item.partno == current_partno && index != current_itemToBeUpdate) {
                        current_partno_error = true;
                    }
                });

                this.partnoError = current_partno_error
            }
        },

        computed : {

            total_all: function(){

              let sum = 0;

              this.items.forEach(function(item) {
                    
                sum += getTotalPerRow_public(item.request-item.received , item.price, item.discount); 

              });

             return sum;
           },

            requestError : function () {

                return parseInt(this.request) < parseInt(this.received);
            },

            discountError : function () {

                return parseInt(this.discount) > 100;
            },
        },

        methods : {
            addToList : function () {
                
                this.price = this.roundTwoDecimal(this.price)
                this.discount = this.roundTwoDecimal(this.discount)

                var newItem = {
                    partno: this.partno, 
                    request: this.request, 
                    received: this.received ? this.received : 0, 
                    price: this.price ? this.price : 0, 
                    discount: this.discount ? this.discount : 0, 
                }

                this.clearAll()

                this.items.push(newItem)
            },

            itemRemove : function (key) {
                
                var confirmvar = confirm("Delete this record?");

                if (confirmvar == true) {

                    var newArray = [];
                    var i;
                    for (i = 0; i < this.items.length; i++) {
                      
                      if(i!=key) {
                        newArray.push(this.items[i])
                      }                  
                    }
                    this.items = newArray
                }
            },

            itemEdit : function (key) {

                var confirmvar = confirm("Edit this record?");

                if (confirmvar == true) {

                    this.partno = this.items[key].partno
                    this.request= this.items[key].request
                    this.received= this.items[key].received
                    this.price= this.items[key].price
                    this.discount= this.items[key].discount

                    this.isUpdate = true;
                    this.itemToBeUpdate = key;
                }
            },

            itemUpdateCancel : function (key) {

                this.clearAll()
                this.isUpdate = false;
                this.itemToBeUpdate = null;
            },

            itemUpdate : function () {

                this.price = this.roundTwoDecimal(this.price)
                this.discount = this.roundTwoDecimal(this.discount)

                this.items[this.itemToBeUpdate].partno = this.partno
                this.items[this.itemToBeUpdate].request = this.request
                this.items[this.itemToBeUpdate].received = this.received
                this.items[this.itemToBeUpdate].price = this.price
                this.items[this.itemToBeUpdate].discount = this.discount

                this.clearAll()
                this.isUpdate = false;
                this.itemToBeUpdate = null;
            },

            clearAll : function (){

                this.partno = null
                this.request= null
                this.received= null
                this.price= null
                this.discount= null
            },

            finalSubmit : function() {
                
                axios.post(this.apisubmiturl, {
                    
                        data : {
                            supplier:this.supplier,
                            supplier_date:this.supplier_date,
                            supplier_invoice_num:this.supplier_invoice_num,
                            rahdan_invoice_num:this.rahdan_invoice_num,
                            details: this.items,
                        },
                        _method: 'patch'
                    
                    }).then(res => {
                    
                    alert('Successfully Saved.')

                    location.reload();

                }).catch(err => {
                    alert(err)
                })
            },

            // this function was made because select2 with autocomplete has error inside vue
            checkSelect2Val : function () {
                this.supplier = $('select[name="mySelect2"] option:selected').val()
            },

            getTotalPerRow : function (qty , price, discount) {
                
                return getTotalPerRow_public(qty , price, discount)                
            },

            roundTwoDecimal : function (money) {

                return roundTwoDecimal_public(money)
            },

            computeVat : function(num) {

                return roundTwoDecimal_public(num * .05)
            },

            computeTotalwVat : function(num) {

                return roundTwoDecimal_public(num)
            }
        }
    }

    function getTotalPerRow_public(qty , price, discount) {

        var regPrice = price * qty

        var total =  discount ? regPrice - (regPrice * (discount / 100) ) : regPrice

        return roundTwoDecimal_public(total)
    }

    function roundTwoDecimal_public(money) {

        return Math.round(money * 100) / 100
    }

</script>

<style>
    .field_border_red {
        border-color : red
    }
</style>
