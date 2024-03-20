<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customer';

    protected $fillable = [
            'customer_name',
            'customer_type',
            'customer_city',
            'customer_address',
            'customer_state',
            'customer_country',
            'customer_phone',
            'customer_phone_alter',
            'customer_fax',
            'customer_email',
            'customer_website',
            'contact_name',
            'contact_phone',
            'contact_designation',
            'contact_email',
            'customer_gst_no',
            'customer_msme',
            'customer_pan_no',
            'customer_drug_lic_no',
    ];
}
