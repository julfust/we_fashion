<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'category_id',
        'size',
        'price',
        'productRef',
        'isPublished',
        'isPromoted',
        'created_at',
        'updated_at'
    ];

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
