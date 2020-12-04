<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    public $timestamps = false;
    use HasFactory;
    protected $fillable = [
        'name', 'price', 'description', 'stock', 'img_path'
    ];
    

    public function order()
    {
        return $this->hasMany('App\Models\Order');
    }

  


}
