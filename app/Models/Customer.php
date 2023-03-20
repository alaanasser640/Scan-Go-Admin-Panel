<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Customer extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = ['user_name', 'email','phone_number', 'password', 'token'];
    public function receipts()
    {
        return $this->hasMany(Receipt::class, "customer_id");
    }
    public function favorite_products()
    {
        return $this->belongsToMany(Product::class, 'favorite_products', 'customer_id','product_id');
    }

    public function related_account()
    {
        return $this->hasMany(Customer::class, "customer_id");
        // مش متأكده ان الريلشن دي صح خصوصا انها بين جدول و نفسه  ربنا يستر 
    }
    public function notes()
    {
        return $this->belongsToMany(Product::class, 'notes', 'customer_id','product_id');
    }
}
