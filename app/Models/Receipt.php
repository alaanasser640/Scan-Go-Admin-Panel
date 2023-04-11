<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory;
    protected $fillable = ['customer_id', 'receipt_number', 'total_price','total_quantity', 'date', 'time'];
    public function customers()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
    public function products()
    {
        return $this->belongsToMany(Product::class, 'purchases', 'receipt_id', 'product_id');
    }
}
