<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = [
        'title',
        'image',
        'description',
        'category_id',
        'product_code',
        'chemical_name',
        'synonyme',
        'cas_number',
        'molecular_formula',
        'molecular_weight',
        'specification',
        'packing',
        'availability',
    ];

     // public function getUsers()
    // {
    //     return $this->hasMany('App\Models\User', 'id', 'member_id');
    // }
    public function getCategory(){
        return $this->hasOne('App\Models\ProductCategory','id','category_id');
    }
}
