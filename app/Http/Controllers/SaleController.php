<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\Customer;
use App\Models\Sale;
use App\Models\SaleDetail;

use Illuminate\Support\Facades\Http;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        // $sales=DB::table("sales as o")  
        // ->join("customers as c","c.id","=","o.customer_id")
        // ->select("o.id","c.name as customer","c.mobile","o.order_date as date","o.shipping_address","o.order_total")
        // ->paginate(10);
        return view("pages.sale.index",["sales"=>$sales]);
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
        return view("pages.sale.create",["customers"=>$customers,"products"=>$products]);
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
        //Sale
         $sale=new sale;
         
        // print_r($sale);

           $sale->customer_id=$request->cmbCustomer;
           $sale->sale_date=date("Y-m-d",strtotime($request->txtSaleDate));
           $sale->delivery_date=date("Y-m-d",strtotime($request->txtDueDate));
           $sale->shipping_address=isset($request->txtShippingAddress)?$request->txtShippingAddress:"NA";
           $sale->discount=isset($request->txtDiscount)?$request->txtDiscount:0;
           $sale->vat=isset($request->txtVat)?$request->txtVat:"0";
           $sale->paid_amount=0;
           $sale->sale_total=0;
           $sale->status_id=1;         
           
           $sale->save();        
         

        //  //Sale Details
        $products=$request->txtProducts; 
        
       // print_r($products);
       
        foreach($products as $product){         
           
            $sale_detail=new SaleDetail;         

            $sale_detail->sale_id=$sale->id;
            $sale_detail->product_id=$product["item_id"];
            $sale_detail->qty=$product["qty"];
            $sale_detail->price=$product["price"];            
            $sale_detail->discount=isset($product["discount"])?$product["discount"]:0;
            $sale_detail->vat=0;

            $sale_detail->save();
      }


         //Stock




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(sale $sale)
    {

        $customer=DB::Table("customers")->where("id",$sale->customer_id)->first();

        $products=DB::Table("sale_details as od")
        ->join("products as p","p.id","=","od.product_id")
        ->select("p.name","od.price","od.qty","od.discount")
        ->where("od.sale_id",$sale->id)
        ->get();

        //print_r($customer->name);

        return view("pages.sale.show",["sale"=>$sale,"customer"=>$customer,"products"=>$products]);
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
    public function destroy(Sale $sale)
    {  
        $sale->delete();
        


        //
    }
}
