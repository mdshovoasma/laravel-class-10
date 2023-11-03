<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\storeCategory;
use App\Http\Helpers\sluggenarator;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{

    use sluggenarator; //name of trait
   
    function  viewcategory (){
        return view('backendview.view');

    }
    function storecategory(Request $request){
        $request->validate([
            'title'=>'required',
        ]);

     $store= new storecategory;
        $store->title=$request->title;
        // $store->slug = str($request->title)->slug();
       
    
    $store->slug =$this->genaratslug($request->title,storecategory::class);
    $store->save();
    return back();


    }
}
