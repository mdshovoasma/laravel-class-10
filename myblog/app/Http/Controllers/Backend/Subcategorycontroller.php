<?php

namespace App\Http\Controllers\Backend;

// use App\Models\subcategory;
// use App\Models\StoreCtegory;
use Illuminate\Http\Request;
// use App\Models\storecategory;
use App\Http\Helpers\sluggenarator;
use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\SubCategory;
// use App\Models\SubCategore;
use Symfony\Contracts\Service\Attribute\Required;

class Subcategorycontroller extends Controller

{
    use sluggenarator;

    function subcategoryview(){

        // $substorecategory=SubCategory::find(1)->category;
        // dd($substorecategory);

        $substorecategory=SubCategory::with('category')->get(); 
        // dd($substorecategory);
        $storecategory=category::with('subcategories')->get();


        $categores=category::select('id','title')->latest()->get();
       
        
      
        return view('backendview.subcategoryview',compact('categores','storecategory','substorecategory'));
       
    }
    function storesubcategory(Request $request){
        $request->validate([

            'title'=>'Required',
        ]);

       $substorecategory = new SubCategory();
       $substorecategory->category_id=$request->forain_id;
       $substorecategory->title=$request->title;
       $substorecategory->slug=$this->genaratslug($request->title,SubCategory::class);
       $substorecategory->save();
       return back();

       
    }
    function subcategoryajax(Request $request){ 
        $subcategory=SubCategory::where('category_id',$request->categoryid)->get();   //ajax ar jonno abossoi akana funtion call kora return korta hoba
        return  $subcategory;
    }
}




