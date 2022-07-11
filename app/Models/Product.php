<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'slug', 'category_id', 'description', 'image', 'time', 'vehicle', 'starting_point', 'destination', 'tour', 'tour_policy', 'status'];
    public function category_item()
    {
        return $this->belongsTo(CategoryItem::class, 'category_id', 'id');
    }
    public function product_image() {
        return $this->hasMany(ProductImage::class);
    }
    public function tour_code() {
        return $this->hasMany(TourCode::class);
    }
}