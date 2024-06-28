<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\Customer;
use App\Models\Purchase;
// use App\Models\OrderDetail;

use Illuminate\Support\Facades\Http;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        // $purchases=DB::table("purchases as o")  
        // ->join("customers as c","c.id","=","o.customer_id")
        // ->select("o.id","c.name as customer","c.mobile","o.order_date as date","o.shipping_address","o.order_total")
        // ->paginate(10);
        return view("pages.purchase.index",["purchases"=>$purchases]);
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
        return view("pages.purchase.create",["customers"=>$customers,"products"=>$products]);
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
         $purchase=new purchase;
         
        // print_r($order);

           $purchase->customer_id=$request->cmbCustomer;
           $purchase->purchase_date=date("Y-m-d",strtotime($request->txtPurchaseDate));
           $purchase->delivery_date=date("Y-m-d",strtotime($request->txtDueDate));
           $purchase->shipping_address=isset($request->txtShippingAddress)?$request->txtShippingAddress:"NA";
           $purchase->discount=isset($request->txtDiscount)?$request->txtDiscount:0;
           $purchase->vat=isset($request->txtVat)?$request->txtVat:"0";
           $purchase->paid_amount=0;
           $purchase->purchase_total=0;
           $purchase->status_id=1;         
           
           $purchase->save();        
         

        //  //Order Details
        $products=$request->txtProducts; 
        
       // print_r($products);
       
        foreach($products as $product){         
           
            $purchase_detail=new PurchaseDetail;         

            $purchase_detail->purchase_id=$purchase->id;
            $purchase_detail->product_id=$product["item_id"];
            $purchase_detail->qty=$product["qty"];
            $purchase_detail->price=$product["price"];            
            $purchase_detail->discount=isset($product["discount"])?$product["discount"]:0;
            $purchase_detail->vat=0;

            $purchase_detail->save();
      }


         //Stock




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(purchase $purchase)
    {

        $customer=DB::Table("customers")->where("id",$purchase->customer_id)->first();

        $products=DB::Table("purchase_details as od")
        ->join("products as p","p.id","=","od.product_id")
        ->select("p.name","od.price","od.qty","od.discount")
        ->where("od.purchase_id",$purchase->id)
        ->get();

        //print_r($customer->name);

        return view("pages.purchase.show",["purchase"=>$purchase,"customer"=>$customer,"products"=>$products]);
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
    public function destroy(purchase $purchase)
    {  
        $purchase->delete();
        


        //
    }
}
