<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory;

    protected $table = 'about_us';

    protected $fillable = [
        'title',
        'image',
        'description',
        'company_philosofy',
        'our_values',
        'quality',
        'how_we_work',
    ];
}
