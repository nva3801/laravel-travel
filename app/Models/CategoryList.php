<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryList extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'slug', 'category_id', 'status'];
    public function category()
    {
        return $this->belongsTo(Category::class,);
    }
    public function category_item() {
        return $this->hasMany(CategoryItem::class, 'category_id');
    }
}