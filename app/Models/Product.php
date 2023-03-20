<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'category_id','stock','code','price','image', 'producer'];
    public function category()
    {
        return $this->belongsTo(Category::class, "category_id");
    }
    public function receipt()
    {
        return $this->belongsToMany(Receipt::class, 'purchases', 'receipt_id', 'product_id');
    }
    public function offer()
    {
        return $this->belongsTo(Offer::class, 'product_id');
    }
    public function customers()
    {
        return $this->belongsToMany(Customer::class, 'favorite_products', 'customer_id','product_id');
    }
    public function customer_notes()
    {
        return $this->belongsToMany(Customer::class, 'favorite_products', 'customer_id','product_id');
    }
}
