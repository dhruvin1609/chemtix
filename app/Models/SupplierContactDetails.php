<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierContactDetails extends Model
{
    use HasFactory;

    protected $table = 'supplier_contact_details';
    protected $fillable = [
        'supplier_id',
        'customer_id',
        'contact_name',
        'contact_phone',
        'contact_designation',
        'contact_email',
    ];
}
