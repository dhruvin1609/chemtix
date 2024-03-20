<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerProduct extends Model
{
    use HasFactory;

    protected $table = 'customer_product';
    
    protected $fillable = [
        'product_id',
        'supplier_id',
        'cas_number'
    ];

    public function getCustomerName(){
        return $this->hasOne('App\Models\Customer','id','supplier_id');
    }

    public function getproduct(){
        return $this->hasOne('App\Models\Products','id','product_id');
    }
}
