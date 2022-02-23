<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\category;
use Auth;
use Illuminate\Support\Carbon;


class categoryController extends Controller
{
    //
    public function AllCat(){

        // $categories=category::latest()->paginate(5);
        $categories=category::paginate(5);
        $trashcat=category::onlyTrashed()->latest()->paginate(3);

        return view('admin.category.index',compact('categories','trashcat'));


    }

    public function Addcat(Request $request)
    {
        $validated = $request->validate([
            'category_name' => 'required|unique:categories|max:255',
            
        ],[


            'category_name.required'=>'input add chayyara ',
            'category_name.max' =>'characters thagginchara',


        ]);
     
        category::insert([
          'category_name'=>$request->category_name,
          'user_id' => Auth::user()->id,
          'created_at'=>Carbon::now()


          ]);

            return Redirect()->back()->with('success','categort inserted successfully');
    }

    public function Edit($id){

         $category=Category::find($id);
         return view('admin.category.edit',compact('category'));

    }

    public function update( Request $request,$id){
        $update=Category::find($id)->update([
         'category_name'=>$request->category_name,
         'user_id' => Auth::user()->id,

        ]);

        return Redirect()->route('all.category')->with('success','categort updated successfully');

    }


    public function softdelete($id){
   $delete=category::find($id)->delete();
   return Redirect()->back()->with('success','categort softdelete successfully');


   
    }

  public function Restore($id){
    $delete=category::withTrashed()->find($id)->restore();

    return Redirect()->back()->with('success','category Restore successfully');
  }

public function pDelete($id){

$delete=category::onlyTrashed()->find($id)->forceDelete();

return Redirect()->back()->with('success','category permanently delete successfully');


}

}
