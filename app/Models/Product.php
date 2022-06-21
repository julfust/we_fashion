<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'title',
    //     'description',
    //     'price',
    //     'size',
    //     'isPublished',
    //     'isPromoted',
    //     'productRef',
    //     'category_id',
    //     'created_at',
    //     'updated_at'
    // ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function picture(){
        return $this->hasOne(Picture::class);
    }

    public function sizes(){
        return $this->belongsToMany(Size::class);
    }
}
