<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $with = ['product'];
    protected $table = 'orders';
    public $timestamps = false;
    use HasFactory;
    protected $fillable = [
        'product_id', 'amount', 'buyer_name',  'buyer_contact', 'created_at', 'updated_at'
    ];

    public function product(){
       return $this->belongsTo('App\Models\Product');
    }

    
}
