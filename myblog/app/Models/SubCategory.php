<?php

namespace App\Models;

use App\Models\category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubCategory extends Model
{
    use HasFactory;
    public function category(){
        return $this->belongsTo(category::class); //belongsTo ar jonno model(category) and funtion(category) name akrokom hota hoba

    }
}
