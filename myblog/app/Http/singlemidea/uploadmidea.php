<?php
namespace App\Http\singlemidea;

trait uploadmidea{
    public function uploadpost($title,$midea,$folder='postimg',$path='public'){
        $filename = $title.'.'.$midea->extension();
        $upload = $midea->storeAs($folder,$filename,$path);
        return $upload;
        
    }

}