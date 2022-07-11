<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourCode extends Model
{
    use HasFactory;
    protected $fillable = ['product_id', 'start', 'price_adult', 'price_children', 'price_baby', 'tour_code'];
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}