<?php

namespace App\Models;

use App\Models\Post;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
public function subcategories(){
    return $this->hasMany(Subcategory::class);
}

public function posts(){
    return $this->hasMany(Post::class);
}
}
