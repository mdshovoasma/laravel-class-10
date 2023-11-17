<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
// use App\Models\storeCategory;
use App\Http\Helpers\sluggenarator;
use App\Http\Controllers\Controller;
use App\Models\category;
// use App\Models\StoreCtegory;

class CategoryController extends Controller
{

    use sluggenarator; //name of trait
   
    function  viewcategory (){
        
        $category= category::latest()->paginate(10);
       
        return view('backendview.view',compact('category'));
        

    }
    //
    function storecategory(Request $request){
        $request->validate([
            'title'=>'required',
        ]);

     $store= new category();
        $store->title=$request->title;
        // $store->slug = str($request->title)->slug();
       
    
    $store->slug =$this->genaratslug($request->title,category::class);
    $store->save();


    $category= category::latest()->paginate(10);
        // dd($category);
        return view('backendview.view',compact('category'));
       
       


    }

    function editecategory($id){
      
        $editecategory =category::find($id);
        // dd($editecategory->id);
        $category= category::latest()->paginate(10);
        
        return view('backendview.editeview',compact('category','editecategory'));
       
    }
    function updatecategory( Request $request, $id){
       
        $updatecategory =category::find($id);
        $updatecategory->title=$request->title;
        
        $updatecategory->save();
        $category= category::latest()->paginate(10);
       
        return back();
    

    }

    // delete funtion
     function deletecategory($id){
        category::find($id)->delete();
       
        return back();
     }
}
