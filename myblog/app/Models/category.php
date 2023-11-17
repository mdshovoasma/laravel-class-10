<?php

namespace App\Models;

use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class category extends Model
{
    use HasFactory;
    public function subcategories(){
        return $this->hasMany(SubCategory::class); // akana same hoba kina janina karon akana erorr asa nay ...anno name a dece ar o kaj korca

    }
}
