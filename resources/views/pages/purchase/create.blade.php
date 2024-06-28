

@extends('layouts.app')
@section('page')
<style>
 #cmbCustomer{
   padding:5px;
 }
</style>
 <!-- Content Header (Page header) -->
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 style="color: #8c31ee; font-weight:900;"> Create Purchase</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Create Purchase</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <form action="#" method="post" >
          @csrf
        <div class="row">
          <div class="col-12">
            <!-- <div class="callout callout-info">
              <h5><i class="fas fa-info"></i> Note:</h5>
              This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
            </div> -->


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> SUPER-SHOP.
                    <small class="float-right">Date: <?php echo date("d M Y")?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  From
                  <address>
                    <strong>Super Shop</strong><br>
                    House:11, Road:10<br>
                    
                    Mobile: +880 1727322186<br>
                    Email: supershop@gmail.com
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  To
                  <address>
                    <?php
                      //echo Customer::get_selectbox();
                    ?>
                    <select id="cmbCustomer" name="cmbCustomer">
                    @foreach($customers as $customer)
                      <option value="{{$customer->id}}">{{$customer->name}}</option>
                    @endforeach
                    </select>
                   <div class="customer-info"></div>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                 
                  <table>
                    <tr><td><b>Purchase ID:</b></td><td><input type="text" style="width:60px" value="<?php //echo Sale::getLastSaleId()+1;?>"  readonly/></td></tr>
                    <tr><td><b>Purchase Date:</b></td><td><input type="text" id="txtSaleDate" value=<?php echo date("d-m-Y");?> /></td></tr>
                    <tr><td><b>Due Date:</b></td><td><input type="text" id="txtDueDate" value=<?php echo date("d-m-Y");?> /></td></tr>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <!-- <th>SN</th> -->
                      <th>Product</th>
                      <th>Price</th>
                      <th>Qty</th>                     
                      <th>Discount</th>
                      <th>Subtotal</th>
                      <th><input type="button" id="clearAll" value="Clear" /></th>
                    </tr>
                    <tr>
                      <!-- <th></th> -->
                      <th>
                        <?php
                         // echo Product::get_selectbox();
                       ?>
                       <select id="cmbProduct" name="cmbProduct">
                        @foreach($products as $product)
                          <option value="{{$product->id}}">{{$product->name}}</option>
                        @endforeach
                        </select>
                      </th>
                        <th><input type="text" id="txtPrice" /></th>
                        <th><input type="text" id="txtQty" /></th>
                        <th><input type="text" id="txtDiscount" /></th>
                        <th></th>
                        <th><input type="button" id="btnAddToCart" value=" + " /></th>
                      </tr>
                    </thead>
                    <tbody  id="items">                    
                   
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <!-- <p class="lead">Payment Methods:</p>
                  <img src="{{asset('asset')}}/dist/img/credit/visa.png" alt="Visa">
                  <img src="{{asset('asset')}}/dist/img/credit/mastercard.png" alt="Mastercard">
                  <img src="{{asset('asset')}}/dist/img/credit/american-express.png" alt="American Express">
                  <img src="{{asset('asset')}}/dist/img/credit/paypal2.png" alt="Paypal">

                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                   Thank you for shopping
                  </p> -->
                </div>
                <!-- /.col -->
                <div class="col-6">
                  <!-- <p class="lead">Amount Due 2/22/2014</p> -->

                  <div class="table-responsive">
                    <table class="table">
                      <tbody>
                     <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td id="subtotal">0</td>
                      </tr>
                      <tr>
                        <th>Tax (5%)</th>
                        <td id="tax">0</td>
                      </tr>
                      <tr>
                        <th>Shipping:</th>
                        <td id="shopping-cost">0</td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td id="net-total">0</td>
                      </tr>
                    </tbody></table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <!-- <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a> -->
                  <button type="submit" id="btnProcessSale" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Process  </button>
                  <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </button>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
