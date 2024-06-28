<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\ContactCategory;
// use App\Models\SupplierBrand;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class ContactController extends Controller{

   public function __construct()
    {
        $this->middleware('auth');
    }

   public function index(){     
   
    $contacts=DB::table("contacts")->get();

   //    $suppliers=DB::table("suppliers as p")
   //   ->join("uoms as u","p.uom_id","=","u.id")
   //   ->join("supplier_categories as c","c.id","=","p.supplier_category_id")
   //   ->select("p.id","p.name","c.name as category","p.offer_price","p.regular_price","p.photo")
   //   ->paginate(10);

     return view("pages.contact.index",["contacts"=>$contacts]);
   }

   public function create(){
      return view("pages.contact.create"); 
   }

   public function store(Request $request){
      //echo $request->name;
      $r=new contact();
      $r->name=$request->name;
      $r->mobile=$request->mobile;
      $r->address=$request->address;
      $r->created_at=$request->created_at;
      $r->updated_at=$request->updated_at;
      $r->save();

      return redirect()->route("contacts.index")->with('success','Success.');

   }


   public function edit(contact $contact){     
    //   $categories=SupplierCategory::all();
    //   $brands=ProductBrand::all();
      return view("pages.contact.edit",["contact"=>$contact]); 
   }

  public function update(Request $request,contact $contact){       
      //$role=Role::find($id);
      $contact->name=$request->name;
      $contact->mobile=$request->mobile;
      $contact->address=$request->address;
      
      
      $contact->update();

      return redirect()->route("contacts.index")->with('success','Success.');
    
  }  


   public function show(contact $contact){     
       return view("pages.contact.show",["contact"=>$contact]);
   }

   public function delete($id){ 
      
       $contact=contact::find($id);
       //echo $role->id;
       return view("pages.contact.delete",["contact"=>$contact]);
   }

   public function destroy(contact $contact){
      $contact->delete();
      return redirect()->route("contacts.index")->with('success','Success.');
      
   }

}