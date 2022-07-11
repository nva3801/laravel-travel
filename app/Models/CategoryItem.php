<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryItem extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'slug', 'category_id', 'status', 'description', 'image'];
    public function category_list()
    {
        return $this->belongsTo(CategoryList::class, 'category_id', 'id');
    }
    
}