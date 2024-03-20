<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    use HasFactory;

    protected $table = 'enquiry';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'product_id',
        'country',
        'company_name',
        'note',
        'status',
        'remarks',
    ];

    public function getproduct(){
        return $this->hasOne('App\Models\Products','id','product_id');
    }
}
