<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierProduct extends Model
{
    use HasFactory;

    protected $table = 'supplier_product';
    
    protected $fillable = [
        'product_id',
        'supplier_id',
        'cas_number'
    ];

    public function getSupplierName(){
        return $this->hasOne('App\Models\Supplier','id','supplier_id');
    }

    public function getproduct(){
        return $this->hasOne('App\Models\Products','id','product_id');
    }
}
