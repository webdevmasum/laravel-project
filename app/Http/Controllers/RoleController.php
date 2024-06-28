<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Role;


class RoleController extends Controller{

   public function index(){
      
      //print_r(Role::all());
     return view("pages.role.index",["roles"=>Role::all()]);
   }

   public function create(){
      return view("pages.role.create"); 
   }

   public function store(Request $request){
      //echo $request->name;
      $r=new Role();
      $r->name=$request->name;
      $r->save();

      return redirect()->route("roles.index")->with('success','Success.');

   }


   public function edit(Role $role){     
      //$role=Role::find($id);
      return view("pages.role.edit",["role"=>$role]); 
   }

  public function update(Request $request,Role $role){       
      //$role=Role::find($id);
      $role->name=$request->name;
      $role->update();
      return redirect()->route("roles.index")->with('success','Success.');
    
  }  


   public function show($id){
      echo "Show:".$id;
      // return view("pages.role.show");
   }

   public function delete($id){
     echo "Delete:$id";
   }

   public function destroy($id){
      echo "Destroy";
   }

}