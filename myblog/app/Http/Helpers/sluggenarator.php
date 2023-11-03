<?php
namespace App\Http\Helpers;
trait sluggenarator{

    public function genaratslug($title,$model){

        $count=$model::where('slug','Like','%'.str($title)->slug().'%')->count();
        if($count>0){
            $count++;
          return  $slug = str($title)->slug().'-'.$count;
    
        }else{
            return $slug = str($title)->slug();
        }
    }



}




?>