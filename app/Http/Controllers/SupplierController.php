<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\SupplierCategory;
use App\Models\SupplierBrand;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class SupplierController extends Controller{

   public function __construct()
    {
        $this->middleware('auth');
    }

   public function index(){     
   
    $suppliers=DB::table("suppliers")->get();

   //    $suppliers=DB::table("suppliers as p")
   //   ->join("uoms as u","p.uom_id","=","u.id")
   //   ->join("supplier_categories as c","c.id","=","p.supplier_category_id")
   //   ->select("p.id","p.name","c.name as category","p.offer_price","p.regular_price","p.photo")
   //   ->paginate(10);

     return view("pages.supplier.index",["suppliers"=>$suppliers]);
   }

   public function create(){
      return view("pages.supplier.create"); 
   }

   public function store(Request $request){
      //echo $request->name;
      $r=new supplier();
      $r->name=$request->name;
      $r->mobile=$request->mobile;
      $r->email=$request->email;
      $r->address=$request->address;
      $r->created_at=$request->created_at;
      $r->updated_at=$request->updated_at;
      $r->save();

      return redirect()->route("suppliers.index")->with('success','Success.');

   }


   public function edit(supplier $supplier){     
    //   $categories=SupplierCategory::all();
    //   $brands=ProductBrand::all();
      return view("pages.supplier.edit",["supplier"=>$supplier]); 
   }

  public function update(Request $request,supplier $supplier){       
      //$role=Role::find($id);
      $supplier->name=$request->name;
      $supplier->mobile=$request->mobile;
      $supplier->email=$request->email;
      $supplier->address=$request->address;
      
      $supplier->update();

      return redirect()->route("suppliers.index")->with('success','Success.');
    
  }  


   public function show(supplier $supplier){     
       return view("pages.supplier.show",["supplier"=>$supplier]);
   }

   public function delete($id){ 
      
       $supplier=supplier::find($id);
       //echo $role->id;
       return view("pages.supplier.delete",["supplier"=>$supplier]);
   }

   public function destroy(supplier $supplier){
      $supplier->delete();
      return redirect()->route("suppliers.index")->with('success','Success.');
      
   }

}