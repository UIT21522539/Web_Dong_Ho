<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Category extends Model
{
    use HasFactory;
    public function getAllCategory(){
        $category = DB::select("SELECT * FROM category");
        return $category;
    }
    
    public function getCategory($id){
        $category = DB::select("SELECT * FROM category WHERE id_category = ?",[$id]);
        return $category[0];
    }
}