</form>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <script>
      $(function() {  
        
        //Show calander in textbox
        $("#txtSaleDate").datepicker({dateFormat: 'dd-mm-yy'});
        $("#txtDueDate").datepicker({dateFormat: 'dd-mm-yy'});

        printCart();



        //Save into database table
        $("#btnProcessSale").on("click",function(e){
           
            e.preventDefault();            

              let customer_id=$("#cmbCustomer").val();
              var token = $("input[name='_token']").val();
              var method = $("input[name='_method']").val();
                            
              let sale_date=$("#txtSaleDate").val();
              let due_date=$("#txtDueDate").val();
              let discount=0;
              let vat=0;
              let shipping_address="na";

              let products=JSON.parse(localStorage.getItem("cart"));

              //console.log(sale_date);
              
              $.ajax({
                url:"{{route('sales.store')}}",
                type:'POST',               
                data:{
                  _token:token,
                  _method:method,
                  "cmbCustomer":customer_id,
                  "txtSaleDate":sale_date,
                  "txtDueDate":due_date,
                  "txtShippingAddress":shipping_address,
                  "txtDiscount":discount,
                  "txtVat":vat,
                  "txtProducts":products
                },
                success:function(res){
                  console.log(res);
                  clearCart();
                  $("#items").html("");
                }
              });
              
             
        });       



        //Show customer other information
        $("#cmbProduct").on("change",function(){     
          let id=$(this).val();
           $.ajax({
             url:"{{url('api/products')}}/"+`${id}`,
             type:'GET',
             //data:{"id":$(this).val()},
             success:function(res){
               //console.log(res);
              let product=JSON.parse(res);
               //console.log(product);
              $("#txtPrice").val(product.offer_price);
              $("#txtQty").val(1);
              $("#txtQty").focus();
             }
           });
        });   
        
        $("#txtQty").on("keyup",function(e){           
          if(e.which==13){
            $("#txtDiscount").focus();
          }
        });


        //Show customer other information
        $("#cmbCustomer").on("change",function(){          
          let id=$(this).val();  
              
           $.ajax({
             url:"{{url('api/customers')}}/"+`${id}`,
             type:'GET',
             //data:{"id":$(this).val()},
             success:function(res){
             // let customer=JSON.parse(res);
                console.log(res);
              $(".customer-info").html(res.mobile);
             }
           });
        });      
       
       
    
      
      //Add item to bill temporarily
        $("#btnAddToCart").on("click",function(){
          
          addToCart();
          
        });

        
        // $("#txtDiscount").on("keyup",function(e){           
        //   if(e.which==13){
        //     addToCart();
        //   }
        // });


        $("body").on("click",".delete",function(){
           let id=$(this).data("id");        
           delItem(id)
           printCart();
        });
     
        $("#clearAll").on("click",function(){
          clearCart();
          printCart();
        });


    //------------------Cart Functions----------//      

      function addToCart(){
            let item_id=$("#cmbProduct").val(); 
            let name=  $("#cmbProduct option:selected").text();          
            let price=$("#txtPrice").val();
            let qty=$("#txtQty").val();
            let discount=$("#txtDiscount").val();
            let total_discount=discount*qty;
            let subtotal=price*qty-total_discount;
           
            let item={
              "name":name,
              "item_id":item_id,
              "price":price,
              "qty":parseFloat(qty),
              "discount":discount,
              'total_discount':total_discount,
              "subtotal":subtotal
            }; 
            
            console.log(item);
            
             save(item);
             printCart();      
      }

       function printCart(){
          let cart= getCart();            
           let sn=1;          
           let $bill="";  
           let subtotal=0;
           $.each(cart,function(i,item){
                //console.log(item.name);
             subtotal+=item.price*item.qty-item.discount;
             let $html="<tr>";            
             $html+="<td>";
             $html+=sn;
             $html+="</td>";
             $html+="<td>";
             $html+=item.name;
             $html+="</td>";
             $html+="<td data-field='price'>";
             $html+=item.price;
             $html+="</td>";
             $html+="<td data-field='qty'>";
             $html+=item.qty;
             $html+="</td>";
             $html+="<td data-field='discount'>";
             $html+=item.total_discount;
             $html+="</td>";
             $html+="<td data-field='subtotal'>";
             $html+=item.subtotal;
             $html+="</td>";
             $html+="<td>";
             $html+="<input type='button' class='delete' data-id='"+item.item_id+"' value='-'/>";
             $html+="</td>";
             $html+="</tr>";
             $bill+=$html;
             sn++;
           });      
                      
           $("#items").html($bill); 

           //Sale Summary
           $("#subtotal").html(subtotal);
           let tax=(subtotal*0.05).toFixed(2);
           $("#tax").html(tax);
           $("#net-total").html(parseFloat(subtotal)+parseFloat(tax));
        }
     
      
      
       
       
      

      });
  </script>

  
@endsection


