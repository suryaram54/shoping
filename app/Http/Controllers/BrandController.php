<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\multipic;

use Illuminate\Support\Carbon;
use Illuminate\Http\UploadedFile;
 use App\Http\Controllers\Storage;
 use File;
 use Image;

 use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    public function AllBrand(){
        $brands=Brand::paginate(5);

        return view('admin.brand.index',compact('brands'));
    }
    public function StoreBrand(Request $request){
        $validated = $request->validate([
            'brand_name' => 'required|unique:brands|max:255',
            'brand_image' => 'required|mimes:jpg,jpeg,png',

            
        ],[


            'brand_name.required'=>'input add chayyara ',
            'brand_image.min' =>'brand longer',


        ]);

        $brand_image=$request->file('brand_image');
        $name_gen=hexdec(uniqid());
        $img_ext=strtolower($brand_image->getClientOriginalExtension());
        $img_name=$name_gen.'.'.$img_ext;
        $up_location='image/brand/';
        $last_img= $up_location.$img_name;
        $brand_image->move($up_location,$last_img);

      Brand::insert([
      'brand_name'=>$request->brand_name,
      'brand_image'=>$last_img,
      'created_at'=>carbon::now()


      ]);

      return Redirect()->back()->with('success','Brand inserted successfully');



    }

   public function Edit($id){

   $brands=Brand::find($id);
   return view('admin.brand.edit',compact('brands'));

   }


   public function update(Request $request, $id){

    // $update=Brand::find($id)->update([
    //     'brand_name'=>$request->brand_name,
    //     'user_id' => Auth::user()->id,

    //    ]);
       
    $validated = $request->validate([
        'brand_name' => 'required|max:255',
        'brand_image' => 'required|mimes:jpg,jpeg,png',
       
        
    ],[


        'brand_name.required'=>'input add chayyara ',
        'brand_image.min' =>'brand longer',


    ]);
    $image = Brand::find($id);
    $old_image = $image->brand_image;
    
    if (is_file($old_image)){
        Unlink($old_image);
    }
    // print_r($old_image);
    // die();
    $brand_image=$request->file('brand_image');
    $name_gen=hexdec(uniqid());
    $img_ext=strtolower($brand_image->getClientOriginalExtension());
    $img_name=$name_gen.'.'.$img_ext;
    $up_location='image/brand/';
    $last_img= $up_location.$img_name;
    //  print_r( $last_img);
    // die();
    $brand_image->move($up_location,$last_img);

//   unlink($old_image);
//   if (is_file($old_image)){
//     Unlink($old_image);
// }
// if(Storage::exists($old_image)) {
//     unlink($old_image); //delete from storage
//     // Storage::delete($file_path); //Or you can do it as well
//  }
//  if (File::exists($old_image)) { // unlink or remove previous image from folder
//     unlink($old_image);
// }
    //  Brand::find($id)->insert([
    // 'brand_name'=>$request->brand_name,
    // 'brand_image'=>$last_img,
    // 'created_at'=>carbon::now()
  
  
    // ]);


    $data = array();
    $data['brand_name'] = $request->brand_name;
    $data['brand_image'] = $last_img;
    DB::table('brands')->where('id',$id)->update($data);



//  $surya= Brand::find($id)->update([
//   'brand_name'=>$request->brand_name,
//   'bran_image'=>$last_img,
//   'created_at'=>carbon::now()


//   ]);
//   print_r( $surya);
//     die();
  return Redirect()->route('all.brand')->with('success','Brand updated successfully');






   }


   public function Delete($id){
    $image = Brand::find($id);
    $old_image = $image->brand_image;
    unlink($old_image);
    if (File::exists($old_image)) { // unlink or remove previous image from folder
        unlink($old_image);
    }


   Brand::find($id)->delete();
//    $notification = array(
//        'message' => 'Brand Delete Successfully',
//        'alert-type' => 'error'
//    );   
   return Redirect()->route('all.brand')->with('success','Brand deleted successfully');

}

  public function Multipic(){


    $images=multipic::all();

   return view('admin.multi_image.index',compact('images'));
  }

 public function storeimg(Request $request){

    $image =  $request->file('image');

    foreach($image as $multi_img){ 

    $name_gen = hexdec(uniqid()).'.'.$multi_img->getClientOriginalExtension();
    Image::make($multi_img)->resize(300,300)->save('image/multi/'.$name_gen);

    $last_img = 'image/multi/'.$name_gen;

    Multipic::insert([
       
        'image' => $last_img,
        'created_at' => Carbon::now()
    ]);
        } // end of the foreach



        return Redirect()->back()->with('success','Brand Inserted Successfully');


 }



}
