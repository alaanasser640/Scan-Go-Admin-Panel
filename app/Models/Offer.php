<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    protected $fillable = ['product_id', 'value', 'started_at','ended_at'];
    public function products()
    {
        return $this->hasMany(Product::class,'product_id');
    }
}
