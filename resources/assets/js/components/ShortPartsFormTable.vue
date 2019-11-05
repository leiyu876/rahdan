<template>
    <div>
        <form class="form-horizontal" onsubmit="event.preventDefault()">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="supplier" class="col-sm-4 control-label">Supplier Name</label>                              
                            <div class="col-sm-8">
                                <select class="form-control select2" style="width: 100%;">
                                  <option v-for="supplier in suppliers">{{ supplier.name }}</option>
                                </select>                                 
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="date" class="col-sm-4 control-label">Supplier Invoice Date</label>
                            <div class="col-sm-8">
                                <div class="input-group date">
                                  <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                  </div>
                                  <input name="date" type="text" class="form-control pull-right" id="date">                                  
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
                      <input type="text" class="form-control" v-model="partno">
                    </div>
                </div>
                <hr/>
                <div class="row">
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
                              <input  class="form-control" v-model="received" type="number" min="1">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="discount" class="col-sm-4 control-label">Discount</label>
                            <div class="col-sm-8">
                              <input  class="form-control" v-model="discount" type="number" min="1">
                            </div>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-default" @click="itemUpdateCancel" v-if="isUpdate">Cancel</button>
                        <button class="btn btn-default" @click="itemUpdate" v-if="isUpdate">Update</button>
                        <button class="btn btn-default" @click="addToList" v-if="!isUpdate">Add to List</button>
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
                <tr v-for="item, key in items">
                    <td>{{ ++key }}</td>
                    <td>{{ item.partno}}</td>
                    <td>{{ item.request}}</td>
                    <td>{{ item.received}}</td>
                    <td>{{ item.request - item.received}}</td>
                    <td>{{ item.price}}</td>
                    <td>{{ item.discount}}</td>
                    <td>
                        <i class="fa fa-fw fa-pencil" data-toggle="tooltip" title="Edit" @click="itemEdit(key-1)"></i>
                        <i class="fa fa-fw fa-trash" data-toggle="tooltip" title="Delete" @click="itemRemove(key-1)"></i>
                    </td>
                </tr>
            </tbody>
         </table>
         <button class="btn btn-primary" @click="finalSubmit">Final Save</button>
    </div>
</template>

<script>
    
    export default {
        mounted() {
            
        },

        props : [
            'apisubmiturl',
            'suppliers',
            
        ],

        data : function () {
            return {

                isUpdate : false,
                itemToBeUpdate : null,
                items : [
                    {
                        partno: '04465-06090', 
                        request: 100, 
                        received: 80, 
                        price: 350, 
                        discount: 50, 
                    },
                    {
                        partno: '88501-06060', 
                        request: 10, 
                        received: 8, 
                        price: 200, 
                        discount: 25, 
                    },
                ],
                partno: null,
                request: null,
                received: null,
                price: null,
                discount: null
            }
        },

        methods : {
            addToList : function () {
                var newItem = {
                    partno: this.partno, 
                    request: this.request, 
                    received: this.received, 
                    price: this.price, 
                    discount: this.discount, 
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
                make this functionality
                axios.post(this.apisubmiturl, this.items)
                    .then(res => {
                    console.log(res)
                }).catch(err => {
                    console.log(err)
                })
            }
        }
    }
</script>
