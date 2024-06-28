<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;

use Illuminate\Support\Facades\Http;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $orders=DB::table("orders as o")  
        ->join("customers as c","c.id","=","o.customer_id")
        ->select("o.id","c.name as customer","c.mobile","o.order_date as date","o.shipping_address","o.order_total")
        ->paginate(10);
        return view("pages.order.index",["orders"=>$orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers=DB::table("customers")->get();
        $products=DB::table("products")->get();

       // print_r($customers);
        return view("pages.order.create",["customers"=>$customers,"products"=>$products]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         
               
          //print_r($products);
        //Order
         $order=new Order;
         
        // print_r($order);

           $order->customer_id=$request->cmbCustomer;
           $order->order_date=date("Y-m-d",strtotime($request->txtOrderDate));
           $order->delivery_date=date("Y-m-d",strtotime($request->txtDueDate));
           $order->shipping_address=isset($request->txtShippingAddress)?$request->txtShippingAddress:"NA";
           $order->discount=isset($request->txtDiscount)?$request->txtDiscount:0;
           $order->vat=isset($request->txtVat)?$request->txtVat:"0";
           $order->paid_amount=0;
           $order->order_total=0;
           $order->status_id=1;         
           
           $order->save();        
         

        //  //Order Details
        $products=$request->txtProducts; 
        
       // print_r($products);
       
        foreach($products as $product){         
           
            $order_detail=new OrderDetail;         

            $order_detail->order_id=$order->id;
            $order_detail->product_id=$product["item_id"];
            $order_detail->qty=$product["qty"];
            $order_detail->price=$product["price"];            
            $order_detail->discount=isset($product["discount"])?$product["discount"]:0;
            $order_detail->vat=0;

            $order_detail->save();
      }


         //Stock




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {

        $customer=DB::Table("customers")->where("id",$order->customer_id)->first();

        $products=DB::Table("order_details as od")
        ->join("products as p","p.id","=","od.product_id")
        ->select("p.name","od.price","od.qty","od.discount")
        ->where("od.order_id",$order->id)
        ->get();

        //print_r($customer->name);

        return view("pages.order.show",["order"=>$order,"customer"=>$customer,"products"=>$products]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {  
        $order->delete();
        


        //
    }
}
