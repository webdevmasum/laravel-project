<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;
// use App\Models\ProductBrand;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class ProductController extends Controller{

   public function __construct()
    {
        $this->middleware('auth');
    }

   public function index(){     
   
    $products=DB::table("products")->get();

      $products=DB::table("products as p")
     ->join("uoms as u","p.uom_id","=","u.id")
     ->join("product_categories as c","c.id","=","p.product_category_id")
     ->select("p.id","p.name","c.name as category","u.name as uom","p.offer_price","p.regular_price","quantity")
     ->paginate(10);

     return view("pages.product.index",["products"=>$products]);
   }

   public function create(){
      return view("pages.product.create"); 
   }

   public function store(Request $request){
      //echo $request->name;
      $r=new Product();
      $r->name=$request->name;
      $r->name=$request->offer_price;
      $r->name=$request->regular_price;
      $r->name=$request->product_category;
      $r->name=$request->uom;
      $r->name=$request->quantity;
      $r->created_at=$request->created_at;
      $r->updated_at=$request->updated_at;
      $r->save();

      return redirect()->route("products.index")->with('success','Success.');

   }


   public function edit(Product $product){     
      $categories=ProductCategory::all();
      $brands=ProductBrand::all();
      return view("pages.product.edit",["product"=>$product,"categories"=>$categories]); 
   }

  public function update(Request $request,Product $product){       
      //$role=Role::find($id);
      $product->name=$request->name;
      $product->regular_price=$request->regular_price;
      $product->offer_price=$request->offer_price;
      $r->name=$request->product_category;
      $r->name=$request->uom;
      $r->name=$request->quantity;

      // if(isset($request->photo)){
		//    $product->photo=$request->photo;
		// }

      // if(isset($request->photo)){
		// 	$imageName = $product->id.'.'.$request->photo->extension();
		// 	$product->photo=$imageName;
		// 	$request->photo->move(public_path('img'),$imageName);
		// }

      $product->update();

      return redirect()->route("products.index")->with('success','Success.');
    
  }  


   public function show(Product $product){     
       return view("pages.product.show",["product"=>$product]);
   }

   public function delete($id){ 
      
       $product=Product::find($id);
       //echo $role->id;
       return view("pages.product.delete",["product"=>$product]);
   }

   public function destroy(Product $product){
      $product->delete();
      return redirect()->route("products.index")->with('success','Success.');
      
   }

}