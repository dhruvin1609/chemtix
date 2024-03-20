<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model
{
    use HasFactory;

    protected $table = 'general_setting';

    protected $fillable = [
        'company_name',
        'company_email',
        'address',
        'contact_no',
        'contact_no_alt',
        'google_iframe',
        'facebook',
        'instagram',
        'primary_logo',
        'favicon_icon',
    ];
}
