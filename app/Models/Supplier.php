<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $table = 'supplier';

    protected $fillable = [
            'supplier_name',
            'supplier_type',
            'supplier_id',
            'supplier_city',
            'supplier_address',
            'supplier_state',
            'supplier_country',
            'supplier_phone',
            'supplier_phone_alter',
            'supplier_fax',
            'supplier_email',
            'supplier_website',
            'contact_name',
            'contact_phone',
            'contact_designation',
            'contact_email',
            'supplier_gst_no',
            'supplier_msme',
            'supplier_pan_no',
            'supplier_drug_lic_no',
    ];
}
